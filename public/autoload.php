<?php

spl_autoload_register(function ($fileName) {
    if (file_exists('../app/Controllers/' . $fileName . '.php')) {
        require('../app/Controllers/' . $fileName . '.php');
    } elseif (file_exists('../app/Core/' . $fileName . '.php')) {
        require('../app/Core/' . $fileName . '.php');
    } elseif (file_exists('../app/Helpers/Classes/' . $fileName . '.php')) {
        require('../app/Helpers/Classes/' . $fileName . '.php');
    }
});
