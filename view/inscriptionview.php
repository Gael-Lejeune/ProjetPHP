<!--<h3> FREENOTE </h3>-->

<div class="container-form-inscription">
    <h1> Ha, te voila ! </h1>
    <h2> Nous t'attendions depuis longtemps ! </h2>
    <form class="form" action="<?php echo $data_processor ?>" method="post">
        <p> Votre Nom </p>
        <input class="bouton" type="text" name="name"/>
        <p> E-mail </p>
        <input class="bouton" type="text" name="email" required />
        <p> Mot de Passe </p>
        <input class="bouton" type="password" name="password" required/>
        <p> Confirmation Mot de Passe </p>
        <input class="bouton" type="password" name="password"/></br></br>
        <div class="container-conditions">
            <input class="conditions" type="checkbox" name="conditions"/>
            <p> Conditions générales </p>
        </div>
        <input class ="submit" type="submit" name="action" value="Créer un compte"/>
        <div class="a2"> <p> Un problème ? </p> <a href="<?php echo $mymdpcontroller ?>"> Mot de passe oublié ? </a> </div>
        <div class="a2"> <p> Tu as oublié quelque chose ? </p> <a href="<?php echo $logincontroller ?>"> Tu as déjà un compte ? </a> </div>
    </form>
</div>

<div class="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>

</body>
</html>

