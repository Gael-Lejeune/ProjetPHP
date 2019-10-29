<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start();

include_classe();
$db = dtb_connect_PDO();

$manager = new UserManager($db);

//$owner = new User($_SESSION['name'], $_SESSION['email'], $_SESSION['password']);


$action=$_POST['action'];

$id_discussion = 2;

if ($action == 'message') {
    $query = "INSERT INTO message VALUES ($id_discussion,)";
}

/*//database: id_discussion / est_ouverte / test (a supprimer plus tard c'etait juste pour faire des test)
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
*/



?>
