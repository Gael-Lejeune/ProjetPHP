<?php

function start_page()
{
    echo ' <!DOCTYPE html> 
            <html lang="fr">
                <head>
                    <title>Formulaire d\'Inscription</title>
                </head>
                <p>
                 <hr/><br/><strong>Formulaire d\'Inscription</strong><br/><hr/>
                 <br action="data-processor.php" method="post">
                 <p> Votre Nom </p>
                 <input type="text" name="name"/>
                 <p> Civilité (sexe) </p>
                 <input type="radio" name="civilite"/> Homme <br/>
                 <br><input type="radio" name="civilite"/> Femme <br/>
                 <p> Email </p>
                 <input type="text" name="email"/>
                 <p> Mot de Passe </p>
                 <input type="password" name="password"/>
                 <p> Confirmation Mot de Passe </p>
                 <input type="password" name="password"/></br></br>
                 <p>Conditions générales <input type="checkbox" name="conditions"/></p>
                 <input type="submit" name="action" value="OK"/>
                 ';
}//start_page()

start_page();
?>