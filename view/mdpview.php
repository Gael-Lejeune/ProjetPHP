<div class="container-form-mdp">
    <h1> Ha, bah bravo ! </h1>
    <h2> T'as encore oublié ton Mot De Passe ! </h2>

    <form class="form" action="<?php echo $mdp_processing ?>" method="post">
        <p> E-mail </p>
        <input class="bouton" type="email" name="email" required />
        <div class="a2" style="margin-top: 5px;"> <p>Veuillez renseigner l'adresse E-mail correspondante à votre compte ! </p> </div>
        <input class="submit2" type="submit" name="action" value="Réinitialiser votre Mot De Passe" style="margin-top: 30px;";/>
        <?php if ($_SESSION['login'])
            echo '<div class="a2"> <p> Vous voulez retourner à votre compte client ?</p> <a class="a2a" href="'.$myprofilecontroller.'"> Consulter mon profil </a> </div>';
        else
            echo '<div class="a2"> <p> Besoin d\'un compte ? </p> <a class="a2a" href="'.$inscriptioncontroller.'" style="color: #2461cc;"> S\'inscrire </a> </div>';
        ?>
        </div>
    </form>
</div>

<div class="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>

