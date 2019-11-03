<?php

// réunit toutes les informations d'un discussion
class Discussion
{
    private $idDiscussion; // id de la discussion (unique et auto-increment)
    private $discName; // nom de la discussion
    private $owner; // email de l'utilisateur qui créé la discussion
    private $nbMessMax; // nombre de message maximum autorisé dans la discussion (entre 0 et  30)
    private $state; // 1 = discussion ouverte, 0 = discussion fermée
    private $nbMessage; // nombre de message actuel dans la discussion (valeur par défault = 0)
    private $nbLike; // nombre de fois ou la discussion a été liké (valeur par default = 0)

    // getteurs
    public function getOwner()
    {
        return $this->owner;
    }

    public function getDiscName()
    {
        return $this->discName;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getIdDiscussion()
    {
        return $this->idDiscussion;
    }

    public function getNbMessage()
    {
        return $this->nbMessage;
    }

    public function getNbLike()
    {
        return $this->nbLike;
    }

    public function getNbMessMax()
    {
        return $this->nbMessMax;
    }

    //setteurs
    public function setNbMessMax($nb_mess_max)
    {
        if ($nb_mess_max > 0 and $nb_mess_max <= 30) {
            $this->nbMessMax = $nb_mess_max;
        }
    }

    public function setOwner($owner)
    {
        $owner = (string) $owner;
        if (preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $owner)) {
            $this->owner = $owner;
        }
    }

    public function setDiscName($disc_name)
    {
        $disc_name = (string) $disc_name;
        $this->discName = $disc_name;
    }

    public function setNbLike($nb_like)
    {
        $nb_like = (int) $nb_like;
        $this->nbLike = $nb_like;
    }

    public function setIdDiscussion($id_discussion)
    {
        $this->idDiscussion = $id_discussion;
    }

    public function setNbMessage($nb_messages)
    {
        $this->nbMessage = $nb_messages;
    }

    public function setState($state)
    {
        if ($state == 0 or $state == 1) {
            $this->state = $state;
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
