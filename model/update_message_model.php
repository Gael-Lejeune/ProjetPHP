<?php
include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);//Definition du manager

$id_mess = $_POST['id'];//Recuperation de l'id de la discussion à afficher
$message = $manager->getMessage($id_mess);//Affichage de la discussion