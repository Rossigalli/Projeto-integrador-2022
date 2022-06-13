<?php
require_once '../app/Models/Users.php';

new MenuFactory(
    Users::isAnActiveSession() ?
        array(
            MenuFactory::newProfileButton($_SESSION['fullName']),
            MenuFactory::newGenericButton('index', 'archway-solid', 'Início'),
            MenuFactory::newDropdownButton('dashboard', 'gauge-simple-solid', 'Dashboard', array(
                ($_SESSION['level'] == 'Suporte' or $_SESSION['level'] == 'Administrador') ? MenuFactory::newGenericButton('users', 'user-gear-solid', 'Usuários') : '',
            )),
            MenuFactory::newGenericButton('login/logout', 'right-from-bracket-solid', 'Sair')
        )
        :
        array(
            MenuFactory::newGenericButton('index', 'archway-solid', 'Início'),
            MenuFactory::newGenericButton('login', 'right-to-bracket-solid', 'Entrar')
        )
);
