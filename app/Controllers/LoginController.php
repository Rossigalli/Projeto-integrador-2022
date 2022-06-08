<?php
require_once '../app/Models/Users.php';
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
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
        header('Location: /Projeto-integrador-2022/index');
    }

    public function auth()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        Users::newActiveUser($email, $password);
    }
}
