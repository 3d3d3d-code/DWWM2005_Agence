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
use Agence\Session;

class ClientsController extends BaseController
{
    /**
     * @Route("/clients", name="clients")
     * @return string
     */
    public function index() : string
    {
        $clients = new Clients();

        return $this->view('clients/index', ['datas' => $clients->getByAll()]);
    }

    /**
     * @Route("/clients/add", name="client_add")
     * @return string
     */
    public function add() : string
    {

        if($_POST){

        }

        return $this->view('clients/client_add');
    }

    /**
     * @Route("/clients/update/{id}", name="client_update")
     * @return  string
     */
    public function update() : string
    {
        $client = new clients();

        $id = intval($this->id);

        $client = $client->getBy('client_id', $id);

        if($_POST){

        }

        return $this->view('clients/client_update', ['client' => $client]);
    }

    /**
     * @Route("/clients/delete/{id}", name="client_delete")
     * @return string
     */
    public function delete() : string
    {
        $client = new Clients();
        $msg = null;
        $error = false;

        $id = intval($this->id);

        $client = $client->getBy('client_id', $id);

        if(empty($client)){
            Session::set('msg', 'Le client '.$this->id.' n\'existe pas!');
        }

        if($_POST){

            if($_POST['choix'] != 'true'){
                $error = true;
            } else if ($_POST['choix'] != 'false') {
                $error = true;
            }

            if($error){
                Session::set('msg', 'Une erreur c\'est glissé dans le choix');
                header('Location: /clients/delete/'.$client->getClientId().'');
                exit();
            }

        }

        return $this->view('clients/client_delete', [
            'client' => $client,
            'msg' => Session::get('msg', true)
        ]);
    }
}