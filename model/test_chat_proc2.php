<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start();

$dbLink=dtbconnect();

$action=$_POST['action'];

//database: id_discussion / est_ouverte / test (a supprimer plus tard c'etait juste pour faire des test)
//ouvrir une discussion :
if ($action == 'discussion'){
    $user=$_SESSION['email'];


    $query="INSERT INTO discussion VALUES ()";
    querycheck($dbLink, $query);

    header("Location:$message_controller");

    //database: id_msg / user_msg / id_discussion / est_ouvert / texte
} elseif ($action == 'message') {
    $user=$_SESSION['email'];
    $texte = $_POST['texte'];
    $id_discussion= $_POST['id'];

    $query="SELECT texte,id_msg FROM message WHERE message.id_discussion=$id_discussion and est_ouvert=1";
    $dbResult = mysqli_query($dbLink, $query);

    $message = mysqli_fetch_assoc($dbResult);

    if ($message == NULL) {
        $query='INSERT INTO message(user_name, id_discussion) VALUES (';
        $query.='"'.$user.'",';
        $query.=$id_discussion.')';

    } else {
        $texte = $message['texte'].' '.$texte;
        $query="UPDATE message SET texte = '$texte' WHERE id_msg= ".$message['id_msg'];
    }

    $dbResult = querycheck($dbLink, $query);

    header("Location:$message_controller");
} elseif ($action == "fermer_message") {
    $id_discussion= $_POST['id'];

    $query="SELECT texte,id_msg FROM message WHERE id_discussion=$id_discussion and est_ouvert=1";
    $dbResult = mysqli_query($dbLink, $query);

    $message = querycheck($dbLink, $query);

    $query = "UPDATE message SET est_ouvert = 0 WHERE id_msg=".$message['id_msg'];

    querycheck($dbLink, $query);
}

//affichage d'une discussion ::






//Recuperation des variables en post
//$id_msg=($_POST['id_msg']);
//$user_msg=($_POST['user_msg']);
//$id_discussion=($_POST['id_discussion']);
//$est_ouvert=($_POST['est_ouvert']);
//$texte=($_POST['texte']);

//Definition de la requete mySql
//$query="INSERT INTO message (texte) VALUES ('$texte')";

//Verification de la viabilité de la requete
//$dbResult = querycheck($dbLink, $query, 'Requete viable');

//lit le résultat de la requête dans un tableau associatif
//$dbRow=mysqli_fetch_assoc($dbResult);
//echo $dbRow;

//redirection HTTP vers test_chat.php

//header("Location: $test_chat?step=ERROR_mdp");


//Recuperation des variables
//$texte=$_POST['texte'];


?>
