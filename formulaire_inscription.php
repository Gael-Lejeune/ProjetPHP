<?php
include "utils.inc.php";

start_page('Inscription');

$step=$_GET['step'];
if ($step == 'ERROR_mdp') {
    echo 'La confirmation de mot de passe est incorrecte'.'<br/>';
} else if ($step == 'ERROR_cond') {
    echo 'Vous devez valider les conditions d\'utilisations'.'<br/>';
}

?>

    <hr/><br/><strong>Formulaire d'inscription</strong><br/><hr/>
    <form action="data-processor.php" method="post">
        <p> Votre Nom </p>
        <input type="text" name="name"/>
        <p> Civilité (sexe) </p>
        <input type="radio" name="civilite" value="M"/> Homme <br/>
        <br><input type="radio" name="civilite" value="F"/> Femme <br/>
        <p> Email </p>
        <input type="email" name="email"/>
        <p> Mot de Passe </p>
        <input type="password" name="password"/>
        <p> Confirmation Mot de Passe </p>
        <input type="password" name="passwordconf"/></br></br>
        <p>Conditions générales <input type="checkbox" name="conditions" value="ok"/></p>
        <input type="submit" name="action" value="OK"/>
    </form>
<?php

end_page();

?>

