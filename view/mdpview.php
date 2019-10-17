<div class="container-form-mdp">
    <h1> Ha, bah bravo ! </h1>
    <h2> T'as encore oublié ton Mot De Passe ! </h2>
    <form class="form" action="<?php echo $mdp_processing ?>" method="post">
        <p> E-mail </p>
        <input class="bouton" type="email" name="email" required />
        <div class="a2" style="margin-top: 5px;"> <p>Veuillez renseigner </p> <p style="margin-left: 5px; color: #2461cc"> l'adresse E-mail </p> <p style="margin-left: 5px"> correspondante à votre compte ! </p> </div>
        <button class="submit2" type="submit" name="action" value="Réinitialisation" style="margin-top: 30px;";>Réinitialiser votre mot de passe</button>
        <div class="a2"> <p> Besoin d'un compte ? </p> <a  class="a2a" href="<?php echo $inscriptioncontroller ?>"> S'inscrire </a> </div>
    </form>
</div>

<div class="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>

