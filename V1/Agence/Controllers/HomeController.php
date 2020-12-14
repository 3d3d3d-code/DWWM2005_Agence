<?php 

/**
 * HOMECONTROLLER.PHP
 * 
 * Contrôleur pour la page d'accueil du site
 * 
 * @author MDevoldere
 * @version 1.0.0
 * 
 */

namespace Agence\Controllers;

use Agence\BaseController;

class HomeController extends BaseController
{    
    
    public function index()
    {
        $data = [
            'name' => 'Mike',
            'id' => '1',
        ];

        return $this->view('home/index', $data);
    }

    public function about()
    {
        return 'SALUT HomeController/about';
    }
}