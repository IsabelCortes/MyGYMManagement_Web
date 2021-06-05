<?php
global $routinesController;
$routines = [];

if(isset($_SESSION['logged'])) {

    if(isset($_POST['name'])) {
        $routine = new Routine_m;
        $routine->name = $_POST['name'];
        $routine->info = $_POST['info'];
        $routine->objective = $_POST['objective'];
        $routine->difficulty = $_POST['difficulty'];
        $routine->user_created = true;
        Routine_m::insertRoutine($routine);       

        $routine->user = $_SESSION['logged']['id_user'];
        $routine->routine = Routine_m::getLastRoutine()['cod_routine'];
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

    $routineObjectives = Routine_m::getRoutineObjectives();
    $routineDifficulties = Routine_m::getRoutineDifficulties();

    if(isset($_POST['objectiveSearch'])) {
        if(isset($_POST['difficultySearch'])) {
            if($_POST['objectiveSearch'] == "all" && $_POST['difficultySearch'] == "all") {
                $routines = $routinesController->loadRoutinesByUser($_SESSION['logged']['id_user']);
            }
            else {
                if($_POST['objectiveSearch'] == "all") {
                    $routines = $routinesController->loadRoutinesByUserAndDifficulty($_SESSION['logged']['id_user'], $_POST['difficultySearch']);
                }
                else {
                    if($_POST['difficultySearch'] == "all") {
                        $routines = $routinesController->loadRoutinesByUserAndObjective($_SESSION['logged']['id_user'], $_POST['objectiveSearch']);
                    }
                    else {
                        $routines = $routinesController->loadRoutinesByUserObjectiveAndDifficulty($_SESSION['logged']['id_user'], $_POST['objectiveSearch'], $_POST['difficultySearch']);
                    }
                }
            }
        }
        else {
            if($_POST['objectiveSearch'] == "all") {
                $routines = $routinesController->loadRoutinesByUser($_SESSION['logged']['id_user']);
            }
            else {
                $routines = $routinesController->loadRoutinesByUserAndObjective($_SESSION['logged']['id_user'], $_POST['objectiveSearch']);
            }
        }
    }
    else {
        if(isset($_POST['difficultySearch'])) {
            if($_POST['difficultySearch'] == "all") {
                $routines = $routinesController->loadRoutinesByUser($_SESSION['logged']['id_user']);
            }
            else {
                $routines = $routinesController->loadRoutinesByUserAndDifficulty($_SESSION['logged']['id_user'], $_POST['difficultySearch']);
            }
        }
        else {
            $routines = $routinesController->loadRoutinesByUser($_SESSION['logged']['id_user']);
        }
    }
}
?>
<section>
    <div class="row my-3">
        <div class="col-12">
            <h3>Mis rutinas</h3>
        </div>
        <div class="col-12">
            <div class="row">
                <aside class="col-3">
                    <div class="list-group">
                        <form action="routines" method="POST">
                            <?php
                                if(isset($_POST['difficultySearch'])) {
                                    ?>
                                    <input type="hidden" name="difficultySearch" value="<?= $_POST['difficultySearch'] ?>">
                                    <?php
                                }
                            ?>
                            <input type="hidden" name="objectiveSearch" value="all">              
                            <input type="submit" class="list-group-item list-group-item-action 
                            <?php
                            if(!isset($_POST['objectiveSearch']) || $_POST['objectiveSearch']== "all") {
                                echo 'active';
                            }
                           ?> " value="Cualquier objetivo">
                        </form>
                    <?php
                    foreach ($routineObjectives as $routineObjective) { ?>
                        <form action="routines" method="POST">
                            <?php
                                if(isset($_POST['difficultySearch'])) {
                                    ?>
                                    <input type="hidden" name="difficultySearch" value="<?= $_POST['difficultySearch'] ?>">
                                    <?php
                                }
                            ?>
                            <input type="hidden" name="objectiveSearch" value="<?= $routineObjective['cod_objective'] ?>">              
                            <input type="submit" class="list-group-item list-group-item-action <?= $routineObjective['cod_objective']==$_POST['objectiveSearch'] ? 'active' : '' ?>" value="<?= $routineObjective['type'] ?>">
                        </form>
                    <?php
                    } 
                    ?>
                    </div>
                </aside>
                <aside class="col-9">
                    <div class="row">
                        <div class="col-10">
                            <form method="POST" action="routines">
                                <?php
                                    if(isset($_POST['objectiveSearch'])) {
                                        ?>
                                        <input type="hidden" name="objectiveSearch" value="<?= $_POST['objectiveSearch'] ?>">
                                        <?php
                                    }
                                ?>
                                <div class="col-10">
                                    <div class="form-group row">
                                        <label class="col-6" for="difficulty">Introduzca la dificultad de la rutina:</label>
                                        <div class="col-3">
                                            <select class="form-control form-control-sm" name="difficultySearch" id="difficultySearch">
                                                <option value="all">Todas</option>
                                                <?php
                                                foreach($routineDifficulties as $routineDifficulty) {
                                                    if($_POST['difficultySearch'] == $routineDifficulty['cod_difficulty']){
                                                        ?>
                                                        <option value="<?= $routineDifficulty['cod_difficulty'] ?>" selected="true"><?= $routineDifficulty['type'] ?></option>
                                                        <?php
                                                        }
                                                    else {
                                                        ?>
                                                        <option value="<?= $routineDifficulty['cod_difficulty'] ?>"><?= $routineDifficulty['type'] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" value="Filtrar" class="btn btn-primary btn-sm">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#routineModal">Nueva rutina</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                        <?php
                        foreach($routines as $routine) {
                            $routineObjective = Routine_m::getRoutineObjectiveById($routine['objective']);
                            $routineDifficulty = Routine_m::getRoutineDifficultyById($routine['difficulty']);
                            ?>
                            <div class="col-12">
                                <div class="card my-2">
                                    <form method="POST" action="routine">
                                        <input name="routine" type="hidden" value="<?= $routine['cod_routine']; ?>">
                                        <div class="card-body">
                                            <h4><?php echo $routine['name']; ?></h4>
                                            <p class="card-text"><?php echo $routine['info']; ?></p>
                                            <div class="row">
                                                <div class="col-2">
                                                    <h5>Objetivo</h5>
                                                    <p class="card-text"><?php echo $routineObjective['type']; ?></p>
                                                </div>
                                                <div class="col-2">
                                                    <h5>Dificultad</h5>
                                                    <p class="card-text"><?php echo $routineDifficulty['type']; ?></p>
                                                </div>
                                                <div class="col-2">
                                                    <input type="submit" value="Ver" class="btn btn-primary btn-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>    
    </div>
    <div class="modal fade" id="routineModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="routines" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Nueva rutina</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-8">
                                    <label for="name">Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Nombre de la rutina" maxlength="100" required>
                                </div>
                                <div class="col-4">
                                    <label for="objective">Objetivo:</label>
                                    <select class="form-control form-control-sm" name="objective" id="objective">
                                        <?php
                                        $routineObjectives = Routine_m::getRoutineObjectives();

                                        foreach($routineObjectives as $routineObjective) {
                                            ?>
                                            <option value="<?= $routineObjective['cod_objective'] ?>"><?= $routineObjective['type'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="info">Información:</label>
                                    <input type="text" class="form-control form-control-sm" name="info" id="info" placeholder="Información de la rutina" maxlength="255" required>
                                </div>
                            </div>
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
                                    <label for="difficulty">Dificultad:</label>
                                    <select class="form-control form-control-sm" name="difficulty" id="difficulty">
                                        <?php
                                        $routineDifficulties = Routine_m::getRoutineDifficulties();

                                        foreach($routineDifficulties as $routineDifficultie) {
                                            ?>
                                            <option value="<?= $routineDifficultie['cod_difficulty'] ?>"><?= $routineDifficultie['type'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="color">Color:</label>
                                    <select class="form-control form-control-sm" name="color" id="color">
                                        <option value="red">Rojo</option>
                                        <option value="green">Verde</option>
                                        <option value="blue">Azul</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-primary" value="Añadir">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>