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
}

if(isset($_POST['exercise'])) {
    $exercise = Exercise_m::getExerciseById($_POST['exercise']);
    ?>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <img src="<?= "actives/img/exercises/".$exercise['cod_exercise'].".jpg"; ?>" class="card-img-top" alt="<?php echo $exercise['name']; ?>">
                <div class="card-body">
                    <h4><?= $exercise['name']; ?></h4>
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
                    ?>
                    <div class="col-12">
                        <form action="exercise" method="POST">
                            <input name="exercise" type="hidden" value="<?= $exercise['cod_exercise']; ?>">
                            <h5>Añadir ejercicio a rutina</h5>
                            <div class="form-group row">
                                <div class="col-4">
                                    <label for="sets">Series:</label>
                                    <input type="number" class="form-control form-control-sm" name="sets" id="sets" placeholder="Número" max="99" required autofocus>
                                </div>
                                <div class="col-4">
                                    <label for="repetitions">Repeticiones:</label>
                                    <input type="number" class="form-control form-control-sm" name="repetitions" id="repetitions" placeholder="Número" max="999" required autofocus>
                                </div>
                                <div class="col-4">
                                    <label for="load">Peso o duración:</label>
                                    <input type="number" class="form-control form-control-sm" name="load" id="load" placeholder="kg o min" max="999" required autofocus>
                                </div>
                            <div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="routine">Rutina:</label>
                                    <select class="form-control form-control-sm" name="routine" id="routine">
                                        <?php
                                        $routines = Routine_m::getRoutinesByUser($_SESSION['logged']['id_user']);

                                        foreach($routines as $routine) {
                                            $routineInfo = Routine_m::getRoutineById($routine['routine']);
                                            ?>
                                            <option value="<?= $routineInfo['cod_routine'] ?>"><?= $routineInfo['name'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Añadir">
                        </form>
                    </div>
                    <?php
                }
                else {
                    ?>
                    <h5>Debe iniciar sesión para añadir ejercicios a rutinas</h5>
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
        <h2>El ejercicio que quiere buscar no existe</h2>
    <?php
}
?>
</section>