<?php

// sert à savoir qui à liker quelle discussion
class Like
{
    private $liker; // email de la personne
    private $idDiscussion; // id de la discussion que l'utilisateur à liker

    //getteurs
    public function getLiker()
    {
        return $this->liker;
    }

    public function getIdDiscussion()
    {
        return $this->idDiscussion;
    }

    //setteurs
    public function setIdDiscussion($idDisc)
    {
        $this->idDiscussion = $idDisc;
    }

    public function setLiker($liker)
    {
        $this->liker = $liker;
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