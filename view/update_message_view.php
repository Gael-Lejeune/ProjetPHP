<script type="text/javascript" src="../java/navbar.js"></script>

<?php
require $navbar;
?>

<div class="container-chat-global">
    <h1> Quel texte voulez vous entrer : </h1>

    <form class="form" action="../model/update_message_processing.php" method="post">
        <p> Texte </p>
        <input class="bouton" type="text" name="text" value="<?php echo $message->getText() ?>" maxlength="20" placeholder="Entrer un message de deux mots maximum" pattern="^([A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]* [A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*)$|^([A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*)$"/>
        <button class="submit2" type="submit" name="id" value="<?php echo $message->getIdMsg() ?>"> Modifier le message </button>
    </form>
</div>

<div id="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>
