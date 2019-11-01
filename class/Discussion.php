<?php
class Discussion
{
    private $idDiscussion;
    private $discName;
    private $owner;
    private $nbMessMax;
    private $state; // 1 = ouvert, 0 = fermer
    private $nbMessages;
    private $nbLike;

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

    public function getNbMessages()
    {
        return $this->nbMessages;
    }

    public function getNbLike()
    {
        return $this->nbLike;
    }

    public function getNbMessMax()
    {
        return $this->nbMessMax;
    }

    public function closeDisc()
    {
        $this->state = 0;
    }

    public function incrNbMess()
    {
        $this->nbMessages += 1;
        if ($this->nbMessages >= $this->nbMessMax) {
            $this->closeDisc();
        }
    }

    public function incrNbLike()
    {
        $this->nbLike += 1;
    }

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

    public function setNbMessages($nb_messages)
    {
        $this->nbMessages = $nb_messages;
    }

    public function setState($state)
    {
        if ($state == 0 or $state == 1) {
            $this->state = $state;
        }
    }

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

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