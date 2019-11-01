<?php
class User
{
    private $user_name; // Pseudo de l'utilisateur
    private $email; // Email de l'utilisateur (clé primaire)
    private $password; // mot de passe de l'utilisateur (crypté et enregistré en MD)
    private $role; // membre ou administrateur


    //getteurs
    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->user_name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    //setteurs
    public function setEmail($email)
    {
        $email = (string) $email;
        if (preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $email)) {
            $this->email = $email;
        }
    }

    public function setUser_name($name)
    {
        if (is_string($name)) {
            $this->user_name = $name;
        }
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    //constructeur -> appelle la fonction hydrate

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    // fonction hydrate -> appelle les setteurs necessaires à la création de la discussion en fonction des valeurs du tableau qui lui est passé en paramètre
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
}