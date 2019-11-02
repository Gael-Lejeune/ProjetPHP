<script type="text/javascript" src="../java/navbar.js"></script>

<?php
require $navbar;
?>

<div class="container-chat-global">
    <h1> <?php echo $result['discName'] ?> </h1>
    <h2> <?php echo 'Cette discussion vous est présentée par '.$user->getName() ?> </h2>
    <div class="container-chat">
        <p><?php
            foreach ($messages as $value)
            {
                echo $value['text'].'<br>';
            }
            ?></p>
    </div>

    <div class="like">
        <form class="form-like" action="<?php echo $page_disc_processing ?>" method="post">
            <input class ="submit1" type="submit" name="action" value="Like"/>
        </form>
        <div class="like-paraf">
            <p> Like : <?php echo $result['nbLike']?> </p>
        </div>
    </div>

    <?php if (isset($_SESSION['login'])) {
    if ($result['state']==1)
    { ?>
        <form class="form" action="<?php echo $page_disc_processing ?>" method="post">
        <p> Ecrivez votre commentaire : </p>
        <input class="bouton" type="text" name="texte"/>
        <div class="ajouter-fermer">
            <input class ="submit" type="submit" name="action" value="Ajouter mon message"/>
            <input class ="submit" type="submit" name="action" value="Fermer le message"/>
        </div>
    </form>
    <?php } ?>

    <?php } ?>

    <div class="nb-messages">
        <p> Nombre de messages dans la discussion :  <?php echo $result['nbMessage'].' / '.$result['nbMessMax'] ?></p>
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