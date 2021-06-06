<?php
global $bmiController;
$userLastBmiCalc = [];
$userBmiCalcs = [];

if(isset($_SESSION['logged'])) {

    if(isset($_POST['deleteBmi'])) {
        Bmi_m::deleteBmiCalc($_POST['deleteBmi']);
    }

    if(isset($_POST['height']) && isset($_POST['weight'])) {
        $bmiCalc = new Bmi_m;
        $bmiCalc->weight = $_POST['weight'];
        $bmiCalc->height = $_POST['height'];
        $bmiCalc->user = $_SESSION['logged']['id_user'];

        $bmiController->makeBmiCalc($bmiCalc);
    }

    $userBmiCalcs = $bmiController->loadBmiCalcByUser($_SESSION['logged']['id_user']);
    $userLastBmiCalc = $bmiController->loadLastBmiCalcByUser($_SESSION['logged']['id_user']);

    if(!$userLastBmiCalc) {
        $rangeLastBmi = "None";
    }
    else {
        $rangeLastBmi = $bmiController->calcBmiRange($userLastBmiCalc['bmi']);
    }
    
}
?>
<section>
    <?php
    if(isset($_SESSION['logged'])) {
        ?>
        <div class="row">
            <?php
            if(!$userLastBmiCalc) {
                ?>
                <div class="card col-6">
                    <div class="card-body mx-auto">
                        <h4 class="text-center">No ha registrado ningún IMC</h4>
                        <p class="card-text">Puede realizar un cálculo en el botón Nuevo cálculo de IMC</p>
                    </div>
                </div>
                <?php 
            }
            else {
            ?>
            <div class="card col-2">
                <div class="card-body mx-auto">
                    <h4 class="text-center"><?= $userLastBmiCalc['bmi']; ?></h4>
                    <p class="card-text"><?= $rangeLastBmi ?></p>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="col-2 ml-auto">
                <button class="btn btn-primary" data-toggle="modal" data-target="#bmiModal">Nuevo cálculo de IMC</button>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-9">
                <?php
                if($userBmiCalcs) {
                    ?>
                    <h4>Registro de cálculos de IMC de <?= $_SESSION['logged']['username'] ?></h4>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>IMC</th>
                                <th>Clasificación</th>
                                <th>Peso</th>
                                <th>Altura</th>
                                <th>Fecha de realización</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($userBmiCalcs as $userBmiCalc) {

                                $range = $bmiController->calcBmiRange($userBmiCalc['bmi']);

                                ?>
                                <tr>
                                    <td><?= $userBmiCalc['bmi'] ?></td>
                                    <td><?= $range ?></td>
                                    <td><?= $userBmiCalc['weight'] ?> kg</td>
                                    <td><?= $userBmiCalc['height'] ?> cm</td>
                                    <td><?= $userBmiCalc['date'] ?></td>
                                    <td>
                                        <form method="POST" action="bmi">
                                            <input name="deleteBmi" type="hidden" value="<?= $userBmiCalc['cod_bmi']; ?>">
                                            <input type="image" height="30" src="actives/img/delete.png" title="Eliminar" value="Eliminar">
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
            <div class="col-3">
                <h4>Tabla de referencia</h4>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>IMC</th>
                            <th>Clasificación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="<?= $rangeLastBmi=="Delgadez" ? "bg-info" : "" ?>">
                            <td>< 18.5</td>
                            <td>Delgadez</td>
                        </tr>
                        <tr class="<?= $rangeLastBmi=="Saludable" ? "bg-success" : "" ?>">
                            <td>18.5 a 24.9</td>
                            <td>Saludable</td>
                        </tr>
                        <tr style="<?= $rangeLastBmi=="Sobrepeso" ? "background-color:#ffff00;" : "" ?>">
                            <td>25.0 a 29.9</td>
                            <td>Sobrepeso</td>
                        </tr>
                        <tr class="<?= $rangeLastBmi=="Obesidad I" ? "bg-warning" : "" ?>">
                            <td>30.0 a 34.9</td>
                            <td>Obesidad I</td>
                        </tr>
                        <tr class="<?= $rangeLastBmi=="Obesidad II" ? "bg-danger" : "" ?>">
                            <td>35.0 a 39.9</td>
                            <td>Obesidad II</td>
                        </tr>
                        <tr style="<?= $rangeLastBmi=="Obesidad III" ? "background-color:#6e132f;" : "" ?>">
                            <td>> 40.0</td>
                            <td>Obesidad III</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
    else {
        ?>
        <div class="row">
            <p class="col-12">Debe <a href="login">iniciar sesión</a> para poder ver sus rutinas.</p>
            <p class="col-12">Si aún no tienes cuenta, puedes <a href="register">registrarte</a> de manera gratuita.</p>
        </div>
        <?php
    }
    ?>
    <div class="modal fade" id="bmiModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="bmi" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Nuevo cálculo de IMC</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="weight">Peso:</label>
                                <input type="number" class="form-control form-control-sm" name="weight" id="weight" placeholder="kg" min="0" max="999" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="height">Altura:</label>
                                <input type="number" class="form-control form-control-sm" name="height" id="height" placeholder="cm" min="0" max="300" required>
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