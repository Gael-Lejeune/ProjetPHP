<?php


class Serveur
{
    private $varPagination;
    private $nbDiscMax;

    public function getNbDiscMax()
    {
        return $this->nbDiscMax;
    }

    public function getVarPagination()
    {
        return $this->varPagination;
    }

    public function setNbDiscMax($nbDiscMax)
    {
        $this->nbDiscMax = $nbDiscMax;
    }

    public function setVarPagination($varPagination)
    {
        $this->varPagination = $varPagination;
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