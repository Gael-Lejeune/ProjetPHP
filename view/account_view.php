<?php
require $navbar;

if (isset($_GET['error']) && $_GET['error']) {
    echo "Mot de passe incorrect";
}
?>

<div class="container"> <!-- Création de la div contenant les 3 blocs de modification -->
    <!-- division qui affiche les informations de l'utilisateur -->
    <div class="container-form-infopers1">
        <h4> Informations <br/> Personnelles </h4>
        <!--Affichage des informations de l'utilisateur -->
        <div class="info">
            <!-- On affiche les variables definies au dessus -->
            <p> Identifiant </p>
            <div class="info-personnelles"> <p> <?php echo htmlspecialchars($user->getName()) ?> </p></div>
            <p> E-mail </p>
            <div class="info-personnelles"> <p> <?php echo htmlspecialchars($user->getEmail()) ?> </p></div>

        </div>
    </div>

    <div class="container-form-infopers"> <!-- Création du bloc de modification de son identifiant -->
        <h4> Changer mes données <br/> personnelles </h4>
        <!--Formulaire pour changer le nom de l'utilisateur -->
        <form class="form" action="<?php echo $account_processing ?>" method="post">
            <p> Nouvel identifiant : </p>
            <input class="bouton" autocomplete="off" name="new_login" type="text" required/></br>
            <p> Mot de passe actuel: </p>
            <input class="bouton" autocomplete="off" autocapitalize="off" name="password" type="password"/></br>
            <?php
            if (isset($_GET['error']) && $_GET['error']) {
                echo "Mot de passe incorrect";
            }
            ?>
            <button class="submit1" type="submit" value="login" name="submit"> Changer mon Identifiant </button> <!-- bouton qui lance la procédure d'envoie vers $account_processing -->
            <div class="a21"> <p> Un problème ? </p> <a href="<?php echo $mymdpcontroller ?>"> Mot de passe oublié ? </a> </div>

        </form>
    </div>

    <div class="container-form-infopers"> <!-- Création du bloc de modification de son mot de passe-->
        <h4> Changer mon mot <br/> de passe </h4>
        <!--Formulaire pour changer le mot de passe -->
        <form class="form" action="<?php echo $account_processing ?>" method="post">
            <p> Ancien Mot de passe: </p>
            <input class="bouton" id="Password" autocomplete="off" autocapitalize="off" name="password" type="password" required/>
            <p> Nouveau Mot de passe : </p>
            <input class="bouton" id="DoChangePassword" autocomplete="off" name="new_password" type="text" required/>
            <button class="submit1" type="submit" value="password" name="submit"> Changer mon Mot de passe </button> <!-- bouton qui lance la procédure d'envoie vers $account_processing -->
            <div class="a21"> <p> Un problème ? </p> <a href="<?php echo $mymdpcontroller ?>"> Mot de passe oublié ? </a> </div>
        </form>
    </div>
</div>
