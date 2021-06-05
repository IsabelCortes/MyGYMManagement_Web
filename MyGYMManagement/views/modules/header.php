<header class="row mx-5 my-3">
    <div class="col-2">
        <a href="home">
            <img height="60" src="actives/img/logo.png" alt="Logo">
        </a>
    </div>
    <div class="col-8">
        <a style="text-decoration:none;" href="home"><h1 class="text-center mr-5">MyGYMManagement</h1></a>
    </div>
    <?php
    if(isset($_SESSION['logged'])) {
        ?>
        <div class="col-2">
            <div>
                <a id="logout" class="row" href="">
                    <img height="30" class="col-4 mt-2" src="actives/img/logout.png" alt="Logout">
                    <p class="col-8">Cerrar sesión</p>
                </a>
            </div>
        </div>
        <?php
    }
    else {
        ?>
        <div class="col-2">
            <div>
                <a class="row" href="login">
                    <img height="30" class="col-4 mt-2" src="actives/img/login.png" alt="Login">
                    <p class="col-8">Iniciar sesión</p>
                </a>
            </div>
        </div>
        <?php
    }
    ?>
</header>
<script>
    $("#logout").on("click", function(evento) {
        if(confirm("¿Seguro que quieres cerrar sesión?")) {
            $.ajax({
            url: "logout",
            method: "POST",
            data: {
                "confirm": true
            },
            success: function(datosDev) {
                window.location.href = "home";
            }
        });
        }
    });
</script>