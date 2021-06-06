<section>
<?php

if(isset($_POST['routine']) && isset($_POST['userRoutine'])) {
    $routine = Routine_m::getRoutineById($_POST['routine']);
    $routineObjective = Routine_m::getRoutineObjectiveById($routine['objective']);
    $routineDifficulty = Routine_m::getRoutineDifficultyById($routine['difficulty']);

    $routineExercises = Exercise_m::getExercisesByRoutine($routine['cod_routine']);
    $userRoutineInfo = Routine_m::getUserRoutineByUserRoutineId($_POST['userRoutine']);
    $userRoutineColor = Routine_m::getRoutineColorById($userRoutineInfo['color']);

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
                        <div class="row">
                            <div class="10">
                                <h3 class="mt-3 ml-3">
                                    <?php
                                    if($userRoutineInfo['monday']) {
                                        ?>
                                        <span style="background-color:<?= $userRoutineColor['hex_code'] ?>" class="badge badge-pill text-dark">L</span>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <span class="badge badge-pill badge-light">L</span>
                                        <?php
                                    }

                                    if($userRoutineInfo['tuesday']) {
                                        ?>
                                        <span style="background-color:<?= $userRoutineColor['hex_code'] ?>" class="badge badge-pill text-dark">M</span>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <span class="badge badge-pill badge-light">M</span>
                                        <?php
                                    }

                                    if($userRoutineInfo['wednesday']) {
                                        ?>
                                        <span style="background-color:<?= $userRoutineColor['hex_code'] ?>" class="badge badge-pill text-dark">X</span>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <span class="badge badge-pill badge-light">X</span>
                                        <?php
                                    }

                                    if($userRoutineInfo['thursday']) {
                                        ?>
                                        <span style="background-color:<?= $userRoutineColor['hex_code'] ?>" class="badge badge-pill text-dark">J</span>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <span class="badge badge-pill badge-light">J</span>
                                        <?php
                                    }

                                    if($userRoutineInfo['friday']) {
                                        ?>
                                        <span style="background-color:<?= $userRoutineColor['hex_code'] ?>" class="badge badge-pill text-dark">V</span>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <span class="badge badge-pill badge-light">V</span>
                                        <?php
                                    }

                                    if($userRoutineInfo['saturday']) {
                                        ?>
                                        <span style="background-color:<?= $userRoutineColor['hex_code'] ?>" class="badge badge-pill text-dark">S</span>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <span class="badge badge-pill badge-light">S</span>
                                        <?php
                                    }

                                    if($userRoutineInfo['sunday']) {
                                        ?>
                                        <span style="background-color:<?= $userRoutineColor['hex_code'] ?>" class="badge badge-pill text-dark">D</span>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <span class="badge badge-pill badge-light">D</span>
                                        <?php
                                    }
                                    ?>
                                </h3>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
        <?php
        if(!$routineExercises) {
            ?>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <p>Esta rutina no tiene ningún ejercicio añadido, puede ver y añadir ejercicios desde la pestaña <a href="exercises">Ejercicios</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        else {
            ?>
            </div>
            <hr>
                <h4 class="text-center">Ejercicios</h4>
            <hr>
            <?php
        }
        
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