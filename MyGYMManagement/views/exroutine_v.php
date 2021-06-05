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
}

if(isset($_POST['routine']) && isset($_SESSION['logged'])) {
    $routine = Routine_m::getRoutineById($_POST['routine']);
    $routineObjective = Routine_m::getRoutineObjectiveById($routine['objective']);
    $routineDifficulty = Routine_m::getRoutineDifficultyById($routine['difficulty']);

    ?>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4><?php echo $routine['name']; ?></h4>
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
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <?php
                if(isset($_SESSION['logged'])) {
                    ?>
                    <div class="col-12">
                        <form action="exroutine" method="POST">
                            <input name="routine" type="hidden" value="<?= $routine['cod_routine']; ?>">
                            <h5>Añadir a tus rutinas personales</h5>
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
                            </div>
                            <div class="form-group row">
                                <div class="col-4">
                                    <input type="hidden" name="friday" value="0">
                                    <label class="mr-2 mt-4" for="friday">Viernes:</label>
                                    <input type="checkbox" name="friday" value="1">
                                </div>
                                <div class="col-4">
                                    <input type="hidden" name="saturday" value="0">
                                    <label class="mr-2 mt-4" for="saturday">Sábado:</label>
                                    <input type="checkbox" name="saturday" value="1">
                                </div>
                                <div class="col-4">
                                    <input type="hidden" name="sunday" value="0">
                                    <label class="mr-2 mt-4" for="sunday">Domingo:</label>
                                    <input type="checkbox" name="sunday" value="1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="color">Color:</label>
                                    <select class="form-control form-control-sm" name="color" id="color">
                                        <option value="red">Rojo</option>
                                        <option value="green">Verde</option>
                                        <option value="blue">Azul</option>
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
        <h2>la rutina que quiere buscar no existe o no ha iniciado sesión</h2>
    <?php
}
?>
</section>