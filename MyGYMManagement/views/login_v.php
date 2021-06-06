<?php

global $loginController;
$errorMessage = "";

if(isset($_POST['username']) && isset($_POST['password'])) {

    $id_user = $loginController->checkLogin($_POST['username'], $_POST['password']);

    switch($id_user) {
        case "usernameError":
            $errorMessage = "No existe ningún usuario registrado con ese nombre.";
        break;
        case "passwordError":
            $errorMessage = "Contraseña incorrecta.";
        break;
        default:
            $_SESSION['logged'] = ["username" => $_POST['username'], "id_user" => $id_user];
            header("location:home");
        break;
    }

}

?>

<section>
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="alert alert-danger alert-dismissible fade <?= $errorMessage!='' ? 'show' : ''; ?>" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
                </button>
                <strong><?= $errorMessage; ?></strong>
            </div>
            <div class="card">
                <h5 class="card-header">Inicio de sesión</h5>
                <div class="card-body">
                    <form action="login" method="POST">
                        <div class="form-group">
                            <label for="username">Nombre de usuario:</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario" maxlength="16" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" name="password" id="password" maxlength="16" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </form>
                    <p class="mt-1">Si todavia no estás registrado puedes registrarte <a href="register">aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</section>