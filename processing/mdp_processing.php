<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db);

// On recupere l'email envoye
if (isset($_POST['email']))
    $email=$_POST['email'];

// Si le mail est bien enregistré dans la base de donnée
if ($manager->email_exist($email)) {

    // On récupère l'utilisateur correspondant
    $user = $manager->getUser($email);
    // On lui affecte un nouveau mot de passe aleatoire
    $new_password_user = $manager->password();
    $new_password_bdd = md5($new_password_user);

    // On modifie la base de donnée
    $user->setPassword($new_password_bdd);
    $manager->updatePassword($user);

    // On lui envoi un mail pour lui indiquer son nouveau mot de passe et comment il pourat le modifier par la suite
    $message = 'Voici votre nouveau mot de passe : '.$new_password_user."\n";
    $message .= 'Vous pourrez le changer dans votre page \'My profile\'';

    mail($user->getEmail(), 'Réinitialisation de votre mot de passe FreeNote', $message);

    // Si la personne est connecte -> on la renvoi sur la page my profile
    if ($_SESSION['login']) {
        header("location:$myprofilecontroller");
    // sinon on la renvoi sur la page de connexion
    } else {
        header("location:$logincontroller");
    }
}
