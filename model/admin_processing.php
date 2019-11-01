<?php

include "../model/dtb.inc.php";
include "../model/utils.inc.php";
include  "../model/link.inc.php";

session_start();

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db);

//Si la personne est bien connecté
if(loginckeck($manager)) {
    //Si la personne est bien admin
    $user = $manager->getUser($_SESSION['email']);
    if ($user->getRole() == 'admin') {

        // On recupere la valeur du submit (qui contient l'action à faire)
        $action = $_POST['submit'];

        // Si l'utilisateur veux changer la pagination du site
        if ($action == 'pagination') {



        // Si l'utilisateur veux changer le nombre de discussion ouvertes maximum autorisé
        } else if ($action == 'nbDisc') {



        // Si l'administrateur veux modifier les informations d'un utilisateur
        } else if ($action == 'user') {
            // On recupere l'utilisateur dont on va modifier les informations
            $user_modif = $manager->getUser($_POST['email']);

            if ($user->getRole() == 'member') {
                // Si on veux modifier l'email : il va faloir creer un nouvel utilisateur et supprimer l'ancien car l'email est cle primaire
                if (isset($_POST['new_email'])) {

                    // On modifie le nom de l'utilisateur si c'est demande
                    if (isset($_POST['name'])) {
                        $user->setUser_name($_POST['name']);
                    }

                    // On modifie le role de l'utilisateur si c'est demande
                    if (isset($_POST['role'])) {
                        $user->setRole($_POST['role']);
                    }

                    // On creer et ajoute le nouvel utilisateur dans la base de donnee
                    $new_user = new User (['user_name' => $user->getName(), 'email' => $_POST['new_email'], 'password' => $user->getPassword(), 'role' => $user->getRole()]);
                    $manager->add($new_user);

                    // On supprime l'ancien utilisateur
                    $manager->delete($_POST['email']);

                // Sinon on va juste update les informations de l'utilisateur
                } else {

                    // On modifie le nom si c'est demande et on met a jour la base de donnee
                    if (isset($_POST['name'])) {
                        $user->setUser_name($_POST['name']);
                        $manager->updateName($user);
                    }

                    // On modifie le role si c'est demande et on met a jour la base de donnee
                    if (isset($_POST['role'])) {
                        $user->setRole($_POST['role']);
                        $manager->updateRole($user);
                    }
                }
            } else {
                header("location:$admin_controller?error=ERROR_notmember");
            }

            header("location:$admin_controller");

        }
    } else {
        header("location:$admin_controller?error=ERROR_youAreNotAdmin");
    }
} else {
    header("location:$admin_controller?error=ERROR_auth");
}