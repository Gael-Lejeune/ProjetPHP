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
    <div class="contenu-navbar"> <a href="<?php echo $indexcontroller ?>"> FreeNote </a> </div>

    <div class='contenu-navbar'>
        <?php if ($_SESSION['login'])
            echo '<div> <a href="' . $myprofilecontroller . '"> My Profile </a> </div>';
        else
            echo'<div> <a href="'.$inscriptioncontroller.'"> Sign up </a> </div>';
        ?>
    </div>

    <div class="contenu-navbar">
        <?php if ($_SESSION['login'])
            echo '<div> <a href="' . $create_disc_controller . '"> Create a new discussion </a> </div>';
        ?>
    </div>

    <div class="contenu-navbar">
        <?php if ($_SESSION['login'])
            echo '<div> <a href="' . $see_disc_controller . '"> My discussions </a> </div>';
        ?>
    </div>

    <div class="contenu-navbar">
        <?php if ($role=='admin')
            echo '<div> <a href="' . $admin_controller . '"> Administrateur page </a> </div>';
        ?>
    </div>

    <div class="contenu-navbar">
        <?php if ($_SESSION['login'])
            echo '<div> <a href="'.$logoutmodel.'"> Log Out </a> </div>';
        else
            echo '<div> <a href="'.$logincontroller.'"> Log In </a> </div>';
        ?>
    </div>
</div>

<div id="main">
    <p> Open the navbar </p>
    <div>
        <button class="openbtn" onclick="openNav()">&#9776;</button>
    </div>
</div>

<a href="<?php echo $indexcontroller ?>"><img style="width: 128px; position: fixed; top: 20px; left: 20px;" alt="logodusite" src="https://zupimages.net/up/19/44/8mnk.png"></a>
