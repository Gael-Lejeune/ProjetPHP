<?php
include "utils.inc.php";
include "link.inc.php";

include 'model/dtb.inc.php';


//Création de l'en tête et de l'include du css sur la page
start_page("login", $inscriptioncss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");


//Vérification du mot de passe et de la validation des conditions générales d'utilisation
$step=$_GET['step'];
if ($step == 'ERROR_mdp') {
    echo 'La confirmation de mot de passe est incorrecte'.'<br/>';
} else if ($step == 'ERROR_cond') {
    echo 'Vous devez valider les conditions d\'utilisations'.'<br/>';
}


<!-- Création de la flèche de retour à la page d'accueil -->
<a class="arrow" href="<?php echo $indexaddr ?>"><img src="<?php echo $arrow?>"></a>

<!-- Création du Titre du site avec le logo -->
<div class='Title'>
    <div> <img alt="Logo" src="<?php echo $logo ?>"> </div>
    <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="<?php echo $indexaddr?>"> FreeNote </a> </div>
</div>

<h1> Inscription </h1>

<!-- Création du bloc qui contient le formulaire d'inscription -->
<div class="container-form">
    <form class="form" action="<?php echo $data_processor ?>" method="post">
        <p> Votre Nom </p>
            <input class="bouton" type="text" name="name"/>
        <p> Civilité (sexe) </p>
            <input type="radio" name="civilite" value="M"/> Homme <br/><br/>>
            <input type="radio" name="civilite" value="F"/> Femme <br/>
        <p> Email </p>
            <input class="bouton" type="text" name="email"/>
        <p> Mot de Passe </p>
            <input class="bouton" type="password" name="password"/>
        <p> Confirmation Mot de Passe </p>
            <input class="bouton" type="password" name="password"/></br></br>
        <p>Conditions générales <input class="conditions" type="checkbox" name="conditions"/></p>
            <input class ="submit" type="submit" name="action" value="Créer un compte"/>
        </form>
        <div class="connexion">
            <a href="<?php echo $loginaddr ?>"> Déjà inscrit(e) ? Se connecter</a>
        </div>
    </div>


<?php

end_page();

?>

