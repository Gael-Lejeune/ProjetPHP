<div class="container">
    <div class="container-form-infopers">
        <h4> Modifier la pagination </h4>
        <form class="form" action="<?php echo $admin_processing ?>" method="post">
            <p> Nouvelle pagination : </p>
            <input class="bouton" autocomplete="off" name="new_pagination" type="number"/></br>
            <button class="submit1" type="submit" value="pagination" name="submit"> Mise à jour </button>
        </form>
    </div>

    <div class="container-form-infopers">
        <h4> Changer le nombre de discussion maximum par utilisateur </h4>
        <form class="form" action="<?php echo $admin_processing ?>" method="post">
            <p> Nouveau nombre de discussion max : </p>
            <input class="bouton"autocomplete="off" name="new_nbDiscMax" type="number"/>
            <button class="submit1" type="submit" value="nbDisc" name="submit"> Mise à jour </button>
        </form>
    </div>

    <div class="container-form-infopers">
        <h4> Changer les informations d'un utilisateur </h4>
        <p>Si vous ne souhaitez pas modifier certaines informations, laissez la zone vide</p>
        <form class="form" action="<?php echo $admin_processing ?>" method="post">
            <p> Email de l'utilisateur dont vous souhaiter modifier les informations : </p>
            <input class="bouton"autocomplete="off" name="email" type="text"/>

            <h4>Modifications : </h4>

            <p> Email : </p>
            <input class="bouton"autocomplete="off" name="new_email" type="text"/>

            <p> Pseudo : </p>
            <input class="bouton"autocomplete="off" name="name" type="text"/>

            <p> Role :  </p>
            <p>Attention : si vous cocher administrateur, cet utilisteur aura les même droits que vous sur le site</p>
            Member : <input class="bouton"autocomplete="off" name="role" type="checkbox" value="member"/>
            Admin : <input class="bouton"autocomplete="off" name="role" type="checkbox" value="admin"/>

            <button class="submit1" type="submit" value="nbDisc" name="submit"> Mise à jour </button>
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
