<?php
require $navbar;
?>

<div class="container-chat-global"> <!-- Création du bloc contenant le titre, le contenu et les options respective à chaque discussion -->
    <h1> <?php echo $result['discName'] ?> </h1>
    <h2> <?php echo 'Cette discussion vous est présentée par '.$user->getName() ?> </h2>
    <div class="container-chat"> <!-- Création du bloc contenant le contenu à chaque discussion -->
        <p><?php
            foreach ($messages as $value)
                {
                    echo '<div class="messages">';
                    echo '<p>' .$value['text']. '</p>'; ?>
                    <?php
                        if ($_SESSION['login'])
                        {
                            if ($auth->getRole() == 'admin')
                            {
                                echo '<div class="messages-option">'; ?>
                                <form class="form-like" action="../processing/delete_message_processing.php" method="post"> <!-- Formulaire pour supprimer un message -->
                                    <button class="delete" type="submit" name="id" value="<?php echo $value['idMsg'] ?>"> X</button>
                                </form>

                                <form class="form-like" action="../controller/update_message_controller.php" method="post"> <!-- Formulaire pour modifier un message (redirection vers la page de modification des messages) -->
                                    <button class ="modify" type="submit" name="id" value="<?php echo $value['idMsg']?>"> Edit </button>
                                </form>
                                <?php
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                        echo '<br>';
                } ?>
    </div>
    <?php if ($_SESSION['login']) { ?>
        <div class="like">
            <form class="form-like" action="<?php echo $page_disc_processing ?>" method="post"> <!-- Création du formulaire pour liker les discussions (incrémentation du compteur, un seul like par utilisateur etc...) -->
                <input class ="submit1" type="submit" name="action" value="Like"/>
            </form>
            <div class="like-paraf">
                <p> Like : <?php echo $result['nbLike']?> </p>
            </div>
        </div>

    <?php
        if ($user->getRole() == 'admin') { ?> <!-- Option pour supprimer une discussion disponible seulement pour les utilisateurs possédant le rôle administrateur -->
            <form class="form-like" action="<?php echo $page_disc_processing ?>" method="post">
                <input class ="submit2" type="submit" name="action" value="Supprimer la discussion"/>
            </form>
        <?php }
    if ($result['state']==1)
    { ?>
        <form class="form" action="<?php echo $page_disc_processing ?>" method="post"> <!-- Option pour supprimer une discussion disponible seulement pour les utilisateurs possédant le rôle administrateur -->
        <p> Ecrivez votre commentaire : </p>
        <input class="bouton" type="text" name="texte" maxlength="20" placeholder="Entrer un message de deux mots maximum" pattern="^([A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]* [A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*)$|^([A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*-?[A-Za-z0-9'éèàùâêîôûëïç]*)$"/>
        <div class="ajouter-fermer">
            <input class ="submit" type="submit" name="action" value="Ajouter mon message"/>
            <input class ="submit" type="submit" name="action" value="Fermer le message"/>
        </div>
    </form>
    <?php } }
    else { ?>
    <div class="like">
        <div class="form-like"> <!-- Option qui permet un une personne non connecter d'appuyer sur ce bouton pour être redirigé vers la page de connection et pouvoir ensuite liker et commenter une discussion -->
            <a href="<?php echo $logincontroller ?>"><input class ="submit1" type="submit" name="action" value="Se connecter pour liker"/></a>
        </div>
        <div class="like-paraf">
            <p> Like : <?php echo $result['nbLike']?> </p>
        </div>
    </div>
    <?php } ?>

    <div class="nb-messages"> <!-- Affichage du nombre de message dans une discussion qui s'incrémente en fonction de si l'on supprime ou ajoiute un message -->
        <p> Nombre de messages dans la discussion :  <?php echo $result['nbMessage'].' / '.$result['nbMessMax'] ?></p>
    </div>

</div>
