<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';


start_page("login", $inscriptioncss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

session_start();

//Si la session est ouverte

if ($_SESSION['login']) {
    //On la ferme
    session_destroy();
    //On revient sur l'index qui devrait changer vu qu'on est deconnecte
    header('Location:' . $indexaddr);
}

end_page();
