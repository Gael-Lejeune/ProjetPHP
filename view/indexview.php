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
        <div class="discussion1">
            <h1> <?php echo $result[0]['discName'] ?> </h1>
            <div class="discussion1-FreeNote">

                <p><?php
                        foreach ($msg_Disc1 as $value)
                        {
                            echo $value['text'].'<br>';
                        }
                    ?></p>
            </div>
                <?php if ($result[0]['state'] == 1)
                    echo '<div class="rondvert"> </div>';
                else if ($result[0]['state'] == 0)
                    echo '<div class="rondrouge"> </div>';
                ?>
            <form class="form" action="<?php echo $page_disc_controller ?>" method="post">
                <button class="submit" value="<?php echo $result[0]['idDiscussion']?>" name="discussion">Voir la discussion</button>
            </form>
        </div>

        <div class="discussion2">
            <h1> <?php echo $result[1]['discName'] ?> </h1>
            <div class="discussion2-FreeNote">

                <p><?php
                    foreach ($msg_Disc2 as $value)
                    {
                        echo $value['text'].'<br>';
                    }
                    ?></p>
            </div>
                <?php if ($result[1]['state'] == 1)
                    echo '<div class="rondvert"> </div>';
                else if ($result[1]['state'] == 0)
                    echo '<div class="rondrouge"> </div>';
                ?>
            <form class="form" action="<?php echo $page_disc_controller ?>" method="post">
                <button class="submit" value="<?php echo $result[1]['idDiscussion']?>" name="discussion">Voir la discussion</button>

            </form>
        </div>
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

