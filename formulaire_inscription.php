<?php
include "utils.inc.php";

start_page('Inscription');

?>

    <hr/><br/><strong>Formulaire dInscription</strong><br/><hr/>
    <form action="data-processor.php" method="post">
        <p> Votre Nom </p>
        <input type="text" name="name"/>
        <p> Civilité (sexe) </p>
        <input type="radio" name="civilite" value="M"/> Homme <br/>
        <br><input type="radio" name="civilite" value="F"/> Femme <br/>
        <p> Email </p>
        <input type="text" name="email"/>
        <p> Mot de Passe </p>
        <input type="password" name="password"/>
        <p> Confirmation Mot de Passe </p>
        <input type="password" name="password"/></br></br>
        <p>Conditions générales <input type="checkbox" name="conditions"/></p>
        <input type="submit" name="action" value="OK"/>
    </form>
<?php

end_page();

?>