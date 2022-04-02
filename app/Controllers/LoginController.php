<?php

class LoginController extends Controller
{

    public function index()
    {
        $this->loadTemplate('login');


        if (isset($_POST['login'])) {
            $this->auth();
        }
    }

    public function logout()
    {
        session_destroy();

        header('Location: http://127.0.0.1/Projeto-integrador-2022/index');
    }

    public function auth()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        new Users($email, $password);
    }
}
