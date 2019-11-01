<?php
class Ecrivain
{
    private $writer;
    private $idMsg;
    private $idDiscussion;

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