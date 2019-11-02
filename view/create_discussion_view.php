<script type="text/javascript" src="../java/navbar.js"></script>

<?php
require $navbar;
?>

<div class="container-form-inscription">
    <h1> Tu veux créer une discussion ? </h1>
    <h2> Tu es au bon endroit ! </h2>
    <form class="form" action="<?php echo $create_disc_model ?>" method="post">
        <p> Nom de la discussion </p>
        <input class="bouton" type="text" name="name_disc" required/>
        <p> Entre ici ton premier message  </p>
        <input class="bouton" type="text" name="message" required />
        <p> Nombre de message autorisés dans la discussion (max = 30) </p>
        <input class="bouton" type="number" max="30" min="0" required name="nb_msg_max"/>
        <br><br>
        <input class ="submit" type="submit" name="action" value="Créer ma discussion"/>
    </form>
</div>

<div id="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>

</body>
</html>