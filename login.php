<?php

include "utils.inc.php";


start_page("login");

$error=$_GET['error'];
echo $error, '<br/>';


//Formulaire de login
?>
<form action="login-processing.php" method="post" >
    <h4>Vos informations</h4>
    <input type="text" name="email" placeholder="Adresse Email*" required /><br>
    <br>
    <input type="password" name="password" placeholder="password" required title="password" autocomplete="off" maxlength="30"/>
    <br>
    <br>
    <button type="submit" name="ok" value="mailer">OK</button>
<form/>