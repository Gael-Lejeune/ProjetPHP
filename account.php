<?php

//ouverture connexion serveur BD
$dbLink=mysqli_connect("mysql-latableronde.alwaysdata.net","191121","tableronde")
or die('Erreur de connexion au serveur:'.mysqli_connect_error());

//sélection BD
mysqli_select_db($dbLink,"latableronde_dtb")
or die('Erreur dans la sélection de la base:'.mysqli_error($dbLink));

if ($_SESSION['login'] == 'true'){

    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
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

    //Affichage des informations de l'utilisateur

    <div>

        <h1> Informations personelles : </h1>

        <p> Nom : <?php echo $name ?> </p></br>
        <p> email : <?php echo $email ?> </p></br>
        <p> Mot de passe actuel: <?php echo $password ?> </p></br>
        <p> Civilité : <?php echo $civ ?> </p></br>

    </div>

    //Formulaires de changement d'informations

    <div>
        <form id="DoChangeLogin" action="account_processing.php" method="post">
            <p>
                Nouvel identifiant :
                <input id="DoChangeLogin" autocomplete="off" name="DoChangeLogin" type="text"></br>
                Mot de passe actuel:
                <input id="Password" autocomplete="off" autocapitalize="off" name="Password" type="password"></br>
                <button id="SendChangeLogin" type="submit"> Changer mon Identifiant </button>
            </p>
        </form>

        <form id="DoChangePassword" action="account_processing.php" method="post">
            <p>
                Nouveau Mot de passe :
                <input id="DoChangePassword" autocomplete="off" name="DoChangePassword" type="text"></br>
                Ancien Mot de passe:
                <input id="Password" autocomplete="off" autocapitalize="off" name="Password" type="password"></br>
                <button id="SendChangePassword" type="submit"> Changer mon Mot de passe </button>
            </p>
        </form>
    </div>

<?php

} else {
    header('Location:indexlogin.php?error=ERROR_auth');
}
