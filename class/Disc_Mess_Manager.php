<?php
class Disc_Mess_Manager
{
    private $db; //objet PDO

    public function __construct($db)
    {
        $this->setDB($db);
    }

    public function setDb($db)
    {
        $this->db = $db;
    }

    public function add_disc (Discussion $discussion)
    {
        $query = $this->db->prepare('INSERT INTO discussion (discName, owner, nbMessMax) VALUES (:disc_name, :owner, :nb_mess_max)');
        $query->bindValue(':disc_name', $discussion->getDiscName());
        $query->bindValue(':owner', $discussion->getOwner());
        $query->bindValue(':nb_mess_max', $discussion->getNbMessMax());
        $query->execute();
    }

    public function add_msg (Message $message)
    {
        $query = $this->db->prepare('INSERT INTO message (idDiscussion, text) VALUES (:id, :text)');
        $query->bindValue(':id', $message->getIdDiscussion());
        $query->bindValue(':text', $message->getText());
        $query->execute();

        $querybis = $this->db->prepare('UPDATE discussion SET nbMessage = nbMessage + 1 WHERE idDiscussion = '. $message->getIdDiscussion());
        $querybis->execute();
    }

    public function add_ecrv (Ecrivain $ecrivain)
    {
        $query = $this->db->prepare('INSERT INTO ecrivain (writer, idMsg, idDiscussion) VALUES (:writer, :id_msg, :id_disc)');
        $query->bindValue(':writer', $ecrivain->getWriter());
        $query->bindValue(':id_msg', $ecrivain->getIdMsg());
        $query->bindValue(':id_disc', $ecrivain->getIdDiscussion());
        $query->execute();
    }

    public function add_liker (Like $like)
    {
        $query = $this->db->prepare('INSERT INTO like_user (liker, idDiscussion) VALUES (:liker, :id_disc)');
        $query->bindValue(':liker', $like->getLiker());
        $query->bindValue(':id_disc', $like->getIdDiscussion());
        $query->execute();
    }

    public function getIDLastDisc ()
    {
        $query = $this->db->prepare('SELECT MAX(idDiscussion) as id FROM discussion');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }

    public function getIDLastMsg ()
    {
        $query = $this->db->prepare('SELECT MAX(idMsg) as id FROM message');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }

    public function getDiscussionPagination ()
    {
        $query = $this->db->prepare('SELECT * FROM discussion ORDER BY nbLike DESC LIMIT 0,2');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getDiscussion ($id)
    {
        $query = $this->db->prepare('SELECT * FROM discussion WHERE idDiscussion = ?');
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getNbDiscussion ()
    {
        $query = $this->db->prepare('SELECT COUNT(*) as total FROM discussion');
        $query->execute();
        $donnee = $query->fetch(PDO::FETCH_ASSOC);
        return $donnee['total'];
    }

    public function getMsgForIDDisc ($id_discussion)
    {
        $query = $this->db->prepare('SELECT * FROM message WHERE idDiscussion = :id');
        $query->bindValue(':id', $id_discussion);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function incrLike ($id)
    {
        $query = $this->db->prepare('UPDATE discussion SET nbLike = nbLike +1 WHERE idDiscussion = ?');
        $query->execute([$id]);

        $liker = new Like(['liker' => $_SESSION['email'], 'idDiscussion' => $id]);
        $this->add_liker($liker);
    }

    public function canLike ($email, $id)
    {
        $query = $this->db->prepare('SELECT * FROM like_user WHERE liker=:liker AND idDiscussion=:id');
        $query->bindValue(':liker', $email);
        $query->bindValue(':id', $id);
        $query->execute();
        $canLike = $query->fetchAll(PDO::FETCH_ASSOC);

        return !isset($canLike[0]);
    }

    public function canWrite ($email, $id_disc, $id_msg)
    {
        $query = $this->db->prepare('SELECT * FROM ecrivain WHERE writer=:writer AND idDiscussion=:id_disc AND idMsg = :idMsg');
        $query->bindValue(':writer', $email);
        $query->bindValue(':id_disc', $id_disc);
        $query->bindValue(':idMsg', $id_msg);
        $query->execute();
        $canLike = $query->fetchAll(PDO::FETCH_ASSOC);

        return !isset($canLike[0]);
    }

    public function getOpenMsg ($id)
    {
        $query = $this->db->prepare('SELECT * FROM message WHERE idDiscussion = ? AND state = 1');
        $query->execute([$id]);
        $msg_array = $query->fetch(PDO::FETCH_ASSOC);

        return new Message($msg_array);
    }
    
    public function isOpenDisc ($id)
    {
        $query = $this->db->prepare('SELECT state FROM discussion WHERE idDiscussion = ?');
        $query->execute([$id]);
        $state = $query->fetch(PDO::FETCH_ASSOC);

        if ($state['state'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function closeDisc ($id)
    {
        $query = $this->db->prepare('UPDATE discussion SET state = 0 WHERE idDiscussion = ?');
        $query->execute([$id]);
    }

    public function closeMsg (Message $message)
    {
        $query = $this->db->prepare('UPDATE message SET state = 0 WHERE idMsg = ?');

        $query->execute([$message->getIdMsg()]);

        $disc_array = $this->getDiscussion($message->getIdDiscussion());
        $discussion = new Discussion($disc_array);

        if ($discussion->getNbMessage() >= $discussion->getNbMessMax()) {
            $this->closeDisc($discussion->getIdDiscussion());
        } else {
            $new_message = new Message(['idDiscussion' => $discussion->getIdDiscussion(),'text' => '']);
            $this->add_msg($new_message);
        }
    }

    public function concatenation (Message $message, $text)
    {
        $msg = $this->getTexte($message->getIdMsg()).' '.$text;

        $query = $this->db->prepare('UPDATE message SET text = ? WHERE idMsg = ?');
        $query->execute([$msg, $message->getIdMsg()]);

        $ecrivain = new Ecrivain(['writer' => $_SESSION['email'],'idMsg' =>$message->getIdMsg(), 'idDiscussion' => $message->getIdDiscussion()]);
        $this->add_ecrv($ecrivain);
    }

    public function getTexte ($idMsg)
    {
        $query = $this->db->prepare('SELECT text FROM message WHERE idMsg = ?');
        $query->execute([$idMsg]);
        $msg = $query->fetch(PDO::FETCH_ASSOC);

        return $msg['text'];
    }

    public function getUserDiscussion ($email)
    {
        $query = $this->db->prepare('SELECT * FROM discussion WHERE owner = ?');
        $query->execute([$email]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


}