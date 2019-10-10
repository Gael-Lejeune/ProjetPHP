<?php
include "utils.inc.php";
include "link.inc.php";

start_page("login", $indexcss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

session_start();

?>
    <!-- Création du fond du header -->
    <div class="background-header">
        <!-- Création du bloc header -->
        <div class="header">
            <!-- Création du bloc avec le logo et le titre du site -->
            <div class='subtitle1'>
                <div> <img alt="Logo" src="<?php echo $logo ?>"> </div>
                <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="<?php echo $indexaddr ?>"> FreeNote </a> </div>
            </div>
            <!-- Création du bloc pour s'inscrire ou consulter son profile en fonction de si l'on est connecter à notre compte ou non -->

            <div class='sign-up'>
                <div> <img alt="sign-up" src="<?php echo $logo ?>"> </div>
                <?php if ($_SESSION['login'])
                        echo '<div class="FreeNote highlightTextIn"> <a alt="My Profile" href="'.$myprofileaddr.'"> My Profile </a> </div>';
                    else
                         echo'<div class="FreeNote highlightTextIn"> <a alt="Sign Up" href="'.$inscriptionaddr.'"> Sign up </a> </div>';
                    ?>
            </div>
            <!-- Création du bloc pour se connecter ou se déconnecte en fonction de si l'on est connecter à notre compte ou non -->
            <div class="log-in">
                <div class="log-in-logo"> <img alt="login" src="<?php echo $logo ?>"> </div>
                <?php if ($_SESSION['login'])
                    echo '<div class="FreeNote highlightTextIn"> <a alt="Log Out" href="'.$logoutaddr.'"> Log Out </a> </div>';
                else
                    echo '<div class="FreeNote highlightTextIn"> <a alt="Log In" href="'.$loginaddr.'"> Log In </a> </div>';
                ?>
            </div>
        </div>
    </div>

    <!-- Création du bloc contenant la description et le titre description -->
    <div class="description">
        <p class="description-subtitle"> Description du site </p>
        <div class="description-FreeNote">
            <p> Haec et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens operatur Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veteres fingentes Iustitiae filiam ex abdita quadam aeternitate tradunt omnia despectare terrena.</p>
        </div>
    </div>
    <!-- Dupplication pour tester -->
    <div class="description">
        <p class="description-subtitle"> Description du site </p>
        <div class="description-FreeNote">
            <p> Haec et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens operatur Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veteres fingentes Iustitiae filiam ex abdita quadam aeternitate tradunt omnia despectare terrena.</p>
        </div>
    </div>

    <!-- Dupplication pour tester -->
    <div class="description">
        <p class="description-subtitle"> Description du site </p>
        <div class="description-FreeNote">
            <p> Haec et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens operatur Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veteres fingentes Iustitiae filiam ex abdita quadam aeternitate tradunt omnia despectare terrena.</p>
        </div>
    </div>

<?php

end_page();