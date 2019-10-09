<?php


class message
{
    private $id_msg;
    private $id_discussion;
    private $eta;
    private $owner;

    public function setState($eta)
    {
        $this->eta = $eta;
    }

    public function getEta()
    {
        return $this->eta;
    }

}