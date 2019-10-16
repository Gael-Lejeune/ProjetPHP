<form class="form" action="<?php echo $message_proc ?>" method="post">
    <p> Votre message (un mot entre 1 et 15 caractères)</p>
    <input class="bouton" type="text" name="texte" minlength="1" maxlength="15" required placeholder="Rentrez votre message ici"/>
    <input class="submit" type="submit" name="action" value="message"/>
</form>


ouvrir une discussion :
<form action="<?php echo $message_proc ?>" method="post">
    <input class="submit" type="submit" name="action" value="discussion"/>
</form>