<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);

$messagesParPage = 2;

//Une connexion SQL doit être ouverte avant cette ligne...
$total=$manager->getNbDiscussion(); //Nous récupérons le contenu de la requête dans $retour_total

$nombreDePages=ceil($total/$messagesParPage); // Nombre de page necessaire à l'affichage de toutes les discussions en fonction de la pagination

if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
    $pageActuelle=$_GET['page'];

    if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
    {
        $pageActuelle=$nombreDePages;
    }
}
else // Sinon
{
    $pageActuelle=1; // La page actuelle est la n°1
}

$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

$result = $manager->getDiscussionPagination($premiereEntree,$messagesParPage); // On récupère le nombre de discussion necessaire

// Gestion des onglets presents dans la barre de navigation
if ($_SESSION['login']) // si la personne est connecte
{
    $user_manager = new UserManager($db);
    $user = $user_manager->getUser($_SESSION['email']);
    $role = $user->getRole(); // On recupere son role
} else {
    $role = 'visiteur'; // Sinon il est simplement visiteur
}
