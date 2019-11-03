<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Création de l'en tête et de l'include du css sur la page
start_page($inscription, $logincss, $background3);

//Vérification du mot de passe et de la validation des conditions générales d'utilisation
$step=$_GET['step'];
if ($step == 'ERROR_mdp') {
    echo 'La confirmation de mot de passe est incorrecte'.'<br/>';
}

//Affichage de la page
require $inscriptionview;

end_page();

?>

