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
        $query = $this->db->prepare('INSERT INTO user(user_name, email, password, role) VALUES (:user_name, :email, :password, :role)');
        $query->bindValue(':user_name', $user->getName());
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':password', $user->getPassword());
        $query->bindValue(':role', 'member');
        $query->execute();
    }

    public function getUser($info)
    {
        $query = $this->db->prepare('SELECT * FROM user WHERE email =?');
        $query->execute([$info]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return new User($result);
    }

    public function updateName (User $user)
    {
        $query = $this->db->prepare('UPDATE user SET user_name = :user_name WHERE email = :email');
        $query->bindValue(':user_name', $user->getName(), PDO::PARAM_INT);
        $query->bindValue(':email', $user->getEmail(), PDO::PARAM_INT);
        $query->execute();
    }

    public function updatePassword (User $user)
    {
        $query = $this->db->prepare('UPDATE user SET password = :password WHERE email = :email');
        $query->bindValue(':password', $user->getPassword(), PDO::PARAM_INT);
        $query->bindValue(':email', $user->getEmail(), PDO::PARAM_INT);
        $query->execute();
    }

    public function updateRole (User $user)
    {
        $query = $this->db->prepare('UPDATE user SET role = :role WHERE email = :email');
        $query->bindValue(':role', $user->getRole(), PDO::PARAM_INT);
        $query->bindValue(':email', $user->getEmail(), PDO::PARAM_INT);
        $query->execute();
    }

    public function exist ($email, $password)
    {
        $query = $this->db->prepare('SELECT name, email, password, role FROM user WHERE email = :email AND password = :password');
        $query->bindValue(':email', $email, PDO::PARAM_INT);
        $query->bindValue(':password', $password, PDO::PARAM_INT);
        $donnees = $query->execute();

        return isset($donnees) ? true : false;
    }
}