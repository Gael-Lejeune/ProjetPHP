<?php
require $navbar;
?>

<div class="container-form-login">
    <h1> Ha, te revoila ! </h1>
    <h2> Nous sommes si heureux de te revoir ! </h2>
    <form class="form" action="<?php echo $loginmodel ?>" method="post">
        <p> E-mail </p>
        <input class="bouton" type="text" name="email" required />
        <p> Mot de Passe </p>
        <input class="bouton" type="password" name="password" title="password" autocomplete="off" maxlength="30" required/>
        <a class="a1" href="<?php echo $mymdpcontroller ?>"> Tu as oublie ton mot de passe ? </a>
        <input class="submit2" type="submit" name="action" value="Se connecter"/>
        <div class="a2"> <p> Besoin d'un compte ? </p> <a  class="a2a" href="<?php echo $inscriptioncontroller ?>"> S'inscrire </a> </div>
    </form>
</div>

<div id="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>
