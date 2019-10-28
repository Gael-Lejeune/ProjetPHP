<?php
class Disc_Mess_Manager
{
    private $db; //objet PDO

    public function __construct($db)
    {
        $this->setDB($db);
    }


}