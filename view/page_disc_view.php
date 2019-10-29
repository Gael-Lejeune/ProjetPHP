<h1>Page discussion</h1>

<div class="description">
    <h1> <?php echo $result['disc_name'] ?> </h1>
    <div class="description-FreeNote">
        <p><?php
            foreach ($messages as $value)
            {
                echo $value['text'].'<br>';
            }
            ?></p>
    </div>

    <?php if ($result['state']==1)
    { ?>
        <form class="form" action="<?php echo $page_disc_processing ?>" method="post">
        <p> Ecrivez votre commentaire : </p>
        <input class="bouton" type="text" name="texte"/>

        <input class ="submit" type="submit" name="action" value="Ajouter mon message"/>
        <input class ="submit" type="submit" name="action" value="Fermer le message"/>
    </form>
    <?php } ?>

    <div>
        <div>
            <h3>Like : </h3>
            <p><?php echo $result['nbLike']?></p>
        </div>
        <form class="form" action="<?php echo $page_disc_processing ?>" method="post">
            <input class ="submit" type="submit" name="action" value="Like"/>
        </form>
    </div>

    <h3>Nombre de messages dans la discussion : </h3>
    <p><?php echo $result['nbMessage'].' / '.$result['nbMessMax'] ?></p>

</div>
</body>
</html>