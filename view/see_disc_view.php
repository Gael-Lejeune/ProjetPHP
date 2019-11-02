<script type="text/javascript" src="../java/navbar.js"></script>

<?php
require $navbar;
?>


<div class="container-discussion">
    <div class="pipi">
        <h3>Mes discussions</h3>

        <h4> Vous avez <?php echo $nbDiscUser ?> discussions d'ouvertes </h4>
        <h5> Vous pouvez encore en ouvrir <?php echo $nbDiscRestantes ?> </h5>
    <?php foreach ($disc_liste as $key_disc => $disc_array) {
    $discussion = new Discussion ($disc_array); ?>
        <form action="<?php echo $page_disc_controller ?>" method="post">
            <button class="nom-discussion" value="<?php echo $discussion->getIdDiscussion() ?>"
                    name="discussion"> <?php echo $discussion->getDiscName() ?></button>
        </form>

        <div class="container-chat">
            <p><?php
                $mess_liste = $disc_manager->getMsgForIDDisc($discussion->getIdDiscussion());
                foreach ($mess_liste as $key_mess => $mess_array) {
                    $message = new Message($mess_array);
                    echo $message->getText() . '<br>';
                }
                ?></p>
        </div>
        <div class="state">
            <p>
                <?php if ($discussion->getState() == 1)
                    echo '<div class="rondvert"> </div>';
                else if ($discussion->getState() == 0)
                    echo '<div class="rondrouge"> </div>';
                } ?>
            </p>
        </div>
    </div>
</div>

<div class="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>