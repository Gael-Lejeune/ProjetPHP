<?php
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO

// Gestion des onglets presents dans la barre de navigation
if ($_SESSION['login']) // si la personne est connecte
{
    $user_manager = new UserManager($db);
    $user = $user_manager->getUser($_SESSION['email']);
    $role = $user->getRole(); // On recupere son role
} else {
    $role = 'visiteur'; // Sinon il est simplement visiteur
}
?>

<script src="../java/navbar.js"></script>

<div id="mySidebar" class="sidebar">

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div class='contenu-navbar'>
        <?php if ($_SESSION['login'])
            echo '<div> <a href="' . $myprofilecontroller . '"> Mon Profile </a> </div>';
        else
            echo'<div> <a href="'.$inscriptioncontroller.'"> S\'inscrire </a> </div>';
        ?>
    </div>

    <div class="contenu-navbar">
        <?php if ($_SESSION['login'])
            echo '<div> <a href="' . $create_disc_controller . '"> Créer une discussion </a> </div>';
        ?>
    </div>

    <div class="contenu-navbar">
        <?php if ($_SESSION['login'])
            echo '<div> <a href="' . $see_disc_controller . '"> Mes Discussions </a> </div>';
        ?>
    </div>

    <div class="contenu-navbar">
        <?php if ($role=='admin')
            echo '<div> <a href="' . $admin_controller . '"> Page Administrateur </a> </div>';
        ?>
    </div>

    <div class="contenu-navbar">
        <?php if ($_SESSION['login'])
            echo '<div> <a href="'.$logoutmodel.'"> Se Déconnecter </a> </div>';
        else
            echo '<div> <a href="'.$logincontroller.'"> Se Connecter </a> </div>';
        ?>
    </div>
</div>

<div id="main">
    <p> Ouvrir Le Menu </p>
    <div>
        <button class="openbtn" onclick="openNav()">&#9776;</button>
    </div>
</div>

<div id="Backtohome">
    <p> Accueil </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img alt="Retour à la page d'accueil" src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>

<a href="<?php echo $indexcontroller ?>"><img style="width: 192px; position: fixed; top: 20px; left: 20px;" alt="logodusite" src="https://zupimages.net/up/19/44/8mnk.png"></a>
