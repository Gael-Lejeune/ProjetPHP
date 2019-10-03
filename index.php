<?php
include "utils.inc.php";

start_page("index");

session_start();
if($_SESSION['login']=='ok')
{
    echo 'Connécté en tant que ', $_SESSION['email'], '<br>';
}

echo 'En travaux';

?>

    <br>
    <a href="<?php echo $loginaddr;?>"><?php echo $login;?></a>


<?php

end_page();