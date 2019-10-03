<?php

function start_page()
{
    echo ' <!DOCTYPE html> 
            <html lang="fr">
                <head>
                    <title><strong>Formulaire d\'Inscription</strong></title>
                </head>
                <body>
                 <hr/><br/><strong>Welcome</strong><br/><hr/>
                 <form action="base.php" method="post">
                 <p> Identifiant </p>
                 <input type="text" name="identifiant" value="1212"/>
                 <p> Civilité (sexe) </p>
                 <br><input type="radio" name="sexe" value="Homme"/> Homme <br/>
                 <br><input type="radio" name="sexe" value="Femme"/> Femme <br/>
                 <br><input type="radio" name="sexe" value="Vous hésitez"/>  <br/>
                 <p> Email </p>
                 <input type="text" name="email" value="email@mail.fr"/>
                 <p> Mot de Passe </p>
                 <input type="password" name="motdepasse" value="password"/>
                 <p> Confirmation Mot de Passe </p>
                 <input type="password" name="motdepasse" value="password"/>
                 <p> Téléphone </p>
                 <input type="text" name="telephone" value="0606060606"/>
                 <p> Pays </p>
                 <select name="pays">
                    <option value="" name="pays"> Sélectionner le pays <option/>
                    <option value="france"> France <option/>
                    <option value="allemagne"> Allemagne <option/>
                    <option value="irlande"> Irlande <option/>
                    <option value="royaume-uni"> Royaume-Uni <option/>
                 <select/>
                 <p> Conditions générales </p>
                 <input type="checkbox" name="conditionsgenerales"/>
                 <input type="submit" name="action" value="OK"/>
                 '; //end of line
}

start_page();
?>
