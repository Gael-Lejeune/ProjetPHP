<script type="text/javascript" src="../java/navbar.js"></script>

<?php
require $navbar;
?>

<!-- Création du bloc contenant la description et le titre description -->
<div class="description">
    <h1> Description du site  </h1>
    <div class="description-FreeNote">
        <p>Réseau social d’un nouveau genre, FreeNote consiste à créer des fils de discussions comprenant
            des messages participatifs au sein desquels chaque utilisateur ne peut ajouter qu’un ou deux mots.</p>
    </div>
</div>

<div class="container-discussion">
    <div class="discussion">
        <?php foreach ($result as $key_disc => $disc_array) {
            $discussion = new Discussion ($disc_array); ?>
            <div class="discussion1">
                <h1><?php echo htmlspecialchars($discussion->getDiscName()) ?></h1>
                <div class="discussion1-FreeNote">
                    <p><?php
                        $mess_liste = $manager->getMsgForIDDisc($discussion->getIdDiscussion());
                        foreach ($mess_liste as $key_mess => $mess_array) {
                            $message = new Message($mess_array);
                            echo htmlspecialchars($message->getText()) . '<br>';
                        } ?></p>
                </div>
                    <?php if ($discussion->getState() == 1)
                        echo '<div class="rondvert"> </div>';
                    else if ($discussion->getState() == 0)
                        echo '<div class="rondrouge"> </div>'; ?>
                <div class="like">
                    <div class="like-paraf">
                        <p> Like : <?php echo $discussion->getNbLike()?> </p>
                    </div>
                </div>
                <form class="form" action="<?php echo $page_disc_controller ?>" method="post">
                    <button class="submit" value="<?php echo $discussion->getIdDiscussion()?>" name="discussion">Voir la discussion</button>
                </form>
            </div>
        <?php } ?>
    </div>
    <div class="Prevnext">
        <?php if ($pageActuelle > 1)
        {?>
            <div class="Backtohome">
                <div class="left">
                    <a href="<?php echo $indexcontroller."?page=".($pageActuelle-1) ?>">
                        <img class="left1" src="https://img.icons8.com/carbon-copy/100/000000/double-left.png">
                    </a>
                </div>
                <p> Prev </p>
            </div>
        <?php } ?>
        <?php
        echo '<div class="lespages">';//Pour l'affichage, on centre la liste des pages
            echo '<p> Page </p>';
        for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
        {
            if ($i == 1 || (($pageActuelle - 2) < $i && $i < ($pageActuelle + 2)) || $i == $nombreDePages) {
                echo '<div class="right">';
                if ($i == $nombreDePages && $pageActuelle < ($nombreDePages - 2)) {
                    echo '...' . '&nbsp';
                }
                //On va faire notre condition
                if ($i == $pageActuelle) //Si il s'agit de la page actuelle...
                {
                    echo ' [ ' . $i . ' ] ';
                } else //Sinon...
                {
                    echo ' <a href="' . $indexcontroller . '?page=' . $i . '">' . $i . '</a> ';
                }
                if ($i == 1 && $pageActuelle > 3) {
                    echo '...' . '&nbsp';
                }
                echo '</div>';
            }
        }
        echo '</div>';
        if ($pageActuelle < $nombreDePages){?>
            <div class="Backtohome">
                <p> Next </p>
                <div class="right">
                    <a href="<?php echo $indexcontroller."?page=".($pageActuelle+1) ?>">
                        <img class="left" src="https://img.icons8.com/carbon-copy/100/000000/double-right.png">
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>

