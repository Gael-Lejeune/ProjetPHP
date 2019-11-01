<?php


class Serveur_Manager
{
    /**
     * @var PDO
     */
    private $db;

    public function setDb($db)
    {
        $this->db = $db;
    }

    public function __construct($db)
    {
        $this->setDB($db);
    }

    public function getPagination ()
    {
        $query = $this->db->prepare('SELECT varPagination FROM serveur');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['varPagination'];
    }

    public function getNbDiscMax ()
    {
        $query = $this->db->prepare('SELECT nbDiscMax FROM serveur');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['nbDiscMax'];
    }

    public function setPagination ($valeur)
    {
        $query = $this->db->prepare('UPDATE serveur SET varPagination = ?');
        $query->execute([$valeur]);
    }

    public function setNbDiscMax ($valeur)
    {
        $query = $this->db->prepare('UPDATE serveur SET nbDiscMax = ?');
        $query->execute([$valeur]);
    }

}