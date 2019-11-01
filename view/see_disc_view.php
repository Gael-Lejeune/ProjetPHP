<h1>Mes discussions</h1>

<h2> Vous avez <?php echo $nbDiscUser ?> discussions d'ouvertes </h2>
<h2> Vous pouvez encore en ouvrir <?php echo $nbDiscRestantes ?> </h2>

<div class="container-discussion">
    <div class="discussion">
        <div class="description">
            <?php foreach ($disc_liste as $key_disc => $disc_array) {
            $discussion = new Discussion ($disc_array); ?>
            <form class="" action="<?php echo $page_disc_controller ?>" method="post">
                <button value="<?php echo $discussion->getIdDiscussion() ?>" class="bouton"
                    name="discussion"> <?php echo htmlspecialchars($discussion->getDiscName()) ?></button>
            </form>
            <div class="description-FreeNote">
                <p><?php
                    $mess_liste = $disc_manager->getMsgForIDDisc($discussion->getIdDiscussion());
                    foreach ($mess_liste as $key_mess => $mess_array) {
                        $message = new Message($mess_array);
                        echo htmlspecialchars($message->getText()) . '<br>';
                    }
                    ?></p>
            </div>
            <p>State :
                <?php if ($discussion->getState() == 1)
                    echo 'Open';
                else if ($discussion->getState() == 0)
                    echo 'Close';
            } ?></p>
        </div>
    </div>
</div>

<div class="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>
