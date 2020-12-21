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

    public function index()
    {
        $clients = new Clients();

        return $this->view('clients/index', ['datas' => $clients->getByAll()]);
    }

    public function client()
    {
        var_export($this->id);

        $client = new clients();
        $client->getBy('id', [ 'value' => 1]);

        return $this->view('clients/client', ['datas' => $client]);
    }

    public function add()
    {

    }

    public function update(Client $client)
    {

    }

    public function delete(Client $client)
    {

    }
}