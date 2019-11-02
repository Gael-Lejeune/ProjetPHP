<?php
include "../model/dtb.inc.php";
include "../model/utils.inc.php";
include  "../model/link.inc.php";
session_start();
include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db);
$disc_manager = new Disc_Mess_Manager($db);
$file = fopen("../ParamsAdmin.txt", "r+");
//Si la personne est bien connecté
if(loginckeck($manager)) {
    //Si la personne est bien admin
    $user = $manager->getUser($_SESSION['email']);
    if ($user->getRole() == 'admin') {
        // On recupere la valeur du submit (qui contient l'action à faire)
        $action = $_POST['submit'];
        // Si l'utilisateur veux changer la pagination du site
        if ($action == 'pagination') {
            fseek($file,0);
            $contenu = file("../ParamsAdmin.txt");
            $contenu[0] = $_POST['new_pagination'];
            $params = $contenu[0].PHP_EOL.$contenu[1];
            fputs($file,$params);

            header("location:$admin_controller");

            // Si l'utilisateur veux changer le nombre de discussion ouvertes maximum autorisé
        } else if ($action == 'nbDisc') {
            fseek($file,0);
            $contenu = file("../ParamsAdmin.txt");
            $ancien_nb = $contenu[1];
            $contenu[1] = $_POST['new_nbDiscMax'];
            $params = $contenu[0].$contenu[1];
            fputs($file,$params);

            if ($contenu[1] < $ancien_nb) {
                $mails = $manager->getMails();
                foreach ($mails as $mail) {
                    $nb_disc_ouv = $disc_manager->getNbOpenDiscForUser($mail['email']);
                    if ($nb_disc_ouv > $contenu[1]) {
                        $nbre_disc_a_fermer = $nb_disc_ouv - $contenu[1];
                        $disc_a_fermer = $disc_manager->getOldDisc($nbre_disc_a_fermer, $mail['email']);
                        foreach ($disc_a_fermer as $discussion) {
                            $disc_manager->closeDisc($discussion['idDiscussion']);
                        }
                    }
                }
            }

            header("location:$admin_controller");

            // Si l'administrateur veux modifier les informations d'un utilisateur
        } else if ($action == 'user') {
            // On recupere l'utilisateur dont on va modifier les informations
            $user_modif = $manager->getUser($_POST['email']);
            if ($manager->email_exist($user_modif->getEmail())) {
                if ($user_modif->getRole() == 'member') {
                    // Si on veux modifier l'email : il va faloir creer un nouvel utilisateur et supprimer l'ancien car l'email est cle primaire
                    if (isset($_POST['new_email']) and $_POST['new_email'] != '') {
                        // On modifie le nom de l'utilisateur si c'est demande
                        if (isset($_POST['name']) and $_POST['name'] != '') {
                            $user_modif->setUser_name($_POST['name']);
                        }
                        // On modifie le role de l'utilisateur si c'est demande
                        if (isset($_POST['role'])) {
                            $user_modif->setRole($_POST['role']);
                        }
                        // On creer et ajoute le nouvel utilisateur dans la base de donnee
                        $new_user = new User (['user_name' => $user_modif->getName(), 'email' => $_POST['new_email'], 'password' => $user_modif->getPassword(), 'role' => $user_modif->getRole()]);
                        $manager->add($new_user);
                        // On supprime l'ancien utilisateur
                        $manager->delete($_POST['email']);
                        header("location:$admin_controller");

                        // Sinon on va juste update les informations de l'utilisateur
                    } else {
                        // On modifie le nom si c'est demande et on met a jour la base de donnee
                        if (isset($_POST['name']) and $_POST['name'] != '') {
                            $user_modif->setUser_name($_POST['name']);
                            $manager->updateName($user_modif);
                        }
                        // On modifie le role si c'est demande et on met a jour la base de donnee
                        if (isset($_POST['role'])) {
                            $user_modif->setRole($_POST['role']);
                            $manager->updateRole($user_modif);
                        }
                        header("location:$admin_controller");
                    }
                } else {
                    header("location:$admin_controller?error=ERROR_notmember");
                }
            }

        }
    } else {
        header("location:$admin_controller?error=ERROR_youAreNotAdmin");
    }
} else {
    header("location:$admin_controller?error=ERROR_auth");
}
