<?php


class Message
{
    private $id_msg;
    private $id_discussion;
    private $state;
    private $owner;
    private $texte;

    public function __construct ()
    {

    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getIdMessage()
    {
        return $this->id_msg;
    }

    public function getIdDiscussion()
    {
        return $this->id_discussion;
    }

    public function setTexte($newTexte)
    {
        $this->texte = $newTexte;
    }

    public function getTexte()
    {
        return $this->texte;
    }

}