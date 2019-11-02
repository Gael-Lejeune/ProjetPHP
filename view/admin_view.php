<script type="text/javascript" src="../java/navbar.js"></script>

<?php
require $navbar;
?>

<div class="container-admin">
    <div class="container-form-admin1">
        <p class="titre"> Modifier la pagination </p>
        <form class="form" action="<?php echo $admin_processing ?>" method="post">
            <p> Nouvelle pagination : </p>
            <input class="bouton" autocomplete="off" name="new_pagination" type="number"/></br>
            <p class="info-admin"> Nombre de discussion par pagination : <?php $file = file('../ParamsAdmin.txt'); echo $file[0]; ?> </p>
            <button class="submit1" type="submit" value="pagination" name="submit"> Mise à jour </button>
        </form>
    </div>

    <div class="container-form-admin2">
        <p class="titre"> Modifier le nombre de discussion par utilisateur </p>
        <form class="form" action="<?php echo $admin_processing ?>" method="post">
            <p> Nouveau nombre de discussion max : </p>
            <input class="bouton"autocomplete="off" name="new_nbDiscMax" type="number"/>
            <p class="info-admin"> Nombre maximum de discussion par utilisateur : <?php $file = file('../ParamsAdmin.txt'); echo $file[1]; ?></p>
            <button class="submit1" type="submit" value="nbDisc" name="submit"> Mise à jour </button>
        </form>
    </div>

    <div class="container-form-admin3">
        <p class="titre"> Modifier les informations d'un utilisateur </p>
        <h2>Si vous ne souhaitez pas modifier certaines informations, laissez la zone vide</h2>
        <form class="form" action="<?php echo $admin_processing ?>" method="post">
            <p> Email de l'utilisateur dont vous souhaiter modifier les informations : </p>
            <input class="bouton" autocomplete="off" name="email" type="email" required/>

            <h4>Modifications : </h4>

            <p> Email : </p>
            <input class="bouton"autocomplete="off" name="new_email" type="text"/>

            <p> Pseudo : </p>
            <input class="bouton"autocomplete="off" name="name" type="text"/>

            <p> Role :  </p>
            <div class="container-conditions"> <p> Member : </p> <input class="bouton"autocomplete="off" name="role" type="checkbox" value="member"/>
            <p> Admin : </p> <input class="bouton"autocomplete="off" name="role" type="checkbox" value="admin"/> </div>
            <p>Attention : si vous cocher administrateur, cet utilisteur aura les même droits que vous sur le site</p>

            <button class="submit1" type="submit" value="user" name="submit"> Mise à jour </button>
        </form>
    </div>

</div>

<div id="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>

</body>
</html>
