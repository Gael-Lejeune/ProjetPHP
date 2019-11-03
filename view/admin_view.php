<?php
require $navbar;
?>

<div class="container-admin"> <!-- Création de la div contenant les 3 blocs de modification -->
    <div class="container-form-admin1"> <!-- Création du bloc de modification de la pagination -->
        <p class="titre"> Modifier la pagination </p>
        <form class="form" action="<?php echo $admin_processing ?>" method="post"> <!-- formulaire qui renvoie les valeurs entrées par l'utilisateur à admin processing -->
            <p> Nouvelle pagination : </p>
            <input class="bouton" autocomplete="off" name="new_pagination" type="number"/>
            <p class="info-admin"> Nombre de discussion par pagination : <?php $file = file('../ParamsAdmin.txt'); echo $file[0]; ?> </p>
            <button class="submit1" type="submit" value="pagination" name="submit"> Mise à jour </button> <!-- bouton qui lance la procédure d'envoie vers admin processing -->
        </form>
    </div>

    <div class="container-form-admin2"> <!-- Création du bloc de modification du nombre de discussion par utilisateur -->
        <p class="titre"> Modifier le nombre de discussion par utilisateur </p>
        <form class="form" action="<?php echo $admin_processing ?>" method="post"> <!-- formulaire qui renvoie les valeurs entrées par l'utilisateur à admin processing -->
            <p> Nouveau nombre de discussion max : </p>
            <input class="bouton" autocomplete="off" name="new_nbDiscMax" type="number"/>
            <p class="info-admin"> Nombre maximum de discussion par utilisateur : <?php $file = file('../ParamsAdmin.txt'); echo $file[1]; ?></p>
            <button class="submit1" type="submit" value="nbDisc" name="submit"> Mise à jour </button> <!-- bouton qui lance la procédure d'envoie vers admin processing -->
        </form>
    </div>

    <div class="container-form-admin3">
        <p class="titre"> Modifier les informations d'un utilisateur </p> <!-- Création du bloc de modification des ifnormations d'un utilisateur -->
        <h2>Si vous ne souhaitez pas modifier certaines informations, laissez la zone vide</h2>
        <form class="form" action="<?php echo $admin_processing ?>" method="post"> <!-- formulaire qui renvoie les valeurs entrées par l'utilisateur à admin processing -->
            <p> Email de l'utilisateur dont vous souhaiter modifier les informations : </p>
            <input class="bouton" autocomplete="off" name="email" type="email" required/>

            <h4>Modifications : </h4>

            <p> Email : </p>
            <input class="bouton" autocomplete="off" name="new_email" type="text"/>

            <p> Pseudo : </p>
            <input class="bouton" autocomplete="off" name="name" type="text"/>

            <p> Role :  </p>
            <div class="container-conditions"> <p> Member : </p> <input class="bouton" name="role" type="checkbox" value="member"/>
            <p> Admin : </p> <input class="bouton" name="role" type="checkbox" value="admin"/> </div>
            <p>Attention : si vous cocher administrateur, cet utilisteur aura les même droits que vous sur le site</p>

            <button class="submit1" type="submit" value="user" name="submit"> Mise à jour </button> <!-- bouton qui lance la procédure d'envoie vers admin processing -->
        </form>
    </div>

</div>
