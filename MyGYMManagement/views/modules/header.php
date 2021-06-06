<header class="row my-3">
    <div class="col-4 my-auto">
        <a style="text-decoration:none;" href="home">
            <h3 class="text-center text-light">MyGYMManagement</h3>
        </a>
    </div>
    <div class="col-6">
        <?php
        include_once "menu.php";
        ?>
    </div>
    <?php
    if(isset($_SESSION['logged'])) {
        ?>
        <div class="col-2 my-auto">
            <div>
                <a style="text-decoration:none;" id="logout" class="row" href="">
                    <img height="30" class="col-4" src="actives/img/logout.png" alt="Logout">
                    <p class="col-8 my-auto text-light">Cerrar sesión</p>
                </a>
            </div>
        </div>
        <?php
    }
    else {
        ?>
        <div class="col-2 my-auto">
            <div>
                <a style="text-decoration:none;" class="row" href="login">
                    <img height="30" class="col-4" src="actives/img/login.png" alt="Login">
                    <p class="col-8 my-auto text-light">Iniciar sesión</p>
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