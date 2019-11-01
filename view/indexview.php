<script>
    /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginRight = "250px";
    }

    /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
    }
</script>

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

<!-- Création du bloc contenant la description et le titre description -->
<div class="description">
    <h1> Description du site  </h1>
    <div class="description-FreeNote">
        <p>Il faut écrire  ici une description qui explique le principe du site</p>
    </div>
</div>

<div class="container-discussion">
    <div class="discussion">
        <?php foreach ($result as $key_disc => $disc_array) {
            $discussion = new Discussion ($disc_array); ?>
            <div class="description">
                <h1><?php echo $discussion->getDiscName() ?></h1>
                <div class="description-FreeNote">
                    <p><?php
                        $mess_liste = $manager->getMsgForIDDisc($discussion->getIdDiscussion());
                        foreach ($mess_liste as $key_mess => $mess_array) {
                            $message = new Message($mess_array);
                            echo $message->getText() . '<br>';
                        } ?></p>
                </div>
                <p>State :
                    <?php if ($discussion->getState() == 1)
                        echo 'Open';
                    else if ($discussion->getState() == 0)
                        echo 'Close'; ?>
                <form class="form" action="<?php echo $page_disc_controller ?>" method="post">
                    <button value="<?php echo $discussion->getIdDiscussion()?>" class="bouton" name="discussion">Voir la discussion</button>
                </form>
            </div>
        <?php } ?></p>
    </div>
    <div class="Prevnext">
        <?php if ($_GET['page'] != 1)
        {?>
            <div class="Backtohome">
                <div class="left">
                    <a href="<?php echo $indexcontroller."?page=".($_GET['page']-1) ?>">
                        <img class="left1" src="https://img.icons8.com/carbon-copy/100/000000/double-left.png">
                    </a>
                </div>
                <p> Prev </p>
            </div>
        <?php } ?>
        <?php
        echo '<div class="checkbox">Page : '; //Pour l'affichage, on centre la liste des pages
        for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
        {
            //On va faire notre condition
            if($i==$_GET['page']) //Si il s'agit de la page actuelle...
            {
                echo ' [ '.$i.' ] ';
            }
            else //Sinon...
            {
                echo ' <a href="'.$indexcontroller.'?page='.$i.'">'.$i.'</a> ';
            }
        }
        echo '</div>';
        if ($_GET['page'] != $nombreDePages){?>
            <div class="Backtohome">
                <p> Next </p>
                <div class="right">
                    <a href="<?php echo $indexcontroller."?page=".($_GET['page']+1) ?>">
                        <img class="left" src="https://img.icons8.com/carbon-copy/100/000000/double-right.png">
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>

