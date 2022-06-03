<?php
require_once '../app/Models/Users.php';

class UsersController extends Controller
{

    public function index()
    {
        if (Users::isAnActiveSession()) {

            $authenticatedUser = Users::newActiveUser();
            $content = $authenticatedUser->getUsersBetween(0, 10);

            $this->loadTemplate('users', $content);
        } else {
            $this->loadTemplate('home');
        }
    }

    public function addNewUser()
    {
        if (Users::isAnActiveSession() && isset($_POST['name']) && isset($_POST['email'])) {
            $authenticatedUser =  Users::newActiveUser();
            $authenticatedUser->createNewUser($_POST['name'], $_POST['email']);

            header('Location: /Projeto-integrador-2022/users');
        }
        $this->loadTemplate('home');
    }

    public function deleteUser($_id)
    {
        if (Users::isAnActiveSession()) {
            $authenticatedUser =  Users::newActiveUser();
            $authenticatedUser->deleteUser($_id);

            header('Location: /Projeto-integrador-2022/users');
        }
        $this->loadTemplate('home');
    }
}
