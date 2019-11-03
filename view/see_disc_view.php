<?php
require $navbar;
?>


<div class="container-discussion"> <!-- Création du bloc contenant les différentes discussion relative à une personne -->
    <div class="container-all">
        <h3>Mes discussions</h3>

        <!-- On affiche en haut de la page le nombre de discussion que l'utilisateur a d'ouverte et le nombre qu'il peut encore en ouvrir -->
        <h4> Vous avez <?php echo $nbDiscUser ?> discussions d'ouvertes </h4>
        <h5> Vous pouvez encore en ouvrir <?php echo $nbDiscRestantes ?> </h5>
        <!-- On parcours la liste de ses discussions récupérés dans le model -->
        <?php foreach ($disc_liste as $key_disc => $disc_array) {
        // Pour chaque discussion on recupere la discussion actuelle
        $discussion = new Discussion ($disc_array); ?>
        <!-- On affiche le nom de la discussion sous forme de lien vers la page dédiée à cette discussion -->
        <form action="<?php echo $page_disc_controller ?>" method="post"> <!-- Création du formulaire qui permettra de retourner sur la page spécifique à la discussion choisie par l'utilisateur -->
            <button class="nom-discussion" value="<?php echo $discussion->getIdDiscussion() ?>"
                    name="discussion"> <?php echo $discussion->getDiscName() ?></button>
        </form>

        <div class="container-chat"> <!-- Création du bloc qui contient le contenu des discussions -->
            <p><?php
                // On recupere la liste des messages de cette discussion
                $mess_liste = $disc_manager->getMsgForIDDisc($discussion->getIdDiscussion());
                // Pour chaque message
                foreach ($mess_liste as $key_mess => $mess_array) {
                    $message = new Message($mess_array);
                    // On affiche son texte
                    echo $message->getText() . '<br>';
                }
                ?></p>
        </div>
        <div class="state"> <!-- Création du bloc qui contient l'état de la discussion rond-vert -> discussion ouverte / rond-rouge -> discussion fermée -->
            <p>
                <!-- On affiche l'etat de la discussion avec un rond rouge si elle est ferme (state == 0) et avec un rond vert si elle est ouverte (state == 1) -->
                <?php if ($discussion->getState() == 1)
                    echo '<div class="rondvert"> </div>';
                else if ($discussion->getState() == 0)
                    echo '<div class="rondrouge"> </div>';
                } ?>
            </p>
        </div>
    </div>
</div>

