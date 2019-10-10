<?php
include "utils.inc.php";
include "link.inc.php";

//Création de l'en tête et de l'include du css sur la page
start_page("login", $logincss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

$step=$_GET['step'];
echo $step, '<br/>';

//Formulaire de login
?>
<!-- Création de la flèche de retour à la page d'accueil -->
<a class="arrow" href="<?php echo $indexaddr ?>"><img src="https://img.icons8.com/nolan/50/000000/up-left.png" style="margin-top: -20px;"></a>

<!-- Création du Titre du site avec le logo -->
<div class='Title' style="margin-top: 20px;">
    <div> <img alt="Logo" src="<?php echo $logo ?>"> </div>
    <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="<?php echo $indexaddr ?>"> FreeNote </a> </div>
</div>

<h1> Se Connecter </h1>

<!-- Création du bloc qui contient le formulaire de connection -->
<div class="container-form">
    <form class="form" action="<?php echo $login_processing ?>" method="post">
        <div>
            <p> Email </p>
            <input class="bouton" type="text" name="email" required />
        </div>
        <div>
            <p> Mot de Passe </p>
            <input class="bouton" type="password" name="password" title="password" autocomplete="off" maxlength="30" required"/>
        </div>
        <input class="submit" type="submit" name="action" value="Se connecter"/>
    </form>
    <div class="connexion">
        <a href="<?php echo $indexaddr ?>"> Mot de passe oublié ? S'inscrire</a>
    </div>
</div>

<?php

end_page();
?>

