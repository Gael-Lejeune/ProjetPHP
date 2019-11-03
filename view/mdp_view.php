<?php
require $navbar;
?>

<div class="container-form-mdp"> <!-- Création du bloc contenant le formulaire de réinitialisation de mot de passe -->
    <h1> Ha, bah bravo ! </h1>
    <h2> T'as encore oublié ton Mot De Passe ! </h2>

    <form class="form" action="<?php echo $mdp_processing ?>" method="post"> <!-- Création du formulaire pour la modification du mot de passe qui envoie les informations à $mdp_processing -->
        <p> E-mail </p>
        <input class="bouton" type="email" name="email" required placeholder="example@example.org"/>
        <div class="a2" style="margin-top: 5px;"> <p>Veuillez renseigner l'adresse E-mail correspondante à votre compte ! </p> </div>
        <input class="submit2" type="submit" name="action" value="Réinitialiser votre Mot De Passe" style="margin-top: 30px;"/> <!-- Bouton qui lance la procédure d'envoie vers $mdp_processing -->
        <?php if ($_SESSION['login'])
            echo '<div class="a2"> <p> Vous voulez retourner à votre compte client ?</p> <a class="a2a" href="'.$myprofilecontroller.'"> Consulter mon profil </a> </div>';
        else
            echo '<div class="a2"> <p> Besoin d\'un compte ? </p> <a class="a2a" href="'.$inscriptioncontroller.'" style="color: #2461cc;"> S\'inscrire </a> </div>';
        ?>
    </form>
</div>



