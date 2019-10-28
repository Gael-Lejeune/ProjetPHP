<?php

$dblink=dtbconnect();

$email=$_POST['email'];

$query="SELECT email FROM user WHERE email='$email'";

var_dump($email);
exit;

if (($dbResult = mysqli_query($dbLink, $query))) {

    $aleatoire=rand(0,100000);

    $new_password = md5($aleatoire);

    $message = "Voici votre nouveau mot de passe : ".$new_password."\nVous pourrez le modifier dans la section myProfile";
    mail($email, 'Réinitialisation de votre mot de passe Free Note', $message);

    $query = "UPDATE user SET password=md5($new_password) WHERE email='$email'";
    $dbResult = querycheck($dblink, $query);

    header("Location:$logincontroller");

} else {
    header("Location:$logincontroller");
}

