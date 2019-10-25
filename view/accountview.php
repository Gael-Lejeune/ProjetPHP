<div class="container">
    <!-- division qui affiche les informations de l'utilisateur -->
    <div class="container-form-infopers1">
        <h4> Informations <br/> Personnelles </h4>
        <!--Affichage des informations de l'utilisateur -->
        <div class="form">
            <!-- On affiche les variables definies au dessus -->
            <p> Identifiant </p>
            <div class="info-personnelles"> <p> <?php echo $name ?> </p></div>
            <p> E-mail </p>
            <div class="info-personnelles"> <p> <?php echo $email ?> </p></div>

        </div>
    </div>

    <div class="container-form-infopers">
        <h4> Changer mes données <br/> personnelles </h4>
        <!--Formulaire pour changer le nom de l'utilisateur -->
        <form class="form" action="<?php echo $account_processing ?>" method="post">
            <p> Nouvel identifiant : </p>
            <input class="bouton" autocomplete="off" name="DoChangeLogin" type="text"/></br>
            <p> Mot de passe actuel: </p>
            <input class="bouton" autocomplete="off" autocapitalize="off" name="Password" type="password"/></br>
            <button class="submit1" type="submit" value="login" name="submit"> Changer mon Identifiant </button>
            <div class="a21"> <p> Un problème ? </p> <a href="<?php echo $myprofilecontroller ?>"> Mot de passe oublié ? </a> </div>

        </form>
    </div>

    <div class="container-form-infopers">
        <h4> Changer mon mot <br/> de passe </h4>
        <!--Formulaire pour changer le mot de passe -->
        <form class="form" action="<?php echo $account_processing ?>" method="post">
            <p> Ancien Mot de passe: </p>
            <input class="bouton" id="Password" autocomplete="off" autocapitalize="off" name="Password" type="password"/>
            <p> Nouveau Mot de passe : </p>
            <input class="bouton" id="DoChangePassword" autocomplete="off" name="DoChangePassword" type="text"/>
            <button class="submit1" type="submit" value="password" name="submit"> Changer mon Mot de passe </button>
            <div class="a21"> <p> Un problème ? </p> <a href="<?php echo $myprofilecontroller ?>"> Mot de passe oublié ? </a> </div>



        </form>
    </div>
</div>

<div class="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>

</body>
</html>

