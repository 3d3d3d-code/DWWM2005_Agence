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

class ClientsController extends BaseController
{
    /**
     * @Route("/clients", name="clients")
     */
    public function index() : string
    {
        $clients = new Clients();

        return $this->view('clients/index', ['datas' => $clients->getByAll()]);
    }

    /**
     * @Route("/clients/add", name="client_add")
     */
    public function add()
    {

        if($_POST){

        }

        return $this->view('client/add');
    }

    /**
     * @Route("/clients/update/{id}", name="client_update")
     */
    public function update()
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
     */
    public function delete()
    {

    }
}