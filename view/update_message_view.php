<script type="text/javascript" src="../java/navbar.js"></script>

<?php
require $navbar;
?>

<div class="container-chat-global"> <!-- Création du bloc contenant le formulaire pour la modification d'un message spécifique -->
    <h1> Quel texte voulez vous entrer : </h1>

    <form class="form" action="../processing/update_message_processing.php" method="post"> <!-- Formulaire qui contiendra le nouveau message modifié qui sera ensuite envoyé dans la discussion via : ../processing/update_message_processing.php -->
        <p> Texte </p>
        <input class="bouton" type="text" name="text" value="<?php echo $message->getText() ?>" maxlength="20" placeholder="Entrer un message de deux mots maximum" pattern="^([A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]* [A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*)$|^([A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*)$"/>
        <button class="submit2" type="submit" name="id" value="<?php echo $message->getIdMsg() ?>"> Modifier le message </button> <!-- Bouton qui lance la procédure d'envoie vers $loginmodel : ../processing/update_message_processing.php -->
    </form>
</div>
