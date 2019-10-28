<?php
class Message
{
    private $id_msg; //auto-implement
    private $id_discussion; //NEED
    private $state; //default (1 = ouvert, 0 = fermer)
    private $text; //default

    public function getIdDiscussion()
    {
        return $this->id_discussion;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getIdMsg()
    {
        return $this->id_msg;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function __construct($id_discussion, $id_msg, $owner)
    {
        $this->id_discussion = $id_discussion;
        $this->id_msg = $id_msg;
        $this->owner = $owner;
    }

    public function concatenation ($text)
    {
        $this->text += $text;
    }

}