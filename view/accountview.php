<!-- HTML de la page -->

<!--Fleche retour -->
<a class="arrow" href="<?php echo $indexcontroller ?>"><img src="<?php echo $arrow ?>"></a>

<!--En tete de la page -->
<div class='Title'>
    <div> <img alt="Logo" src="<?php echo $logo ?>"> </div>
    <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="index.php"> FreeNote </a> </div>
</div>

<h1> Informations Personnelles </h1>

<!--Formulaires de changement d'informations-->

<!-- division qui affiche les informations de l'utilisateur -->
<div class="container-form">
    <!--Affichage des informations de l'utilisateur -->
    <div class="informations_personnelles">
        <!-- On affiche les variables definies au dessus -->
        <p> Nom : <?php echo $name ?> </p></br>
        <p> email : <?php echo $email ?> </p></br>

    </div>
</div>

<div class="container-form">
    <!--Formulaire pour changer le nom de l'utilisateur -->
    <form class="form" action="<?php echo $account_processing ?>" method="post">
        <div>
            <p> Nouvel identifiant : </p>
            <input class="bouton" autocomplete="off" name="DoChangeLogin" type="text"/></br>
        </div>
        <div>
            <p> Mot de passe actuel: </p>
            <input class="bouton" autocomplete="off" autocapitalize="off" name="Password" type="password"/></br>
        </div>
        <button class="submit" type="submit" value="login" name="submit"> Changer mon Identifiant </button>
    </form>
</div>

<div class="container-form">
    <!--Formulaire pour changer le mot de passe -->
    <form id="DoChangePassword" action="<?php echo $account_processing ?>" method="post">
        <p>
            Ancien Mot de passe:
            <input class="bouton" id="Password" autocomplete="off" autocapitalize="off" name="Password" type="password"/></br>
            Nouveau Mot de passe :
            <input class="bouton" id="DoChangePassword" autocomplete="off" name="DoChangePassword" type="text"/></br>
            <button id="SendChangePassword" type="submit" value="password" name="submit"> Changer mon Mot de passe </button>
        </p>

    </form>
</div>
