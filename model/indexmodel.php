<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);

$messagesParPage = 2;
//Une connexion SQL doit être ouverte avant cette ligne...
$total=$manager->getNbDiscussion(); //Nous récupérons le contenu de la requête dans $retour_total

$nombreDePages=ceil($total/$messagesParPage);

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

$result = $manager->getDiscussionPagination($premiereEntree,$messagesParPage);


$msg_Disc1 = $manager->getMsgForIDDisc($result[0]['idDiscussion']);
$msg_Disc2 = $manager->getMsgForIDDisc($result[1]['idDiscussion']);
