<?php

require 'DBConnection.php';

class Users
{
    private $conn;
    private $email;
    private $pass;

    public function __construct($email_, $pass_)
    {
        $this->email = $email_;
        $this->pass = $pass_;

        $this->conn = DBConnection::getConnection();
        if ($this->isAValidUser()) {

            $_SESSION['userId'] = $this->getId();
            $_SESSION['fullName'] = $this->getFullName();
            $_SESSION['email'] = $this->getEmail();

            header('Location: http://127.0.0.1/Projeto-integrador-2022/index');
            exit;
        }
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
    public function getId()
    {
        $query = $this->conn->prepare('SELECT `id` FROM `users` WHERE `email` = :email AND `pass` = :pass');
        $query->execute(array(
            'email' => $this->getEmail(),
            'pass' => $this->getPass()
        ));

        return $query->fetch(PDO::FETCH_ASSOC)['id'];
    }

    private function setEmail($email_)
    {
        //
    }
    public function getEmail()
    {
        return $this->email;
    }

    private function setFullName($fullName_)
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

    private function setPass($pass_)
    {
        //
    }
    public function getPass()
    {
        return $this->pass;
    }

    public static function isAnActiveSession()
    {
        if (isset($_SESSION['userId'])) {
            return true;
        }
        return false;
    }
}
