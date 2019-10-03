<?php
include "utils.inc.php";

start_page("index");

session_start();

//Affichage de la session en cours
if($_SESSION['login']=='ok')
{
    echo 'Connécté en tant que ', $_SESSION['email'], '<br>';
}

echo 'En travaux';

//Liens vers les différentes pages du site
?>
    <br>
    <a href="<?php echo $inscriptionaddr;?>"><?php echo $inscription;?></a>
    <br>
    <a href="<?php echo $loginaddr;?>"><?php echo $login;?></a>


<?php

end_page();