<?php

include 'model/utils.inc.php';
include 'model/link.inc.php';

start_page("login", "html/css/signup.css", "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

?>
<a class="arrow" href="<?php echo $indexaddr ?>"><img src="https://img.icons8.com/nolan/50/000000/up-left.png" style="margin-top: -20px;"></a>

<div class='Title' style="margin-top: 20px;">
    <div> <img alt="Logo" src="<?php echo $logo ?>"> </div>
    <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="<?php echo $indexaddr ?>"> FreeNote </a> </div>
</div>

<h1> Discussion </h1>

<div class="container-form">
    <form class="form" action="<?php echo $test_chat_processing ?>" method="post">
        <p> Votre message (un mot entre 1 et 15 caractères)</p>
        <input class="bouton" type="text" name="texte" minlength="1" maxlength="15" required placeholder="Rentrez votre message ici"/>
        <input class="submit" type="submit" name="action" value="Envoyer"/>
    </form>
</div>

<?php
end_page();
?>
