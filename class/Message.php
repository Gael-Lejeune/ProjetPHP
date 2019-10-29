<?php
class Message
{
    private $idMsg; //auto-implement
    private $idDiscussion; //NEED
    private $state; //default (1 = ouvert, 0 = fermer)
    private $text; //default

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

    public function closeMsg ()
    {
        $this->state = 0;
    }

    public function concatenation ($text)
    {
        $text = (string) $text;
        $this->text .= ' '.$text;
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