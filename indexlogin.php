<?php

include "utils.inc.php";
include "link.inc.php";
include 'model/dtb.inc.php';


if ($_SESSION['login']) {

    ?>

    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>FreeNote</title>
        <link rel="stylesheet" href="html/index.css">
        <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    </head>
    <body>

    <div class="header">
        <div class='subtitle1'>
            <div><img alt="Logo" src="html/images/login.png"></div>
            <div class="FreeNote highlightTextIn"><a alt="FreeNote" href="indexlogin.php"> FreeNote </a></div>
        </div>
        <div class='sign-up'>
            <div><img alt="sign-up" src="html/images/login.png"></div>
            <div class="FreeNote highlightTextIn"><a alt="Account" href="account.php"> Account </a></div>
        </div>
        <div class="log-in">
            <div class="log-in-logo"><img alt="login" src="html/images/login.png"></div>
            <div class="FreeNote highlightTextIn"><a alt="Log Out" href="index.php"> Log out </a></div>
        </div>
    </div>

    <div class="description">
        <p class="description-subtitle"> Description du site </p>
        <div class="description-FreeNote">
            <p> Haec et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens
                operatur Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam
                sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt
                alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veteres
                fingentes Iustitiae filiam ex abdita quadam aeternitate tradunt omnia despectare terrena.</p>
        </div>
    </div>

    <?php

} else {
    header('Location:index.php?error=ERROR_auth');
}

end_page();