<?php
include "utils.inc.php";
include "link.inc.php";

//Demarrage de la page

start_page("login", $inscriptioncss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

session_start();

//ouverture connexion serveur BD
$dbLink=mysqli_connect("mysql-latableronde.alwaysdata.net","191121","tableronde")
or die('Erreur de connexion au serveur:'.mysqli_connect_error());

//sélection BD
mysqli_select_db($dbLink,"latableronde_dtb")
or die('Erreur dans la sélection de la base:'.mysqli_error($dbLink));

//Si la personne est connecte
if ($_SESSION['login']){

    //On recupere ses informations (email et password grace a $_SESSION)
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];

    //Requete pour recuperer le nom
    $query_name="SELECT name FROM user WHERE email = '$email' AND password = '$password'";

    //Verification de la viabilité de la requete
    if(!($dbResult=mysqli_query($dbLink, $query_name)))
    {
        echo'Erreurderequête<br/>';
    //Affichele type d'erreur.
        echo'Erreur:'.mysqli_error($dbLink).'<br/>';
    //Affiche la requête envoyée.
        echo'Requête:'.$query_name.'<br/>';
        exit();
    }

    $name=mysqli_fetch_assoc($dbResult);

    //Requete pour recupere la civilite
    $query_civ="SELECT civilite FROM user WHERE email = '$email' AND password = '$password'";

    //Verification de la viabilité de la requete
    if(!($dbResult=mysqli_query($dbLink, $query_civ)))
    {
        echo'Erreurderequête<br/>';
        //Affichele type d'erreur.
        echo'Erreur:'.mysqli_error($dbLink).'<br/>';
        //Affiche la requête envoyée.
        echo'Requête:'.$query_civ.'<br/>';
        exit();
    }

    $civ=mysqli_fetch_assoc($dbResult);

    ?>


    <!-- HTML de la page -->

    <!--Fleche retour -->
    <a class="arrow" href="<?php echo $indexaddr ?>"><img src="<?php echo $arrow ?>"></a>

    <!--En tete de la page -->
    <div class='Title'>
        <div> <img alt="Logo" src="<?php echo $logo ?>"> </div>
        <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="index.php"> FreeNote </a> </div>
    </div>

    <h1> Informations Personnelles </h1>

    <!--Formulaires de changement d'informations-->

    <!-- division qui affiche les informations de l'utilisateur -->
    <div class="container-form">
        <!--Affichage des informations de l'utilisateur -->
        <div class="informations_personnelles">
            <!-- On affiche les variables definies au dessus -->
            <p> Nom : <?php echo $name ?> </p></br>
            <p> email : <?php echo $email ?> </p></br>
            <p> Mot de passe actuel: <?php echo $password ?> </p></br>
            <p> Civilité : <?php echo $civ ?> </p></br>

        </div>

        <!--Formulaire pour changer le nom de l'utilisateur -->
        <form id="DoChangeId" action="<?php echo $account_processing ?>" method="post">
            <p>
                Nouvel identifiant :
                <input class="bouton" id="DoChangeLogin" autocomplete="off" name="DoChangeLogin" type="text"/></br>
                Mot de passe actuel:
                <input class="bouton" id="Password" autocomplete="off" autocapitalize="off" name="Password" type="password"/></br>
                <button id="SendChangeLogin" type="submit" value="login" name="submit"> Changer mon Identifiant </button>
            </p>
        </form>

        <!--Formulaire pour changer le mot de passe -->
        <form id="DoChangePassword" action="<?php echo $account_processing ?>" method="post">
            <p>
                Nouveau Mot de passe :
                <input class="bouton" id="DoChangePassword" autocomplete="off" name="DoChangePassword" type="text"/></br>
                Ancien Mot de passe:
                <input class="bouton" id="Password" autocomplete="off" autocapitalize="off" name="Password" type="password"/></br>
                <button id="SendChangePassword" type="submit" value="password" name="submit"> Changer mon Mot de passe </button>
            </p>
        </form>
    </div>

<?php

    //Si la personne n'est pas connecte
} else {
    header('Location:indexlogin.php?error=ERROR_auth');
}
