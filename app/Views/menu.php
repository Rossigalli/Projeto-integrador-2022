<?php
require_once '../app/Models/Users.php';

new MenuFactory(
    Users::isAnActiveSession() ?
        array(
            MenuFactory::newProfileButton($_SESSION['fullName']),
            MenuFactory::newGenericButton('index', 'fa-solid fa-archway', 'Início'),
            MenuFactory::newDropdownButton('dashboard', 'fa-solid fa-gauge-simple', 'Dashboard', array(
                ($_SESSION['level'] == 'S' or $_SESSION['level'] == 'T') ? MenuFactory::newGenericButton('users', 'fa-solid fa-user-gear', 'Usuários') : '',
            )),
            MenuFactory::newGenericButton('login/logout', 'fa-solid fa-right-from-bracket', 'Sair')
        )
        :
        array(
            MenuFactory::newGenericButton('index', 'fa-solid fa-archway', 'Início'),
            MenuFactory::newGenericButton('login', 'fas fa-sign-in-alt', 'Entrar')
        )
);
