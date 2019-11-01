<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db);

if (isset($_POST['email']))
    $email=$_POST['email'];

if ($manager->email_exist($email)) {
    $user = $manager->getUser($email);
    $new_password_user = $manager->password();
    $new_password_bdd = md5($new_password_user);

    $user->setPassword($new_password_bdd);
    $manager->updatePassword($user);

    $message = 'Voici votre nouveau mot de passe : '.$new_password_user.'<br>';
    $message .= 'Vous pourrez le changer dans votre page \'My profile\'';

    mail($user->getEmail(), 'Réinitialisation de votre mot de passe FreeNote', $message);

    if ($_SESSION['login']) {
        header("location:$myprofilecontroller");
    } else {
        header("location:$logincontroller");
    }
}






