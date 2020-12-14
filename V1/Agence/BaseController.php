<?php 

/**
 * BASECONTROLLER.PHP
 * 
 * Classe abstraite
 * Tous les contrôleurs héritent de cette classe
 * 
 * @author MDevoldere
 * @version 1.0.0
 * 
 */

namespace Agence;


abstract class BaseController 
{

    /** 
     * LA méthode index() est la méthode par défaut.
     * Tous les contrôleurs qu ihéritent de BaseController DOIVENT implémenter la méthode
     */
    abstract public function index();


    /**
     * Retourne une vue
     * @param string $filename la vue à utiliser (nom du fichier)
     * @param array $data les données à injecter dans la vue
     * @return string La vue après injection des données 
     */
    public function view(string $filename, array $data = []): string
    {
        // construction du chemin vers la vue
        $path = __DIR__.'/Views/'.$filename.'.php';

        // si la vue n'existe pas, erreur !
        if(!\is_file($path)) { 
            exit('Invalid View'); 
        }

        // démarrage de la mise en mémoire tampon
        // tout affichage est stocké en mémoire au lieu d'être directement affiché
        \ob_start(); 

        // extraction du tableau de données.
        // pour chaque clé du tableau, une variable portant le même nom est créée.
        // ex: pour le tableau $data = ['name' => 'Mike']
        // extract crée une variable $name = "Mike"
        \extract($data);

        // inclusion de la vue (la vue utilise les varaibles créées par extract())
        require $path;

        // fermeture du tampon et récupération des données à afficher (la vue)
        $result = \ob_get_clean();

        return $result;
    }
}
