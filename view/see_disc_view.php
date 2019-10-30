<h1>Mes discussions</h1>





<div class="description">
    <h1> <?php echo $result[0]['discName'] ?> </h1>
    <div class="description-FreeNote">
        <p><?php
            foreach ($msg_Disc1 as $value)
            {
                echo $value['text'].'<br>';
            }
            ?></p>
    </div>
    <p>State :
        <?php if ($result[0]['state'] == 1)
            echo 'Open';
        else if ($result[0]['state'] == 0)
            echo 'Close';
        ?>
    </p>
    <form class="form" action="<?php echo $page_disc_controller ?>" method="post">
        <button value="<?php echo $result[0]['idDiscussion']?>" class="bouton" name="discussion">Voir la discussion</button>
    </form>
</div>



<div class="Backtohome">
    <p> Back to home </p>
    <div>
        <a href="<?php echo $indexcontroller ?>"> <img src="https://img.icons8.com/carbon-copy/100/000000/arrow.png"> </a>
    </div>
</div>

</body>
</html>