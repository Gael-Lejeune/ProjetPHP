<!-- Création de la flèche de retour à la page d'accueil -->
<a class="arrow" href="<?php echo $indexcontroller ?>"><img src="<?php echo $arrow?>"></a>

<!-- Création du Titre du site avec le logo -->
<div class='Title'>
    <div> <img alt="Logo" src="<?php echo $logo ?>"> </div>
    <div class="FreeNote highlightTextIn"> <a alt="FreeNote" href="<?php echo $indexcontroller?>"> FreeNote </a> </div>
</div>

<h1> Inscription </h1>

<!-- Création du bloc qui contient le formulaire d'inscription -->
<div class="container-form">
    <form class="form" action="<?php echo $data_processor ?>" method="post">
        <div>
            <p> Votre Nom </p>
            <input class="bouton" type="text" name="name"/>
        </div>

        <div>
            <p> Civilité (sexe) </p>
            <input type="radio" name="civilite" value="M"/> Homme <br/><br/>
            <input type="radio" name="civilite" value="F"/> Femme <br/>
        </div>

        <div>
            <p> Email </p>
            <input class="bouton" type="text" name="email"/>
        </div>
        <div>
            <p> Mot de Passe </p>
            <input class="bouton" type="password" name="password"/>
        </div>
        <div>
            <p> Confirmation Mot de Passe </p>
            <input class="bouton" type="password" name="passwordconf"/></br></br>
        </div>
        <div>
            <p>Conditions générales <input class="conditions" type="checkbox" value="ok" name="conditions"/></p>
            <input class ="submit" type="submit" name="action" value="Créer un compte"/>
        </div>
    </form>
    <div class="connexion">
        <a href="<?php echo $logincontroller ?>"> Déjà inscrit(e) ? Se connecter</a>
    </div>
</div>