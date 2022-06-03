<?php

require 'DBConnection.php';

class Users
{
    private $conn;
    private $email;
    private $pass;
    private static $activeUser;

    private function __construct($email_, $pass_)
    {
        $this->setEmail($email_);
        $this->setPass($pass_);

        $this->conn = DBConnection::getConnection();
        if ($this->isAValidUser()) {

            $_SESSION['userId'] = $this->getId();
            $_SESSION['fullName'] = $this->getFullName();
            $_SESSION['email'] = $this->getEmail();

            header('Location: /Projeto-integrador-2022/index');
            exit;
        } else {
            self::$activeUser = "";
        }
    }

    public static function newActiveUser($email_ = '', $pass_ = '')
    {
        if (!self::$activeUser) {
            self::$activeUser = new Users($email_, $pass_);
        }
        return self::$activeUser;
    }

    public function isAValidUser()
    {
        $query = $this->conn->prepare('SELECT `id` FROM `users` WHERE `email` = :email AND `pass` = :pass');
        $query->execute(array(
            'email' => $this->getEmail(),
            'pass' => $this->getPass()
        ));

        if ($query->fetch(PDO::FETCH_ASSOC)) {
            return true;
        }

        return false;
    }

    public static function isAnActiveSession()
    {
        if (isset($_SESSION['userId'])) {
            return true;
        }
        return false;
    }

    public function getId()
    {
        $query = $this->conn->prepare('SELECT `id` FROM `users` WHERE `email` = :email AND `pass` = :pass');
        $query->execute(array(
            'email' => $this->getEmail(),
            'pass' => $this->getPass()
        ));

        return $query->fetch(PDO::FETCH_ASSOC)['id'];
    }

    public function setEmail($email_)
    {
        $this->email = $email_;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setFullName($fullName_)
    {
        //
    }

    public function getFullName()
    {
        $query = $this->conn->prepare('SELECT `full_name` FROM `users` WHERE `email` = :email AND `pass` = :pass');
        $query->execute(array(
            'email' => $this->getEmail(),
            'pass' => $this->getPass()
        ));

        return $query->fetch(PDO::FETCH_ASSOC)['full_name'];
    }

    public function setPass($pass_)
    {
        $this->pass = $pass_;
    }
    public function getPass()
    {
        return $this->pass;
    }

    public function getUsersBetween($min_, $max_)
    {
        $query = $this->conn->prepare('SELECT `id`, `full_name`, `email` FROM `users` LIMIT :min, :max');
        $query->bindParam(':min', $min_, PDO::PARAM_INT);
        $query->bindParam(':max', $max_, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createNewUser($name_, $email_)
    {
        if ($name_ != '' && $email_ != '') {
            $query = $this->conn->prepare('INSERT INTO `users` (`full_name`, `email`) VALUES (:name, :email)');
            $query->execute(array(
                'name' => $name_,
                'email' => $email_
            ));
        }
    }
    public function deleteUser($id_)
    {
        $query = $this->conn->prepare('DELETE FROM `users` WHERE `id` = :id');
        $query->execute(array(
            'id' => $id_
        ));
    }
}
