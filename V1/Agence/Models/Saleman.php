<?php 

/**
 * SALEMAN.PHP
 * 
 * Réprésente un commercial
 * 
 * @author MDevoldere
 * @version 1.0.0
 * 
 */

namespace Agence\Models;


class Saleman 
{
    private string $com_code;

    private string $com_name;
    
    private string $com_password;
    
    private ?string $com_substitute = null;

    /**
     * Retourne l'objet sous forme de tableau
     * @return array l'objet sous forme de tableau
     */
    public function toArray()
    {
        $r = [];

        /*
            Parcours de l'objet courant
        */
        foreach($this as $propertyName => $propertyValue)
        {
            $r[$propertyName] = $propertyValue;
        }

        return $r;
    }

    /**
     * Get the value of com_code
     */ 
    public function getCom_code()
    {
        return $this->com_code;
    }

    /**
     * Set the value of com_code
     *
     * @return  self
     */ 
    public function setCom_code($com_code)
    {
        $this->com_code = $com_code;

        return $this;
    }

    /**
     * Get the value of com_name
     */ 
    public function getCom_name()
    {
        return $this->com_name;
    }

    /**
     * Set the value of com_name
     *
     * @return  self
     */ 
    public function setCom_name($com_name)
    {
        $this->com_name = $com_name;

        return $this;
    }

    /**
     * Get the value of com_password
     */ 
    public function getCom_password()
    {
        return $this->com_password;
    }

    /**
     * Hash & Set the value of com_password
     *
     * @return  self
     */ 
    public function setCom_password($com_password)
    {
        $this->com_password = \password_hash($com_password, PASSWORD_BCRYPT);

        return $this;
    }
}