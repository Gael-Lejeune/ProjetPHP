<?php
include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);

$id_mess = $_POST['id'];

$message = $manager->getMessage($id_mess);