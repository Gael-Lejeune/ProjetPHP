<?php
class Message
{
    private $idMsg; // id du message (unique et auto-implement)
    private $idDiscussion; // id de la discussion dans lequel le message est écrit
    private $state; // 1 = message ouvert, 0 = message fermé
    private $text; // texte contenu dans le message

    //getteurs
    public function getIdMsg()
    {
        return $this->idMsg;
    }

    public function getIdDiscussion()
    {
        return $this->idDiscussion;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getText()
    {
        return $this->text;
    }

    //setteurs
    public function setIdMsg($id_msg)
    {
        $this->idMsg = $id_msg;
    }

    public function setIdDiscussion($id_discussion)
    {
        $this->idDiscussion = $id_discussion;
    }

    public function setState($state)
    {
        if ($state == 0 or $state == 1) {
            $this->state = $state;
        }
    }

    public function setText($text)
    {
        $text = (string) $text;
        $this->text = $text;
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