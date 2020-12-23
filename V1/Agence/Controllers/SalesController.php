<?php 

/**
 * SALESCONTROLLER.PHP
 * 
 * Contrôleur pour la gestion des commerciaux
 * 
 * @author MDevoldere
 * @version 1.0.0
 * 
 * @todo Préremplir le formulaire en cas d'erreur & messages d'erreur
 * @todo Gérer le remplaçant dans le formulaire d'ajout
 * @todo Implémenter la mise à jour d'un commercial 
 * @todo implémenter la suppression d'un commercial
 */

namespace Agence\Controllers;

use Agence\BaseController;
use Agence\Models\Saleman;
use Agence\Models\Sales;
use Agence\Validation;

class SalesController extends BaseController
{
    /**
     * Affiche la liste des utilisateurs
     * @Route("/sales")
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

    /**
     * Ajoute un commercial
     * @Route("/sales/add")
     */
    public function add()
    {
        if($_POST) {
            
            $com_code = $_POST['identifiant'] ?? null;
            $com_name = $_POST['nom'] ?? null;
            $com_password = $_POST['pass'] ?? null;
            $com_password_bis = $_POST['pass_bis'] ?? null;

            if
            (
                Validation::isAlphanumeric($com_code, 2) &&
                Validation::isValidName($com_name) &&
                Validation::isValidPassword($com_password) && 
                ($com_password === $com_password_bis)
                
            )
            {
                // On instancie la classe d'accès aux données des commerciaux
                /** @var Sales $sales */
                $sales = new Sales();

                // on crée le modèle correspondant à la table 
                // et on y injecte les données du formulaire
                $newItem = new Saleman();
                $newItem->setCom_code($com_code);
                $newItem->setCom_name($com_name);
                $newItem->setCom_password($com_password);

                $sales->insert($newItem); // insertion en BDD

                header('Location: /sales');
                exit;

            }
            else {

            }
        }

        // renvoi de la vue avec le données
        return $this->view('sales/add');
    }
    
}