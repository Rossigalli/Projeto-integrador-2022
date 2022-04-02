<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <base href="http://127.0.0.1/Projeto-integrador-2022/public/">

    <!-- CSS -->
    <link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/menu.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500&family=Roboto&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/972abef5f2.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="js/header.js"></script>

    <title>OSM | Inicio</title>
</head>

<body>
    <?php
    include_once 'header.php';
    include_once 'menu.php';
    ?>
    <main>
        <?php
        $this->loadView($view_);
        ?>
    </main>
</body>

</html>