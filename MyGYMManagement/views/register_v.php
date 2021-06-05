<?php
    global $loginController;
    $errorMessage = "";

    if(isset($_POST['username']) && isset($_POST['email'])) {

        $error = $loginController->checkRegister($_POST['username'], $_POST['email']);
        
        switch ($error) {
            case "usernameError":
                $errorMessage = "Este nombre de usuario ya está registrado.";
            break;
            case "emailError":
                $errorMessage = "Este correo electrónico ya está registrado.";
            break;
            default:
                $user = new User_m;
                $user->fullname = $_POST['fullname'];
                $user->age = $_POST['age'];
                $user->username = $_POST['username'];
                $user->password = $_POST['password'];
                $user->email = $_POST['email'];
                $user->premium = $_POST['premium'];

                $loginController->makeRegister($user);
                header("location:home");
            break;
        }

    }
?>

<section>
    <div class="row">
        <div class="col-6 mx-auto mt-3 mb-5">
            <h3>Registro</h3>
            <div class="alert alert-danger alert-dismissible fade <?= $errorMessage!='' ? 'show' : ''; ?>" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
                </button>
                <strong><?= $errorMessage; ?></strong>
            </div>
            <hr>
            <form action="register" method="POST">
            <fieldset>
                <legend>Datos personales</legend>
                <div class="form-group row">
                    <div class="col-10">
                        <label for="fullname">Nombre:</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo isset($_REQUEST['fullname']) ? $_REQUEST['fullname'] : ''; ?>" name="fullname" id="fullname" placeholder="Nombre completo" maxlength="255" required autofocus>
                    </div>
                    <div class="col-2">
                        <label for="age">Edad:</label>
                        <input type="number" class="form-control form-control-sm" value="<?php echo isset($_REQUEST['age']) ? $_REQUEST['age'] : ''; ?>" name="age" id="age" min="12" max="200" required>
                    </div>
                </div>
            </fieldset>
            <hr>
            <fieldset>
                <legend>Datos de usuario</legend>
                <div class="form-group row">
                    <div class="col-8">
                        <label for="username">Nombre de Usuario:</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo isset($_REQUEST['username']) ? $_REQUEST['username'] : ''; ?>" name="username" id="username" placeholder="Nombre de usuario" maxlength="16" required>
                    </div>
                    <div class="col-4">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control form-control-sm" value="<?php echo isset($_REQUEST['password']) ? $_REQUEST['password'] : ''; ?>" name="password" id="password" maxlength="16" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-8">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control form-control-sm" value="<?php echo isset($_REQUEST['email']) ? $_REQUEST['email'] : ''; ?>" name="email" id="email" placeholder="Correo electrónico" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="hidden" name="premium" value="0">
                    <div class="col-12">
                        <label class="mr-2" for="premium">¿Quiere disfrutar de las ventajas de ser un usuario Premium?</label>
                        <input type="checkbox" name="premium" value="1" <?php echo (isset($_REQUEST['premium']) && $_REQUEST['premium']==1) ? "checked" : ""; ?>>
                    </div>
                </div>
            </fieldset>  
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
        </form>
        </div>
    </div>
</section>