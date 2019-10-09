<?php
include "utils.inc.php";
include "link.inc.php";

start_page("login", "html/css/myprofile.css", "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

$step=$_GET['step'];
echo $step, '<br/>';


//Formulaire de login
?>
<a class="arrow" href="index.php"><img src="https://img.icons8.com/nolan/50/000000/up-left.png"></a>

<div class='Title'>
    <div> <img alt="Logo" src="html/images/login.png"> </div>
    <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="index.php"> FreeNote </a> </div>
</div>

<h1> Informations Personnelles </h1>

<div class="container-form">
    <form class="form" action="login-processing.php" method="post">
        <p> Email </p>
        <input class="bouton" type="text" name="email" required />
        <p> Mot de Passe </p>
        <input class="bouton" type="password" name="password" required title="password" autocomplete="off" maxlength="30" style="margin-bottom: 20px;"/>
    </form>
    <input class ="submit" type="submit" name="action" value="Se connecter"/>
    <div class="connexion">
        <a href="formulaire_inscription.php"> Mot de passe oublié ? S'inscrire</a>
    </div>
</div>

<?php

end_page();
?>

