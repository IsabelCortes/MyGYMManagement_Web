<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="actives/lib/bootstrap.min.css">

    <script src="actives/lib/jquery-3.5.1.min.js"></script>
    <script src="actives/lib/bootstrap.min.js"></script>
</head>
<body>
    <main class="container">
        <?php
        include_once "modules/header.php";
        include_once "modules/menu.php";

        global $controller;
        $controller->pageElection();
        ?> 
    </main>
</body>
</html>