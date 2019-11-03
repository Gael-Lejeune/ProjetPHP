<?php

// Classe Manager permettant de modifier la table User à partir de requêtes SQL
class UserManager
{
    // ***************************** Creation classe *************************************

    /**
     * @var PDO
     */
    private $db; // instance de PDO

    /**
     * UserManager constructor.
     * @param $db
     */
    public function __construct($db) // Constructeur
    {
        $this->setDB($db);
    }

    /**
     * @param PDO $db
     */
    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    // ***************************** Fonctions *************************************

    /**
     * @param User $user
     */
    public function add(User $user) // permet d'ajouter un utilisateur dans la table user
    {
        $query = $this->db->prepare('INSERT INTO Users(user_name, email, password, role) VALUES (:user_name, :email, :password, :role)');
        $query->bindValue(':user_name', $user->getName());
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':password', $user->getPassword());
        $query->bindValue(':role', $user->getRole());
        $query->execute();
    }

    /**
     * @return array (liste de tous les mails enregistres dans la base de données)
     */
    public function getMails()
    {
        $query = $this->db->prepare('SELECT email FROM Users');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

        /**
     * @param string $email
     * @return User
     */
    public function getUser($email) // permet de recuperer un objet de type User contenant toutes les informations de l'utilisateur qui a pour email celui passé en paramètre
    {
        $query = $this->db->prepare('SELECT * FROM Users WHERE email =?');
        $query->execute([$email]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return new User($result);
    }

    /**
     * @return array (liste de tous les mails enregistres dans la base de données)
     */
    public function getMails()  {
        $query = $this->db->prepare('SELECT email FROM Users');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * @param User $user
     */
    public function updateName (User $user) // modifie le nom de l'utilisateur passé en paramètre à partir du nom contenu dans ce même parmaètre
    {
        $query = $this->db->prepare('UPDATE Users SET user_name = ? WHERE email = ?');
        $query->execute([$user->getName(), $user->getEmail()]);
    }

    /**
     * @param User $user
     */
    public function updatePassword (User $user) // modifie le mot de passe de l'utilisateur passé en paramètre à partir du mot de passe contenu dans ce même parmaètre
    {
        $query = $this->db->prepare('UPDATE Users SET password = ? WHERE email = ?');
        $query->execute([$user->getPassword(), $user->getEmail()]);
    }

    /**
     * @param User $user
     */
    public function updateRole (User $user) // modifie le role de l'utilisateur passé en paramètre à partir du role contenu dans ce même parmaètre
    {
        $query = $this->db->prepare('UPDATE Users SET role = ? WHERE email = ?');
        $query->execute([$user->getRole(), $user->getEmail()]);
    }

    /**
     * @param string $email
     * @param string $password (crypte en md5)
     * @return bool
     */
    public function exist ($email, $password) // renvoi vrai si l'utilisateur est bien entrer dans la base de donnée et que le mot de passe correspond, faux dans l'autre cas
    {
        $query = $this->db->prepare('SELECT user_name FROM Users WHERE email = :email AND password = :password');
        $query->execute(array(':email' => $email, ':password' => $password));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return !$result ? false : true;
    }

    /**
     * @param $email
     * @return bool
     */
    public function email_exist ($email) // renvoi vrai si l'utilisateur est bien entrer dans la base de donnée, faux dans l'autre cas
    {
        $query = $this->db->prepare('SELECT user_name FROM Users WHERE email = :email');
        $query->execute(array(':email' => $email));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return isset($result['user_name']) ? true : false;
    }

    /**
     * @return string
     */
    public function password() // renvoi une chaine de 15 caractères aléatoire, qui correspondra à un nouveau mot de passe aléatoire.
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < 15; $i++)
        {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;
    }

    /**
     * @param string $email
     */
    public function delete ($email) { // permet de supprimer un utilisateur de la table
        $query = $this->db->prepare('DELETE FROM Users WHERE email=?');
        $query->execute([$email]);
    }
}
