<?php
include "utils.inc.php";
include "link.inc.php";

//Création de l'en tête et de l'include du css sur la page
start_page("login", $myprofilecss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

$step=$_GET['step'];
echo $step, '<br/>';

?>

<!-- Création de la flèche de retour à la page d'accueil -->
<a class="arrow" href="<?php echo $indexaddr ?>"><img src="<?php echo $arrow ?>"></a>

<!-- Création du Titre du site avec le logo -->
<div class='Title'>
    <div> <img alt="Logo" src="<?php echo $logo ?>"> </div>
    <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="index.php"> FreeNote </a> </div>
</div>

<h1> Informations Personnelles </h1>

<!-- Création du bloc qui contient le formulaire de connection -->
<div class="container-form">
    <form class="form" action="<?php echo $login_processing ?>" method="post">
        <p> Email </p>
        <input class="bouton" type="text" name="email" required />
        <p> Mot de Passe </p>
        <input class="bouton" type="password" name="password" required title="password" autocomplete="off" maxlength="30" style="margin-bottom: 20px;"/>
    </form>
    <input class ="submit" type="submit" name="action" value="Se connecter"/>
    <div class="connexion">
        <a href="<?php echo $inscriptionaddr ?>p"> Mot de passe oublié ? S'inscrire</a>
    </div>
</div>

<?php

// Création de la fin du fichier
end_page();
?>

