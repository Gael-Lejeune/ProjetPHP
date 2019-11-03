<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start(); // On demarre la session

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);

// On recupere la variable action
$action = $_POST['action'];

// On recupere la discussion sue laquelle on va devoir faire des modifications
$disc_array=$manager->getDiscussion($_SESSION['discussion']);
$discussion = new Discussion($disc_array);

// si on veux ajouter un essage
if ($action == 'Ajouter mon message')
{
    // si la discussion est ouverte
    if ($discussion->getState() == 1)
    {
        // on recupere le message ouvert de cette discussion
        $message = $manager->getOpenMsg($discussion->getIdDiscussion());

        // si l'utilisateur n'a pas encore ecrit dans ce message
        if ($manager->canWrite($_SESSION['email'], $discussion->getIdDiscussion(), $message->getIdMsg()))
        {
            // On recupere le texte qu'il veux ecrire
            $msg = $_POST['texte'];
            // Si il ne veux pas ecrire plus de deux mots
            if (preg_match('/^[^\s]+\s?[^\s]*$/', $msg))
                $manager->concatenation($message, $msg); // On ajoute le message
            else
                header("location:$page_disc_controller?error=ERROR_tolong"); // Si le message est trop long, on renvoi un message d'erreur
        }
        else
            {
            header("location:$page_disc_controller?error=ERROR_write"); // Si l'utilisateur a deja ecrit, on renvoi un message d'erreur
        }
    }
    header("location:$page_disc_controller"); // on revient sur la page

}
// si on veux fermer le message
else if ($action == 'Fermer le message')
{
    // on recupere le message a fermer
    $message = $manager->getOpenMsg($discussion->getIdDiscussion());

    // on verifie que l'utilisateur ai bien ecrit dedans avant de l'autorisé à le fermer
    if (!$manager->canWrite($_SESSION['email'], $discussion->getIdDiscussion(), $message->getIdMsg()))
    {
        // si le message n'est pas vide
        if ($manager->getTexte($message->getIdMsg()) != '')
            // on ferme le message
            $manager->closeMsg($message);
    }

    header("location:$page_disc_controller"); // on revient sur la page

}
// si on veux liker la discussion
else if ($action == 'Like')
{
    // on verifie que l'utilisateur n'ai pas encore liker la discussion
    if ($manager->canLike($_SESSION['email'], $discussion->getIdDiscussion()))
    {
        // on augmente le nombre de like
        $manager->incrLike($discussion->getIdDiscussion());
    }
    else
        {
        header("location:$page_disc_controller?error=ERROR_canNotLike"); // si la personne a deja like on renvoi un message d'erreur
    }

    header("location:$page_disc_controller"); // on revient sur la page
} else if ($action == 'X') {

} else if ($action == 'Supprimer la discussion') {
    $manager->deleteDisc($_SESSION['discussion']);
    $_SESSION['discussion'] = NULL;
    header("location:$indexcontroller");
} else {
    header("location:$page_disc_controller?error=ERROR_processing"); // si l'action n,'xiste pas, on renvoit un message d'erreur
}
