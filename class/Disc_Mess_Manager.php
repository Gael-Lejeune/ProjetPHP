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
        $query = $this->db->prepare('INSERT INTO discussion (disc_name, owner, nb_mess_max) VALUES (:disc_name, :owner, :nb_mess_max)');
        $query->bindValue(':disc_name', $discussion->getDiscName());
        $query->bindValue(':owner', $discussion->getOwner());
        $query->bindValue(':nb_mess_max', $discussion->getNbMessMax());
        $query->execute();
    }

    public function add_msg (Message $message)
    {
        $query = $this->db->prepare('INSERT INTO message (id_discussion, text) VALUES (:id, :text)');
        $query->bindValue(':id', $message->getIdDiscussion());
        $query->bindValue(':text', $message->getText());
        $query->execute();

        $querybis = $this->db->prepare('UPDATE discussion SET nb_message = nb_message + 1 WHERE id_discussion = '. $message->getIdDiscussion());
        $querybis->execute();
    }

    public function add_ecrv (Ecrivain $ecrivain)
    {
        $query = $this->db->prepare('INSERT INTO ecrivain (writer, id_msg, id_discussion) VALUES (:writer, :id_msg, :id_disc)');
        $query->bindValue(':writer', $ecrivain->getWriter());
        $query->bindValue(':id_msg', $ecrivain->getIdMsg());
        $query->bindValue(':id_disc', $ecrivain->getIdDiscussion());
        $query->execute();
    }

    public function getIDLastDisc ()
    {
        $query = $this->db->prepare('SELECT MAX(id_discussion) as id FROM discussion');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }

    public function getIDLastMsg ()
    {
        $query = $this->db->prepare('SELECT MAX(id_msg) as id FROM message');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }

    public function getDiscussion ()
    {
        $query = $this->db->prepare('SELECT * FROM discussion WHERE state = 1 LIMIT 0,2');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getMsgForIDDisc ($id_discussion)
    {
        $query = $this->db->prepare('SELECT * FROM message WHERE id_discussion = :id');
        $query->bindValue(':id', $id_discussion);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

}