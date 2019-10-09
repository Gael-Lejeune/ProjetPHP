<?php
include "utils.inc.php";
include "link.inc.php";

start_page("login", "html/css/signup.css", "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

$step=$_GET['step'];
if ($step == 'ERROR_mdp') {
    echo 'La confirmation de mot de passe est incorrecte'.'<br/>';
} else if ($step == 'ERROR_cond') {
    echo 'Vous devez valider les conditions d\'utilisations'.'<br/>';
}

?>
    <a class="arrow" href="index.php"><img src="https://img.icons8.com/nolan/50/000000/up-left.png"></a>

    <div class='Title'>
        <div> <img alt="Logo" src="html/images/login.png"> </div>
        <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="index.php"> FreeNote </a> </div>
    </div>

    <h1> Inscription </h1>

    <div class="container-form">
        <form class="form" action="data-processor.php" method="post">
            <p> Votre Nom </p>
            <input class="bouton" type="text" name="name"/>
            <p> Civilité (sexe) </p>
            <input type="radio" name="civilite" value="M"/> Homme <br/>
            <br><input type="radio" name="civilite" value="F"/> Femme <br/>
            <p> Email </p>
            <input class="bouton" type="text" name="email"/>
            <p> Mot de Passe </p>
            <input class="bouton" type="password" name="password"/>
            <p> Confirmation Mot de Passe </p>
            <input class="bouton" type="password" name="password"/></br></br>
            <p>Conditions générales <input type="checkbox" name="conditions"/></p>
        </form>
        <input class ="submit" type="submit" name="action" value="Créer un compte"/>
        <div class="connexion">
            <a href="login.php"> Déjà inscrit(e) ? Se connecter</a>
        </div>
    </div>

<?php

end_page();

?>

