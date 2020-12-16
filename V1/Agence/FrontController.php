<?php 

namespace Agence;

class FrontController extends BaseController
{
    protected BaseController $controller;

    protected string $result;

    /**
     * Le contrôleur frontal se charge d'instancier le contrôleur correspondant à la requête
     * Il exécute ensuite l'action demandé sur le contrôleur ainsi instancié
     */
    public function __construct(string $controller, string $action, $id)
    {
        $this->controller = new $controller($id);      
        
        // si $action correspond à une méthode existante dans notre contrôleur
        // on exécute l'action demandée qui nous renvoie la vue partielle
        if (method_exists($this->controller, $action)) {
            $this->result = ($this->controller->{$action}());
        } else {
            exit('Invalid Action');
        }
    }

    /**
     * Récupère le résultat du contrôleur (exécuté dans le constructeur ci-dessus)
     * Appelle ensuite la vue principale (layout) et y injecte la vue partielle
     */
    public function index()
    {
         
        $data = [
            'page' => $this->result
        ];

        return $this->view('layout', $data);
    }
}