<?php
/**
 * ClientsController.php
 *
 * desc exemple
 *
 * @author Jjeanniard
 * @version 0.0.1
 */

namespace Agence\Controllers;

use Agence\BaseController;

use Agence\Models\Clients;
use Agence\Models\Client;
use Agence\Models\Sales;

use Agence\Session;
use Agence\Validation;

class ClientsController extends BaseController
{
    /**
     * @Route("/clients", name="clients")
     * @return string
     */
    public function index(): string
    {
        $clients = new Clients();

        return $this->view('clients/index', ['datas' => $clients->getByAll()]);
    }

    /**
     * @Route("/clients/add", name="client_add")
     * @return string
     */
    public function add(): string
    {
        $sales = new Sales();

        if ($_POST) {
            $lastname = $_POST['lastname'] ?? null;
            $firstname = $_POST['firstname'] ?? null;
            $pwd = $_POST['pwd'] ?? null;
            $pwd_b = $_POST['pwd_b'] ?? null;
            $email = $_POST['email'] ?? null;
            $telephone = $_POST['telephone'] ?? null;
            $sale = $_POST['sale'] ?? null;

            if (
                Validation::isAlphabetic($lastname) &&
                Validation::isAlphabetic($firstname) &&
                Validation::isValidPassword($pwd) &&
                ($pwd === $pwd_b) &&
                Validation::isValidEmail($email)
            ) {
                $client = new Clients();
                $clt = new Client();
                $clt->setClientLastname($lastname);
                $clt->setClientFirstname($firstname);
                $clt->setClientPassword($pwd);
                $clt->getClientEmail($email);
                $clt->getClientPhone($telephone);

                if ($sale != null) {
                    foreach ($sales->getAll() as $sl) {
                        if($sale = $sl->getCode_com()){
                            $clt->setComCode($sale);
                        }else{
                            Session::set('msg', 'Une erreur c\'est produite lors de la soumission du formulaire');
                            header('Location: /clients/add');
                            exit();
                        }
                    }
                }

                $client->insert();

            } else {
                //TODO : retourner les valeurs dans les champs
                Session::set('msg', 'Une erreur c\'est produite lors de la soumission du formulaire');
                header('Location: /clients/add');
                exit();
            }
        }

        return $this->view('clients/client_add', [
            'sales' => $sales->getAll(),
            'msg' => Session::get('msg', true)
        ]);
    }

    /**
     * @Route("/clients/update/{id}", name="client_update")
     * @return  string
     */
    public function update(): string
    {
        $client = new clients();

        $id = intval($this->id);

        $client = $client->getBy('client_id', $id);

        if ($_POST) {

        }

        return $this->view('clients/client_update', ['client' => $client]);
    }

    /**
     * @Route("/clients/delete/{id}", name="client_delete")
     * @return string
     */
    public function delete(): string
    {
        $client = new Clients();
        $msg = null;
        $error = false;

        $id = intval($this->id);

        $client = $client->getBy('client_id', $id);

        if (empty($client)) {
            Session::set('msg', 'Le client ' . $this->id . ' n\'existe pas!');
        }

        if ($_POST) {
            if ($_POST['choix'] != 'true' && $_POST['choix'] != 'false') {
                $error = true;
            }

            if ($error) {
                Session::set('msg', 'Une erreur c\'est glissé dans le choix ');
                header('Location: /clients/delete/' . $client->getClientId() . '');
                exit();
            }

            if ($_POST['choix'] === 'false') {
                header('Location: /clients/update/' . $client->getClientId() . '');
                exit();
            }

        }


        return $this->view('clients/client_delete', [
            'client' => $client,
            'msg' => Session::get('msg', true)
        ]);
    }
}