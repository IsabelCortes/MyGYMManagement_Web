<section>
<?php

if(isset($_POST['routine']) && isset($_POST['sets']) && isset($_POST['repetitions']) && isset($_POST['load'])) {
    $routineExercise = new Exercise_m;
    $routineExercise->exercise = $_POST['exercise'];
    $routineExercise->routine = $_POST['routine'];
    $routineExercise->load = $_POST['load'];
    $routineExercise->repetitions = $_POST['repetitions'];
    $routineExercise->sets = $_POST['sets'];

    Exercise_m::insertRoutineExercise($routineExercise);

    header("location:routines");
}

if(isset($_POST['exercise'])) {
    $exercise = Exercise_m::getExerciseById($_POST['exercise']);
    ?>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header"><?= $exercise['name']; ?></h5>
                <img src="<?= "actives/img/exercises/".$exercise['cod_exercise'].".jpg"; ?>" class="card-img-top p-5" alt="<?php echo $exercise['name']; ?>">
                <div class="card-body">
                    <p class="card-text"><?php echo $exercise['info']; ?></p>
                    <h5>Preparación y ejecución</h5>
                    <p class="card-text"><?php echo $exercise['execution']; ?></p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $exercise['link'] ?>" title="<?= $exercise['name'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <?php
                if(isset($_SESSION['logged'])) {
                    $routines = Routine_m::getRoutinesByUser($_SESSION['logged']['id_user']);

                    if(!$routines) {
                        ?>
                        <div class="col-12 mt-4 mx-auto">
                            <div class="card">
                                <h5 class="card-header">Añadir ejercicio a rutina</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <p class="col-12">No puede añadir ejercicios si no tiene rutinas creadas.</p>
                                        <p class="col-12">Puede crear una rutina desde cero en <a href="routines">Mis rutinas</a> o añadir y personalizar una desde <a href="explore">Explorar rutinas</a>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    else {
                    ?>
                    <div class="col-12 mt-4 mx-auto">
                        <div class="card">
                            <h5 class="card-header">Añadir ejercicio a rutina</h5>
                            <div class="card-body">
                                <form action="exercise" method="POST">
                                    <input name="exercise" type="hidden" value="<?= $exercise['cod_exercise']; ?>">
                                    <div class="form-group row">
                                        <div class="col-4">
                                            <label for="sets">Series:</label>
                                            <input type="number" class="form-control form-control-sm" name="sets" id="sets" placeholder="Número" min="0" max="99" required autofocus>
                                        </div>
                                        <div class="col-4">
                                            <label for="repetitions">Repeticiones:</label>
                                            <input type="number" class="form-control form-control-sm" name="repetitions" id="repetitions" placeholder="Número" min="0" max="999" required autofocus>
                                        </div>
                                        <div class="col-4">
                                            <label for="load">Peso o duración:</label>
                                            <input type="number" class="form-control form-control-sm" name="load" id="load" placeholder="kg o min" min="0" max="999" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="routine">Rutina:</label>
                                            <select class="form-control form-control-sm" name="routine" id="routine">
                                                <?php

                                                foreach($routines as $routine) {
                                                    $routineInfo = Routine_m::getRoutineById($routine['routine']);
                                                    ?>
                                                    <option value="<?= $routineInfo['cod_routine'] ?>"><?= $routineInfo['name'] ?></option>
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
                }
                else {
                    ?>
                    <div class="col-12 mt-4 mx-auto">
                        <div class="card">
                            <h5 class="card-header">Añadir ejercicio a rutina</h5>
                            <div class="card-body">
                                <div class="row">
                                    <p class="col-12">Debe <a href="login">iniciar sesión</a> para poder añadir ejercicios a rutinas.</p>
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
    <?php
}
else {
    ?>
        <div class="row">
            <p class="col-12">El ejercicio que quiere buscar no existe.</p>
        </div>
    <?php
}
?>
</section>