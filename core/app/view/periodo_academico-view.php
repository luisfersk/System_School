<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
    $academico = PeriodoAcademicoData::getAll();
?>
    <section class="content-header">
        <h1>
            Periodos Academicos
            <small>Todos los periodos</small>
        </h1>
        <br>
        <a href="./?view=periodo_academico&opt=new" class="btn btn-primary">Nuevo Registro</a>
    </section>
    <br>
    <section class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <?php if (count($academico) > 0) : ?>
                            <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Periodo academico</th>
                                        <th scope="col">Fecha de inicio</th>
                                        <th scope="col">Fecha finalización</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($academico as $acad) : ?>
                                        <tr>
                                            <td><?= $acad->nombre; ?></td>
                                            <td><?= $acad->fecha_inicio; ?></td>
                                            <td><?= $acad->fecha_fin; ?></td>
                                            <td><?= $acad->estado; ?></td>
                                            <td style="width: 100px;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acciones <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="./?view=periodo_academico&opt=edit&id=<?= $acad->id; ?>"><i class="fas fa-pen"></i> Editar</a></li>
                                                        <!-- <li><a href="./?action=periodo_academico&opt=del&id=<?= $acad->id; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li> -->
                                                    </ul>
                                                </div>
                                                </th>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div class="box-body">
                                <p class="alert alert-warning">Aun no hay profesores registrados!</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
    <section class="content-header">
        <h1>
            Registrar periodos Academicos
            <small>Digite la información</small>
        </h1>
        <br>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <form id="form">
                            <div class="form-row clearfix">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Periodo academico:</label>
                                    <input type="text" name="nombre" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Estado:</label>
                                    <select id="inputState" name="estado" class="form-control">
                                        <option selected>Abierto</option>
                                        <option>Cerrado</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fecha inicio periodo:</label>
                                    <input type="date" name="fechainicio" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fecha fin periodo:</label>
                                    <input type="date" name="fechafin" class="form-control">
                                </div>
                            </div>
                            <div class=" col-lg-10">
                                <button type="submit" class="btn btn-success">Agregar</button>
                                <a href="./?view=periodo_academico&opt=all" class="btn btn-warning">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="result"></div>
    </section>
    <script>
        $("#form").submit(function(e) {
            e.preventDefault();
            var d = $("#form").serialize();
            $.post(
                "./?action=periodo_academico&opt=add",
                d,
                function(result) {
                    $("#result").html(result);
                });
        });
    </script>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
    $academico = PeriodoAcademicoData::getById($_GET["id"]);
?>
    <section class="content-header">
        <h1>
            Editar periodos Academicos
            <small>Digite la información</small>
        </h1>
        <br>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <form method="POST" action="./?action=periodo_academico&opt=upd">
                            <div class="form-row clearfix">
                                <div class="form-group col-md-6">
                                    <label>Periodo academico:</label>
                                    <input type="text" name="nombre" class="form-control" value="<?= $academico->nombre; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Estado:</label>
                                    <select id="inputState" name="estado" class="form-control">
                                        <option <?php if ($academico->estado == 'Abierto') : ?>selected<?php endif; ?>>Abierto</option>
                                        <option <?php if ($academico->estado == 'Cerrado') : ?>selected<?php endif; ?>>Cerrado</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fecha inicio periodo:</label>
                                    <input type="date" name="fechainicio" class="form-control" value="<?= $academico->fecha_inicio; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fecha fin periodo:</label>
                                    <input type="date" name="fechafin" class="form-control" value="<?= $academico->fecha_fin; ?>">
                                </div>
                            </div>
                            <div class=" col-lg-10">
                                <input type="hidden" name="id" value="<?= $academico->id; ?>">
                                <button type="submit" class="btn btn-success">Actualizar</button>
                                <button type="date" onclick="location='./?view=facultad&opt=all'" class="btn btn-warning">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>