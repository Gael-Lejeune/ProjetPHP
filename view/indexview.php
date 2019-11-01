<script type="text/javascript" src="../java/navbar.js"></script>

<?php
require $navbar;
?>



<!-- Création du bloc contenant la description et le titre description -->
<div class="description">
    <h1> Description du site  </h1>
    <div class="description-FreeNote">
        <p>Il faut écrire  ici une description qui explique le principe du site</p>
    </div>
</div>

<div class="container-discussion">
    <div class="discussion">
        <?php foreach ($result as $key_disc => $disc_array) {
            $discussion = new Discussion ($disc_array); ?>
            <div class="description">
                <h1><?php echo htmlspecialchars($discussion->getDiscName()) ?></h1>
                <div class="description-FreeNote">
                    <p><?php
                        $mess_liste = $manager->getMsgForIDDisc($discussion->getIdDiscussion());
                        foreach ($mess_liste as $key_mess => $mess_array) {
                            $message = new Message($mess_array);
                            echo htmlspecialchars($message->getText()) . '<br>';
                        } ?></p>
                </div>
                <p>State :
                    <?php if ($discussion->getState() == 1)
                        echo 'Open';
                    else if ($discussion->getState() == 0)
                        echo 'Close'; ?>
                <form class="form" action="<?php echo $page_disc_controller ?>" method="post">
                    <button value="<?php echo $discussion->getIdDiscussion()?>" class="bouton" name="discussion">Voir la discussion</button>
                </form>
            </div>
        <?php } ?></p>
    </div>
    <div class="Prevnext">
        <?php if ($_GET['page'] != 1)
        {?>
            <div class="Backtohome">
                <div class="left">
                    <a href="<?php echo $indexcontroller."?page=".($_GET['page']-1) ?>">
                        <img class="left1" src="https://img.icons8.com/carbon-copy/100/000000/double-left.png">
                    </a>
                </div>
                <p> Prev </p>
            </div>
        <?php } ?>
        <?php
        echo '<div class="checkbox">Page : '; //Pour l'affichage, on centre la liste des pages
        for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
        {
            //On va faire notre condition
            if($i==$_GET['page']) //Si il s'agit de la page actuelle...
            {
                echo ' [ '.$i.' ] ';
            }
            else //Sinon...
            {
                echo ' <a href="'.$indexcontroller.'?page='.$i.'">'.$i.'</a> ';
            }
        }
        echo '</div>';
        if ($_GET['page'] != $nombreDePages){?>
            <div class="Backtohome">
                <p> Next </p>
                <div class="right">
                    <a href="<?php echo $indexcontroller."?page=".($_GET['page']+1) ?>">
                        <img class="left" src="https://img.icons8.com/carbon-copy/100/000000/double-right.png">
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
