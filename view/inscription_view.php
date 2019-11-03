<?php
require $navbar;
?>

<div class="container-form-inscription"> <!-- Création du bloc qui contiendra le formulaire d'inscription -->
    <h1> Ha, te voila ! </h1>
    <h2> Nous t'attendions depuis longtemps ! </h2>
    <form class="form" action="<?php echo $inscriptionmodel ?>" method="post"> <!-- Formulaire qui contiendra les informations d'inscription de l'utilisateur -->
        <p> Votre Nom </p>
        <input class="bouton" type="text" name="name" required maxlength="20" placeholder="Toto"/>
        <p> E-mail </p>
        <input class="bouton" type="email" name="email" required placeholder="example@example.com"/>
        <p> Mot de Passe </p>
        <input class="bouton" type="password" name="password" required/>
        <p> Confirmation Mot de Passe </p>
        <input class="bouton" type="password" name="passwordconf" required/>
        <div class="container-conditions">
            <input class="conditions" type="checkbox" name="conditions" value="ok" required/>
            <p> Conditions générales </p>
        </div>
        <input class ="submit" type="submit" name="action" value="Créer un compte"/> <!-- Bouton qui lance la procédure d'envoie vers $inscriptionmodel -->
        <div class="a2"> <p> Un problème ? </p> <a href="<?php echo $mymdpcontroller ?>"> Mot de passe oublié ? </a> </div>
        <div class="a2"> <p> Tu as oublié quelque chose ? </p> <a href="<?php echo $logincontroller ?>"> Tu as déjà un compte ? </a> </div>
    </form>
</div>
