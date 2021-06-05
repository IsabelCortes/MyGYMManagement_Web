<?php
global $bmiController;
$userLastBmiCalc = [];
$userBmiCalcs = [];

if(isset($_SESSION['logged'])) {

    if(isset($_POST['height']) && isset($_POST['weight'])) {
        $bmiCalc = new Bmi_m;
        $bmiCalc->weight = $_POST['weight'];
        $bmiCalc->height = $_POST['height'];
        $bmiCalc->user = $_SESSION['logged']['id_user'];

        $bmiController->makeBmiCalc($bmiCalc);
    }

    $userBmiCalcs = $bmiController->loadBmiCalcByUser($_SESSION['logged']['id_user']);
    $userLastBmiCalc = $bmiController->loadLastBmiCalcByUser($_SESSION['logged']['id_user']);

    $range = $bmiController->calcBmiRange($userLastBmiCalc['bmi']);
}
?>
<section>
    <div class="row my-3">
        <div class="col-10">
            <h3>IMC</h3>
        </div>
    </div>
    <?php
    if(isset($_SESSION['logged'])) {
        ?>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="card col-2">
                        <div class="card-body mx-auto">
                            <h4><?= $userLastBmiCalc['bmi']; ?></h4>
                            <p class="card-text"><?= $range ?></p>
                        </div>
                    </div>
                    <div class="col-2 ml-auto">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#bmiModal">Nuevo cálculo de IMC</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-9">
                <h4>Registro de cálculos de IMC de <?= $_SESSION['logged']['username'] ?></h4>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>IMC</th>
                            <th>Clasificación</th>
                            <th>Peso</th>
                            <th>Altura</th>
                            <th>Fecha de realización</th>
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
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
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
                        <tr>
                            <td>< 18.5</td>
                            <td>Delgadez</td>
                        </tr>
                        <tr>
                            <td>18.5 a 24.9</td>
                            <td>Saludable</td>
                        </tr>
                        <tr>
                            <td>25.0 a 29.9</td>
                            <td>Sobrepeso</td>
                        </tr>
                        <tr>
                            <td>30.0 a 34.9</td>
                            <td>Obesidad I</td>
                        </tr>
                        <tr>
                            <td>35.0 a 39.9</td>
                            <td>Obesidad II</td>
                        </tr>
                        <tr>
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
        <p>Debe iniciar sesión para usar esta función</p>
        <?php
    }
    ?>
    <div class="modal fade" id="bmiModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                                <input type="number" class="form-control form-control-sm" name="weight" id="weight" placeholder="kg" max="999" required autofocus>
                            </div>
                            <div class="col-6">
                                <label for="height">Altura:</label>
                                <input type="number" class="form-control form-control-sm" name="height" id="height" placeholder="cm" max="300" required>
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