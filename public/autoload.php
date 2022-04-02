<?php

spl_autoload_register(function ($fileName) {
    if (file_exists('../app/Controllers/' . $fileName . '.php')) {
        require('../app/Controllers/' . $fileName . '.php');
    } elseif (file_exists('../app/Core/' . $fileName . '.php')) {
        require('../app/Core/' . $fileName . '.php');
    } elseif (file_exists('../app/Helpers/Factories/' . $fileName . '.php')) {
        require('../app/Helpers/Factories/' . $fileName . '.php');
    } elseif (file_exists('../app/Models/' . $fileName . '.php')) {
        require('../app/Models/' . $fileName . '.php');
    }
});
