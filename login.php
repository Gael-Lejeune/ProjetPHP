<?php
include "utils.inc.php";
include "link.inc.php";

start_page("login", "html/css/signup.css", "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

$step=$_GET['step'];
echo $step, '<br/>';


//Formulaire de login
?>
<a class="arrow" href="index.php"><img src="https://img.icons8.com/nolan/50/000000/up-left.png"></a>

<div class='Title'>
    <div> <img alt="Logo" src="html/images/login.png"> </div>
    <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="index.php"> FreeNote </a> </div>
</div>

<h1> Se Connecter </h1>

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


include "utils.inc.php";


start_page("login");

$error=$_GET['error'];
echo $error, '<br/>';


//Formulaire de login
?>
<form action="login-processing.php" method="post" >
    <h4>Vos informations</h4>
    <input type="text" name="email" placeholder="Adresse Email*" required /><br>
    <br>
    <input type="password" name="password" placeholder="password" required title="password" autocomplete="off" maxlength="30"/>
    <br>
    <br>
    <button type="submit" name="ok" value="mailer">OK</button>
<form/>