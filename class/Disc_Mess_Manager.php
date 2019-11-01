<?php

// Classe Manager permettant de modifier les tables Discussions, Message, Ecrivain, Like_user à partir de requêtes SQL
class Disc_Mess_Manager
{
    // ***************************** Creation classe *************************************

    /**
     * @var PDO
     */
    private $db; //objet PDO

    /**
     * Disc_Mess_Manager constructor.
     * @param $db
     */
    public function __construct($db) // Constructeur
    {
        $this->setDB($db);
    }

    /**
     * @param PDO $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    // ***************************** Ajout de tuples dans les tables *************************************

    /**
     * @param Discussion $discussion
     */
    public function add_disc (Discussion $discussion) // ajout d'une nouvelle discussion dans la table discussion
    {
        $query = $this->db->prepare('INSERT INTO discussion (discName, owner, nbMessMax) VALUES (:disc_name, :owner, :nb_mess_max)');
        $query->bindValue(':disc_name', $discussion->getDiscName());
        $query->bindValue(':owner', $discussion->getOwner());
        $query->bindValue(':nb_mess_max', $discussion->getNbMessMax());
        $query->execute();
    }

    /**
     * @param Message $message
     */
    public function add_msg (Message $message) // ajout d'un nouveau message dans la table message
    {
        $query = $this->db->prepare('INSERT INTO message (idDiscussion, text) VALUES (:id, :text)');
        $query->bindValue(':id', $message->getIdDiscussion());
        $query->bindValue(':text', $message->getText());
        $query->execute(); // On met à jour le message

        $querybis = $this->db->prepare('UPDATE discussion SET nbMessage = nbMessage + 1 WHERE idDiscussion = '. $message->getIdDiscussion());
        $querybis->execute(); // On incremente dans la table discussion le nombre de message
    }

    /**
     * @param Ecrivain $ecrivain
     */
    public function add_ecrv (Ecrivain $ecrivain) // ajout d'un nouveau tuple dans la table ecrivain
    {
        $query = $this->db->prepare('INSERT INTO ecrivain (writer, idMsg, idDiscussion) VALUES (:writer, :id_msg, :id_disc)');
        $query->bindValue(':writer', $ecrivain->getWriter());
        $query->bindValue(':id_msg', $ecrivain->getIdMsg());
        $query->bindValue(':id_disc', $ecrivain->getIdDiscussion());
        $query->execute();
    }

    /**
     * @param Like $like
     */
    public function add_liker (Like $like) // ajout d'un nouveau tuple dans la table like_user
    {
        $query = $this->db->prepare('INSERT INTO like_user (liker, idDiscussion) VALUES (:liker, :id_disc)');
        $query->bindValue(':liker', $like->getLiker());
        $query->bindValue(':id_disc', $like->getIdDiscussion());
        $query->execute();
    }

    // ***************************** Fonction contenant des requetes avec la table Discussion *************************************

    /**
     * @return int idDiscussion
     */
    public function getIDLastDisc () // retourne l'id de la dernière discussion créer
    {
        $query = $this->db->prepare('SELECT MAX(idDiscussion) as id FROM discussion');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }

    /**
     * @param int $limit1
     * @param int $limit2
     * @return array
     */
    public function getDiscussionPagination ($limit1, $limit2) // retourne de la limit1 à la limit2 discsussion les plus likés
    {
        $query = 'SELECT * FROM discussion ORDER BY nbLike DESC LIMIT ';
        $query= $query."$limit1, $limit2";
        $query = $this->db->prepare($query);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getDiscussion ($id) // renvoi un tableau contenant toutes les informations de la discussion avec l'id donnée en parametre
    {
        $query = $this->db->prepare('SELECT * FROM discussion WHERE idDiscussion = ?');
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * @return int total
     */
    public function getNbDiscussion () // retourne le nombre total de discussion differentes enregistrés dans la base de donnée
    {
        $query = $this->db->prepare('SELECT COUNT(*) as total FROM discussion');
        $query->execute();
        $donnee = $query->fetch(PDO::FETCH_ASSOC);
        return $donnee['total'];
    }

    /**
     * @param string $email
     * @return int total
     */
    public function getNbOpenDiscForUser ($email) // retourne le nombre total de discussion ouvertes enregistrés dans la base de donnée
    {
        $query = $this->db->prepare('SELECT COUNT(*) as total FROM discussion WHERE owner = ? AND state = 1');
        $query->execute([$email]);
        $donnee = $query->fetch(PDO::FETCH_ASSOC);
        return $donnee['total'];
    }

    /**
     * @param string $email
     * @return array
     */
    public function getUserDiscussion ($email) // renvoi une matrice (tableau de tableau) contenant toutes les informations sur toutes les discussion créer par l'utilisateur donnée en argument
    {
        $query = $this->db->prepare('SELECT * FROM discussion WHERE owner = ?');
        $query->execute([$email]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * @param int $id
     * @return string owner
     */
    public function getOwner ($id) // renvoie l'email du propriétaire de la discussion donnée en paramètre
    {
        $query = $this->db->prepare('SELECT owner FROM discussion WHERE idDiscussion = ?');
        $query->execute([$id]);
        $owner = $query->fetch(PDO::FETCH_ASSOC);

        return $owner['owner'];
    }

    /**
     * @param int $id
     */
    public function incrLike ($id) // incrémente d'un le nombre de like d'une discussion donnée en paramètre
    {
        $query = $this->db->prepare('UPDATE discussion SET nbLike = nbLike +1 WHERE idDiscussion = ?');
        $query->execute([$id]); // On ajoute le like dans la table discussion

        $liker = new Like(['liker' => $_SESSION['email'], 'idDiscussion' => $id]);
        $this->add_liker($liker); // On indique que cette personne a bien liké la discussion
    }

    /**
     * @param int $id
     */
    public function closeDisc ($id) // ferme la discussion donnée en paramètre
    {
        $query = $this->db->prepare('UPDATE discussion SET state = 0 WHERE idDiscussion = ?');
        $query->execute([$id]);
    }

    // ***************************** Fonction contenant des requetes avec la table Message *************************************

    /**
     * @return int idMessage
     */
    public function getIDLastMsg () // renvoi l'id du dernier message créer
    {
        $query = $this->db->prepare('SELECT MAX(idMsg) as id FROM message');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }

    /**
     * @param int $id_discussion
     * @return array
     */
    public function getMsgForIDDisc ($id_discussion) // renvoi une matrice contenant toutes les informations des message de la discussion donnée en paramètre
    {
        $query = $this->db->prepare('SELECT * FROM message WHERE idDiscussion = :id');
        $query->bindValue(':id', $id_discussion);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * @param int $id
     * @return Message
     */
    public function getOpenMsg ($id) // renvoi le message ouvert de la discussion donnée en paramètre
    {
        $query = $this->db->prepare('SELECT * FROM message WHERE idDiscussion = ? AND state = 1');
        $query->execute([$id]);
        $msg_array = $query->fetch(PDO::FETCH_ASSOC);

        return new Message($msg_array);
    }

    /**
     * @param int $idMsg
     * @return string text
     */
    public function getTexte ($idMsg) // renvoi le texte du message donné en paramètre
    {
        $query = $this->db->prepare('SELECT text FROM message WHERE idMsg = ?');
        $query->execute([$idMsg]);
        $msg = $query->fetch(PDO::FETCH_ASSOC);

        return $msg['text'];
    }

    /**
     * @param Message $message
     * @param string $text
     */
    public function concatenation (Message $message, $text) // permet de mettre à jour le texte du message donné en paramètre en lui ajoutant le texte également donné en paramètre
    {
        $msg = $this->getTexte($message->getIdMsg()).' '.$text; // On créer la variable contenant le nouveau texte

        $query = $this->db->prepare('UPDATE message SET text = ? WHERE idMsg = ?');
        $query->execute([$msg, $message->getIdMsg()]); // On met à jour le texte dans la table message

        $ecrivain = new Ecrivain(['writer' => $_SESSION['email'],'idMsg' =>$message->getIdMsg(), 'idDiscussion' => $message->getIdDiscussion()]);
        $this->add_ecrv($ecrivain); // On indique dans ecrivain que cette personne a bien écrit dans ce message
    }

    /**
     * @param Message $message
     */
    public function closeMsg (Message $message) // ferme le message donné en paramètre
    {
        $query = $this->db->prepare('UPDATE message SET state = 0 WHERE idMsg = ?');
        $query->execute([$message->getIdMsg()]); // On ferme le message

        $disc_array = $this->getDiscussion($message->getIdDiscussion());
        $discussion = new Discussion($disc_array); // On recupere la discussion dans laquelle est le message

        // Si le nombre maximum de message pour cette discussion est atteint
        if ($discussion->getNbMessage() >= $discussion->getNbMessMax()) {
            $this->closeDisc($discussion->getIdDiscussion()); // On ferme la discussion
        // sinon
        } else {
            $new_message = new Message(['idDiscussion' => $discussion->getIdDiscussion(),'text' => '']);
            $this->add_msg($new_message); // On ouvre un nouveau message vide
        }
    }

    // ***************************** Fonction contenant des requetes avec la table Ecrivain *************************************

    /**
     * @param string $email
     * @param int $id_disc
     * @param int $id_msg
     * @return bool
     */
    public function canWrite ($email, $id_disc, $id_msg) // renvoi vrai si l'utilisateur n'a jamais ecrit dans le message donné en paramètre, faux dans l'autre cas
    {
        $query = $this->db->prepare('SELECT * FROM ecrivain WHERE writer=:writer AND idDiscussion=:id_disc AND idMsg = :idMsg');
        $query->bindValue(':writer', $email);
        $query->bindValue(':id_disc', $id_disc);
        $query->bindValue(':idMsg', $id_msg);
        $query->execute();
        $canLike = $query->fetchAll(PDO::FETCH_ASSOC);

        return !isset($canLike[0]);
    }

    // ***************************** Fonction contenant des requetes avec la table Like_user *************************************

    /**
     * @param string $email
     * @param int $id
     * @return bool
     */
    public function canLike ($email, $id) // renvoi vrai si l'utilisateur n'a jamais liké la discussion donné en paramètre, faux dans l'autre cas
    {
        $query = $this->db->prepare('SELECT * FROM like_user WHERE liker=:liker AND idDiscussion=:id');
        $query->bindValue(':liker', $email);
        $query->bindValue(':id', $id);
        $query->execute();
        $canLike = $query->fetchAll(PDO::FETCH_ASSOC);

        return !isset($canLike[0]);
    }

}