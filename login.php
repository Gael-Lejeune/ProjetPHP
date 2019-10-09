<?php
include "utils.inc.php";
include "link.inc.php";

start_page("login", $logincss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

$step=$_GET['step'];
echo $step, '<br/>';


//Formulaire de login
?>
<a class="arrow" href="<?php echo $indexaddr ?>"><img src="https://img.icons8.com/nolan/50/000000/up-left.png"></a>

<div class='Title'>
    <div> <img alt="Logo" src="<?php echo $logo ?>"> </div>
    <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="<?php echo $indexaddr ?>"> FreeNote </a> </div>
</div>

<h1> Se Connecter </h1>

<div class="container-form">
    <form class="form" action="<?php echo $login_processing ?>" method="post">
        <div class="fond-gris">
        <p> Email </p>
        <input class="bouton" type="text" name="email" required />
        <p> Mot de Passe </p>
        <input class="bouton" type="password" name="password" title="password" autocomplete="off" maxlength="30" style="margin-bottom: 20px; required"/>
        </div>
        <input class ="submit" type="submit" name="action" value="Se connecter" style="margin-bottom: 20px;"/>
    </form>
    <div class="connexion">
        <a href="<?php echo $indexaddr ?>"> Mot de passe oublié ? S'inscrire</a>
    </div>
</div>

<?php

end_page();
?>

