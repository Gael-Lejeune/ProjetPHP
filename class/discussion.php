<?php


class discussion
{
    private $id_discussion;
    private $eta;

    public function setState($eta)
    {
        $this->eta = $eta;
    }

    public function getEta()
    {
        return $this->eta;
    }
}