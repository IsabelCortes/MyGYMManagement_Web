<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyGYMManagement</title>

    <link rel="stylesheet" href="actives/lib/bootstrap.min.css">

    <script src="actives/lib/jquery-3.5.1.min.js"></script>
    <script src="actives/lib/bootstrap.min.js"></script>
</head>
<body class="d-flex flex-column vh-100 bg-light">
    <div class="bg-primary">
        <div class="container">
        <?php
        include_once "modules/header.php";
        ?>
        </div>
    </div>
    <main class="container bg-light" style="flex-grow: 1;">
        <?php
        if(isset($_SESSION['logged'])) {
            ?>
            <div class="mt-1">
                <p class="text-secondary text-right">Bienvenido <?= $_SESSION['logged']['username'] ?></p>
            </div>    
            <?php
        }
        else {
            ?>
            <div>
                <p class="text-light">-</p>
            </div>
            <?php 
        }
        global $viewsController;
        $viewsController->pageElection();
        ?> 
    </main>
    <div class="bg-dark mt-5">
        <div class="container">
        <?php
        include_once "modules/footer.php";
        ?>
        </div>
    </div>  
</body>
</html>