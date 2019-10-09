<?php

$index='Index';
$indexaddr='index.php';
$indexcss='html/css/index.css';

$inscription='Inscription';
$inscriptionaddr='formulaire_inscription.php';
$inscriptioncss='html/css/signup.css';

$login='Login';
$loginaddr='login.php';
$logincss='html/css/signup.css';

$logout='Logout';
$logoutaddr='logout.php';
$logoutcss='html/css/signup.css';

$myprofile='myProfile';
$myprofileaddr='myprofile.php';
$myprofilecss='html/css/myprofile.css';

$fond='"../images/fond.jpg"';
$logo='html/images/login.png';
$arrow='https://img.icons8.com/nolan/50/000000/up-left.png';


function start_page($title, $lien1, $rel1, $lien2, $rel2)
{
    echo'<!DOCTYPE html> 
<html lang="fr">
<head>
<title>'.PHP_EOL.$title.'</title>
<link href="'.PHP_EOL.$lien1.'" rel="'.PHP_EOL.$rel1.'">
    <link href="'.PHP_EOL.$lien2.'" rel="'.PHP_EOL.$rel2.'">
</head>
<body>'.PHP_EOL;
};



function end_page()
{
    echo'</body></html>';
}