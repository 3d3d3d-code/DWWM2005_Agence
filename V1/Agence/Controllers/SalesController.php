<?php 

/**
 * SALESCONTROLLER.PHP
 * 
 * Contrôleur pour la gestion des commerciaux
 * 
 * @author MDevoldere
 * @version 1.0.0
 * 
 */

namespace Agence\Controllers;

use Agence\BaseController;
use Agence\Models\Sales;

class SalesController extends BaseController
{
    /**
     * Affiche la liste des utilisateurs
     * @Route("/sales", name="Homepage")
     */
    public function index()
    {
        // On instancie la classe d'accès aux données des commerciaux
        $sales = new Sales();

        // on crée le tableau de données qui sera injecté dans la vue
        // l'entrée 'users' contiendra le résultat de Sales::getAll() 
        // qui retourne la liste des commerciaux enregistrés dans la base de données
        $data = [
            'users' => $sales->getAll(),
        ];

        // renvoi de la vue avec le données
        return $this->view('sales/index', $data);
    }
    
}