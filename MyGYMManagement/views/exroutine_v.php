<section>
<?php

if(isset($_POST['routine']) && isset($_POST['color']) && isset($_SESSION['logged'])) {
    $routine = new Routine_m;
    $routine->user = $_SESSION['logged']['id_user'];
    $routine->routine = $_POST['routine'];
    $routine->color = $_POST['color'];
    $routine->monday = $_POST['monday'];
    $routine->tuesday = $_POST['tuesday'];
    $routine->wednesday = $_POST['wednesday'];
    $routine->thursday = $_POST['thursday'];
    $routine->friday = $_POST['friday'];
    $routine->saturday = $_POST['saturday'];
    $routine->sunday = $_POST['sunday'];
    Routine_m::insertUserRoutine($routine);

    header("location:routines");
}

if(isset($_POST['routine'])) {
    $routine = Routine_m::getRoutineById($_POST['routine']);
    $routineObjective = Routine_m::getRoutineObjectiveById($routine['objective']);
    $routineDifficulty = Routine_m::getRoutineDifficultyById($routine['difficulty']);

    $routineExercises = Exercise_m::getExercisesByRoutine($routine['cod_routine']);

    ?>
    <div class="row">
        <div class="col-6">
        <?php
                switch($routineDifficulty['type']){
                    case "Principante":
                        ?>
                        <div class="card border-success my-2">
                        <h5 class="card-header text-white bg-success"><?php echo $routine['name']; ?></h5>
                        <?php
                    break;
                    case "Intermedia":
                        ?>
                        <div class="card border-warning my-2">
                        <h5 class="card-header text-white bg-warning"><?php echo $routine['name']; ?></h5>
                        <?php
                    break;
                    case "Avanzada":
                        ?>
                        <div class="card border-danger my-2">
                        <h5 class="card-header text-white bg-danger"><?php echo $routine['name']; ?></h5>
                        <?php
                    break;
                    default:
                        ?>
                        <div class="card my-2">
                        <h5 class="card-header"><?php echo $routine['name']; ?></h5>
                        <?php
                    break;
                }
                ?>
                <div class="card-body">
                    <form method="POST" action="exroutine">
                        <input name="routine" type="hidden" value="<?= $routine['cod_routine']; ?>">
                        <p class="card-text"><?php echo $routine['info']; ?></p>
                        <div class="row">
                            <div class="col-4">
                                <h5>Objetivo</h5>
                                <p class="card-text"><?php echo $routineObjective['type']; ?></p>
                            </div>
                            <div class="col-4">
                                <h5>Dificultad</h5>
                                <p class="card-text"><?php echo $routineDifficulty['type']; ?></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <?php
                if(isset($_SESSION['logged'])) {

                    $colors = Routine_m::getRoutineColors();
                    ?>

                    <div class="col-12 mx-auto">
                        <div class="card">
                            <h5 class="card-header">Añadir a tus rutinas personales</h5>
                            <div class="card-body">
                                <form action="exroutine" method="POST">
                                    <input name="routine" type="hidden" value="<?= $routine['cod_routine']; ?>">
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <input type="hidden" name="monday" value="0">
                                            <label class="mr-2 mt-4" for="monday">Lunes:</label>
                                            <input type="checkbox" name="monday" value="1">
                                        </div>
                                        <div class="col-3">
                                            <input type="hidden" name="tuesday" value="0">
                                            <label class="mr-2 mt-4" for="tuesday">Martes:</label>
                                            <input type="checkbox" name="tuesday" value="1">
                                        </div>
                                        <div class="col-3">
                                            <input type="hidden" name="wednesday" value="0">
                                            <label class="mr-2 mt-4" for="wednesday">Miércoles:</label>
                                            <input type="checkbox" name="wednesday" value="1">
                                        </div>
                                        <div class="col-3">
                                            <input type="hidden" name="thursday" value="0">
                                            <label class="mr-2 mt-4" for="thursday">Jueves:</label>
                                            <input type="checkbox" name="thursday" value="1">
                                        </div>
                                        <div class="col-3">
                                            <input type="hidden" name="friday" value="0">
                                            <label class="mr-2 mt-4" for="friday">Viernes:</label>
                                            <input type="checkbox" name="friday" value="1">
                                        </div>
                                        <div class="col-3">
                                            <input type="hidden" name="saturday" value="0">
                                            <label class="mr-2 mt-4" for="saturday">Sábado:</label>
                                            <input type="checkbox" name="saturday" value="1">
                                        </div>
                                        <div class="col-3">
                                            <input type="hidden" name="sunday" value="0">
                                            <label class="mr-2 mt-4" for="sunday">Domingo:</label>
                                            <input type="checkbox" name="sunday" value="1">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="color">Color identificativo:</label>
                                            <select class="form-control form-control-sm" name="color" id="color">
                                                <?php
                                                foreach($colors as $color) {
                                                    ?>
                                                        <option value="<?= $color['cod_color'] ?>"><?= $color['name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-3 mt-auto ml-auto">
                                            <input type="submit" class="btn btn-primary" value="Añadir">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else {
                    ?>
                    <div class="col-12 mx-auto">
                        <div class="card">
                            <h5 class="card-header">Añadir a tus rutinas personales</h5>
                            <div class="card-body">
                            <div class="row">
                                <p class="col-12">Debe <a href="login">iniciar sesión</a> para poder ver sus rutinas.</p>
                                <p class="col-12">Si aún no tienes cuenta, puedes <a href="register">registrarte</a> de manera gratuita.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div> 
    </div>
    <hr>
        <h4 class="text-center">Ejercicios</h4>
    <hr>
    <?php
    foreach($routineExercises as $routineExercise) {
        $exerciseInfo = Exercise_m::getExerciseById($routineExercise['exercise']);

        ?>
        <div class="row my-4">
            <div class="col-4 ml-auto">
                <div class="card">
                    <h5 class="card-header"><?php echo $exerciseInfo['name']; ?></h5>
                    <img src="<?= "actives/img/exercises/".$exerciseInfo['cod_exercise'].".jpg"; ?>" class="card-img-top p-2" alt="<?php echo $exerciseInfo['name']; ?>">
                    <div class="card-body">
                        <h5>Preparación y ejecución</h5>
                        <p class="card-text"><?php echo $exerciseInfo['execution']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-4 align-self-center mr-auto">
                <div class="card">
                    <div class="card-body">
                        <h5>Series x Repeticiones</h5>
                        <p class="card-text"><?= $routineExercise['sets']; ?> x <?= $routineExercise['repetitions']; ?></p>
                        <h5>Peso o duración</h5>
                        <p class="card-text"><?= $routineExercise['load']; ?> kg o min</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if(next($routineExercises)) {
            ?>
            <div class="row">
                <div class="col-1 mx-auto">
                    <img width="30" src="actives/img/downarrow.png" alt="Next">
                </div>
            </div>
            <?php
        }
    }
}
else {
    ?>
        <div class="row">
            <p class="col-12">La rutina que quiere buscar no existe.</p>
        </div>
    <?php
}
?>
</section>