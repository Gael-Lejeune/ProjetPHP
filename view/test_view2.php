<?php


$dbLink = dtbconnect();
?>

<form class="form" action="<?php echo $message_proc ?>" method="post">
    <p>Numero de la discussion dans laquelle vous voulez ecrire : </p>
    <input class="buuton" type="number" name="id" required/>

    <p> Votre message (un mot entre 1 et 15 caractères): </p>

    <input class="bouton" type="text" name="texte" minlength="1" maxlength="15" required placeholder="Rentrez votre message ici"/>
    <input class="submit" type="submit" name="action" value="message"/>
</form>


ouvrir une discussion :
<form action="<?php echo $message_proc ?>" method="post">
    <input class="submit" type="submit" name="action" value="discussion"/>
</form>

<?php

$query="SELECT * FROM discussion WHERE id_discussion=1";
$dbResult=querycheck($dbLink, $query);
$dbDiscussion = mysqli_fetch_assoc($dbResult);

$query="SELECT id_msg FROM message WHERE id_discussion = ".$dbDiscussion['id_discussion'];
$dbResult=querycheck($dbLink, $query);
$dbMessage = mysqli_fetch_assoc($dbResult);

$query="SELECT texte FROM message WHERE id_msg IN $dbMessage";
$dbResult=querycheck($dbLink, $query);
$dbTexte = mysqli_fetch_assoc($dbResult);

echo 'afficher une discussion :'.$dbTexte;
?>

afficher une discussion :
<div>



</div>