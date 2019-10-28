<?php


class Discussion
{
    private $id_discussion;
    private $state; // 1 = ouvert, 0 = fermer
    private $nb_messages;

    public function getIdDiscussion()
    {
        return $this->id_discussion;
    }

    public function getNbMessages()
    {
        return $this->nb_messages;
    }

    public function getState()
    {
        return $this->state;
    }

    public function __construct($id)
    {
        $this->nb_messages = 0;
        $this->state = 1;
        $this->id_discussion = $id;
    }

    public function incrMessage ()
    {
        $this->nb_messages += 1;
    }

    public function closeDiscussion ()
    {
        $this->state = 0;
    }
}