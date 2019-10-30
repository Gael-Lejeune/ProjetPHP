<?php
class UserManager
{
    private $db; // instance de PDO

    public function __construct($db)
    {
        $this->setDB($db);
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    public function add(User $user)
    {
        $query = $this->db->prepare('INSERT INTO Users(user_name, email, password, role) VALUES (:user_name, :email, :password, :role)');
        $query->bindValue(':user_name', $user->getName());
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':password', $user->getPassword());
        $query->bindValue(':role', 'member');
        $query->execute();
    }

    public function getUser($email)
    {
        $query = $this->db->prepare('SELECT * FROM Users WHERE email =?');
        $query->execute([$email]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return new User($result);
    }

    public function updateName (User $user)
    {
        $query = $this->db->prepare('UPDATE Users SET user_name = ? WHERE email = ?');
        $query->execute([$user->getName(), $user->getEmail()]);
    }

    public function updatePassword (User $user)
    {
        $query = $this->db->prepare('UPDATE Users SET password = ? WHERE email = ?');
        $query->execute([$user->getPassword(), $user->getEmail()]);
    }

    public function updateRole (User $user)
    {
        $query = $this->db->prepare('UPDATE Users SET role = ? WHERE email = ?');
        $query->execute([$user->getRole(), $user->getEmail()]);
    }

    public function exist ($email, $password)
    {
        $query = $this->db->prepare('SELECT user_name FROM Users WHERE email = :email AND password = :password');
        $query->execute(array(':email' => $email, ':password' => $password));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return !$result ? false : true;
    }

    public function email_exist ($email)
    {
        $query = $this->db->prepare('SELECT user_name FROM Users WHERE email = :email');
        $query->execute(array(':email' => $email));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return isset($result['user_name']) ? true : false;
    }

    public function password()
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
}