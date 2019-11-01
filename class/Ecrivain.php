<?php

// sert à savoir qui à écrit dans quel message
class Ecrivain
{
    private $writer; // email de la personne
    private $idMsg; // id du message dans lequel l'utilisateur à écrit
    private $idDiscussion; // id de la discussion dans laquelle se trouve le message

    //getteurs
    public function getIdDiscussion()
    {
        return $this->idDiscussion;
    }

    public function getIdMsg()
    {
        return $this->idMsg;
    }

    public function getWriter()
    {
        return $this->writer;
    }

    //setteurs
    public function setIdDiscussion($id_discussion)
    {
        $this->idDiscussion = $id_discussion;
    }

    public function setIdMsg($id_msg)
    {
        $this->idMsg = $id_msg;
    }

    public function setWriter($writer)
    {
        $writer = (string) $writer;
        if (preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $writer)) {
            $this->writer = $writer;
        }
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