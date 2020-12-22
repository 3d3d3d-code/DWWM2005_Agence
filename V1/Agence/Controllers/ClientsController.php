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
use Agence\Models\Client;
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
     * @Route("/clients/client/{id}")
     */
    public function client() : string
    {
        $client = new clients();
        $client = $client->getBy('client_id', '1');

        return $this->view('clients/client', ['client' => $client]);
    }

    /**
     * @Route("/clients/add")
     */
    public function add()
    {

    }

    /**
     * @Route("/clients/update/{id}")
     */
    public function update(Client $client)
    {

    }

    /**
     * @Route("/clients/delete/{id}")
     */
    public function delete(Client $client)
    {

    }
}