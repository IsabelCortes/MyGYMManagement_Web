<?php
global $exercisesController;
$exercises = [];

if(isset($_POST['muscle']) && isset($_POST['name'])){
    if($_POST['muscle'] == "all"){
        $exercises = $exercisesController->loadAllExercisesByName($_POST['name']);
    }
    else{
        $exercises = $exercisesController->loadExercisesByMuscle($_POST['muscle'], $_POST['name']);
    }
}
else {
    $exercises = $exercisesController->loadAllExercises();
}
?>
<section>
    <form method="POST" action="exercises">
        <div class="col-8">
            <div class="form-group row">
                <div class="col-4">
                    <select class="form-control form-control-sm" name="muscle" id="muscle">
                        <option value="all">Todos los músculos</option>
                        <?php
                        $muscles = Exercise_m::getMuscles();

                        foreach($muscles as $muscle) {
                            if($_POST['muscle'] == $muscle['cod_muscle']){
                                ?>
                                <option value="<?= $muscle['cod_muscle'] ?>" selected="true"><?= $muscle['name'] ?></option>
                                <?php
                                }
                            else {
                                ?>
                                <option value="<?= $muscle['cod_muscle'] ?>"><?= $muscle['name'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-4">
                    <?php
                    if(isset($_POST['name'])) {
                        ?>
                        <input type="text" value="<?= $_POST['name'] ?>" class="form-control form-control-sm" name="name" id="name" placeholder="Buscar" maxlength="100">  
                        <?php    
                    }
                    else {
                        ?>
                        <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Buscar" maxlength="100">
                        <?php
                    }
                    ?>
                         
                </div>
                <div class="col-4">
                    <input type="submit" value="Realizar búsqueda" class="btn btn-primary btn-sm">
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <?php 
            foreach($exercises as $exercise) {
                ?>
                <div class="col-4 my-3">
                    <div class="card">
                        <form method="POST" action="exercise">
                            <h5 class="card-header"><?php echo $exercise['name']; ?></h5>
                            <input name="exercise" type="hidden" value="<?= $exercise['cod_exercise']; ?>">
                            <img src="<?= "actives/img/exercises/".$exercise['cod_exercise'].".jpg"; ?>" class="card-img-top p-2" alt="<?php echo $exercise['name']; ?>">
                            <div class="card-body">
                                <p class="card-text"><?php echo $exercise['info']; ?></p>
                                <input type="submit" value="Ver detalles" class="btn btn-primary btn-sm">
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</section>