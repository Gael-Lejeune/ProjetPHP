<?php

include 'utils.inc.php';

//ouverture connexion serveur BD
$dbLink = mysqli_connect('mysql-latableronde.alwaysdata.net', '191121', 'tableronde')
or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

//sélection BD
mysqli_select_db($dbLink , 'latableronde_dtb')
or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

//vérif du nom
if (isset($_POST['name']))
{
    $name=$_POST['name'];
}
else{
    $name=" ";

}

//vérif de la civilité
if (isset($_POST['civilite']))
{
    $civilite=$_POST['civilite'];
}
else{
    $civilite=" ";
}

//vérif du mail
if (isset($_POST['email']))
{
    $email=$_POST['email'];
}
else{
    $email=" ";
}

//vérif du mot de passe
if (isset($_POST['password']))
{
    $password=$_POST['password'];
}
else{
    $password=" ";
}

//récup variables en POST
$name = $_POST['name'];
$civilite = $_POST['civilite'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordconf = $_POST['passwordconf'];
$conditions = $_POST['conditions'];
$action = $_POST['action'];


if ($conditions == 'ok') {
    if ($password == $passwordconf) {
        //insertion dans BD
        $query='INSERT INTO user(name, civilite, email, password)VALUES(';
        $query.='"'.$name.'",';
        $query.='"'.$civilite.'",';
        $query.='"'.$email.'",';
        $query.='"'.$password.'")';



        if(!($dbResult = mysqli_query($dbLink, $query)))
        {
            echo 'Erreur de requête<br/>';
            // type d'erreur
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/><br/>';
            // requête envoyée
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        else
        {
            echo 'Inscription enregistrée !' . '<br/>';
        }

        //affichage après validation du formulaire
        if ($action == 'OK')
        {
            $message1 = '<p>' . 'Félicitations ! Vous êtes maintenant inscrit !' . '</p>' . '</br>';
            echo $message1;
            $message2 = 'Votre email : ' . PHP_EOL . $email . '<br/>';
            echo $message2;
            $message3 = 'Votre mot de passe : ' . PHP_EOL . $password;
            echo $message3;
            mail($email, 'Votre Inscription', $message1, $message2,$message3);
        }
        else
        {
            echo '<br/><em>Bouton non géré !</em><br/>';
        }
    } else {
        header ('Location:formulaire_inscription.php?step=ERROR_mdp');

    }
} else {
    header ('Location:formulaire_inscription.php?step=ERROR_cond');
}



?>


