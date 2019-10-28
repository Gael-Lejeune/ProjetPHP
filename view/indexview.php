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
            echo '<div> <a href="'.$logoutcontroller.'"> Log Out </a> </div>';
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
        <div class="description">
            <h1> Description du site  </h1>
            <div class="description-FreeNote">
                <p> Haec et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens operatur Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veteres fingentes Iustitiae filiam ex abdita quadam aeternitate tradunt omnia despectare terrena.</p>
            </div>
        </div>

        <div class="description">
            <h1> Description du site  </h1>
            <div class="description-FreeNote">
                <p> Haec et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens operatur Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veteres fingentes Iustitiae filiam ex abdita quadam aeternitate tradunt omnia despectare terrena.</p>
            </div>
        </div>
    </div>
    <div class="Prevnext">
        <div class="Backtohome">
            <div class="left">
                <a href="<?php echo $indexcontroller ?>"> <img class="left1" src="https://img.icons8.com/carbon-copy/100/000000/double-left.png"> </a>
            </div>
            <p> Prev </p>
        </div>
        <div class="Backtohome">
            <p> Next </p>
            <div class="right">
                <a href="<?php echo $indexcontroller ?>"> <img class="left" src="https://img.icons8.com/carbon-copy/100/000000/double-right.png"> </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

