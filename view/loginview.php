<a class="arrow" href="<?php echo $indexaddr ?>"><img src="https://img.icons8.com/nolan/50/000000/up-left.png" style="margin-top: -20px;"></a>

<div class='Title' style="margin-top: 20px;">
    <div> <img alt="Logo" src="<?php echo $logo ?>"> </div>
    <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="<?php echo $indexaddr ?>"> FreeNote </a> </div>
</div>


<h1> Se Connecter </h1>

<div class="container-form">
    <form class="form" action="<?php echo $login_processing ?>" method="post">
        <p> Email </p>
        <input class="bouton" type="text" name="email" required />
        <p> Mot de Passe </p>
        <input class="bouton" type="password" name="password" title="password" autocomplete="off" maxlength="30" required"/>
        <input class="submit" type="submit" name="action" value="Se connecter"/>
    </form>
    <div class="connexion">
        <a href="<?php echo $indexaddr ?>"> Mot de passe oublié ? S'inscrire</a>
    </div>
</div>

