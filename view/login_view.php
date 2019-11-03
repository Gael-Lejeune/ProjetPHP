<?php
require $navbar;
?>

<div class="container-form-login"> <!-- Création du bloc qui contiendra le formulaire de connection -->
    <h1> Ha, te revoila ! </h1>
    <h2> Nous sommes si heureux de te revoir ! </h2>
    <form class="form" action="<?php echo $loginmodel ?>" method="post"> <!-- Formulaire qui contiendra les informations de connection de l'utilisateur -->
        <p> E-mail </p>
        <input class="bouton" type="email" name="email" placeholder="example@example.com" required />
        <p> Mot de Passe </p>
        <input class="bouton" type="password" name="password" title="password" autocomplete="off" maxlength="30" required />
        <a class="a1" href="<?php echo $mymdpcontroller ?>"> Tu as oublie ton mot de passe ? </a>
        <input class="submit2" type="submit" name="action" value="Se connecter"/> <!-- Bouton qui lance la procédure d'envoie vers $loginmodel -->
        <div class="a2"> <p> Besoin d'un compte ? </p> <a  class="a2a" href="<?php echo $inscriptioncontroller ?>"> S'inscrire </a> </div>
    </form>
    <?php
    if ($_GET['error'] == 'ERROR')
        echo '<p class="error-mdp"> Erreur : le mot de passe ou le mail rentré ne correspondent pas. </p>';
    //Formulaire de login

    if ($_GET['error'] == 'ERROR_auth')
    {
        echo '<p class="error-mdp"> Vous devez être connecté pour acceder à cette page. </p>';
    }
    //Formulaire de login
    ?>
</div>



