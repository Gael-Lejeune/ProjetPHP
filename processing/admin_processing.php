<?php
include "../model/dtb.inc.php";
include "../model/utils.inc.php";
include "../model/link.inc.php";

session_start();

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
// Création des Managers pour utiliser les classes
$manager = new UserManager($db);
$disc_manager = new Disc_Mess_Manager($db);

// On ouvre le fichier qui contient les variables du serveur
$file = fopen("../ParamsAdmin.txt", "r+");

//Si la personne est bien connecté
if(loginckeck($manager)) {

    // On récupère l'utilisateur
    $user = $manager->getUser($_SESSION['email']);

    //Si la personne est bien admin
    if ($user->getRole() == 'admin') {

        // On recupere la valeur du submit (qui contient l'action à faire)
        $action = $_POST['submit'];

        // Si l'utilisateur veux changer la pagination du site
        if ($action == 'pagination') {

            // On recupere la valeur actuelle de la pagination dans le fichier
            fseek($file,0);
            $contenu = file("../ParamsAdmin.txt"); // $contenu contient les variables du serveur
            $contenu[0] = $_POST['new_pagination']; // On recupere la nouvelle pagination
            $params = $contenu[0].PHP_EOL.$contenu[1]; // On prepare l'insertion dans le fichier
            fputs($file,$params); // On modifie la valeur dans le fichier

            header("location:$admin_controller"); // On revient à la même page

        // Si l'utilisateur veux changer le nombre de discussion ouvertes maximum autorisé
        } else if ($action == 'nbDisc') {

            // On recupere la valeur actuelle du nombre de discussion maximum dans le fichier
            fseek($file,0);
            $contenu = file("../ParamsAdmin.txt"); // $contenu contient les variables du serveur
            $ancien_nb = $contenu[1]; // On sauvegarde l'ancien nombre
            $contenu[1] = $_POST['new_nbDiscMax']; // On recupere la nouvelle pagination
            $params = $contenu[0].$contenu[1].PHP_EOL; // On prepare l'insertion dans le fichier
            fputs($file,$params); // On modifie la valeur dans le fichier

            // Si le nouveau nombre est inférieur à l'ancien nombre autorisé (on va devoir fermer certaines discussions chez les utilisateurs qui ont plus de discussions ouvertes que le nouveau nombre autorisé)
            if ($contenu[1] < $ancien_nb) {
                // On récupère tout les mails de tout les utilisateurs
                $mails = $manager->getMails();

                // Pour chaque utilisateur
                foreach ($mails as $mail) {

                    // On regarde combien il a de discussion ouverte
                    $nb_disc_ouv = $disc_manager->getNbOpenDiscForUser($mail['email']);

                    // Si il est supérieur au nouveau nombre de discussion ouverte autorisé
                    if ($nb_disc_ouv > $contenu[1]) {

                        // On calcul le nombre de discussion a fermer pour cet utilisateur
                        $nbre_disc_a_fermer = $nb_disc_ouv - $contenu[1];

                        // On recupere les plus anciennes discussions ouvertes de l'utilisateur (on en recupere autant que le nombre necessaire)
                        $disc_a_fermer = $disc_manager->getOldDisc($nbre_disc_a_fermer, $mail['email']);

                        // Pour chacune de ces discussions on ferme la discussion
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

            // Si l'email est bien enregistré dans la base de donnée
            if ($manager->email_exist($user_modif->getEmail())) {
                // On vérifie qu'il soit bien membre et pas admin (on ne peut pas modifier le compte d'un autre administrateur)
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
                        // On revient sur la page
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
    header("location:$logincontroller?error=ERROR_auth");
}
