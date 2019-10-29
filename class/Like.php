<?php


class Like
{
    private $liker;
    private $idDiscussion;

    public function getLiker()
    {
        return $this->liker;
    }

    public function getIdDiscussion()
    {
        return $this->idDiscussion;
    }

    public function setIdDiscussion($idDisc)
    {
        $this->idDiscussion = $idDisc;
    }

    public function setLiker($liker)
    {
        $this->liker = $liker;
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