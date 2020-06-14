<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $academico = A_academicoData::getAll();
?>
  <section class="content-header">
    <h1>
      Periodos Academicos
      <small>A&ntildeos</small>
    </h1>
    <br>
    <a href="./?view=a_academico&opt=new" class="btn btn-primary">Nuevo Registro</a>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <?php if (count($academico) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Periodo academico</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Operaciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($academico as $acad) : ?>
                    <tr>
                      <td><?= $acad->id_a; ?></td>
                      <td><?= $acad->nombre; ?></td>
                      <td><?= $acad->estado; ?></td>
                      <td style="width: 130px;">
                        <a href="./?view=a_academico&opt=edit&id=<?= $acad->id_a; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                        <a href="./?action=a_academico&opt=del&id=<?= $acad->id_a; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Eliminar</a>
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
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Establecer periodo academico</h3>
        <br>
        <form method="POST" action="./?action=a_academico&opt=add">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Periodo academico:</label>
              <input type="tex" name="nombre" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
            </div>
            <div class="form-group col-md-6">
              <label for="inputState">Estado:</label>
              <select id="inputState" name="estado" class="form-control">
                <option selected>Abierto</option>
                <option>Cerrado</option>
              </select>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Fecha inicio periodo:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="fechainicio" class="form-control">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>Fecha fin periodo:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="fechafin" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Fecha inicio matricula:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="iniciomatricula" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha fin matricula:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="finmatricula" class="form-control" id="inputEmail4">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha inicio primer parcial:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="inicioprimerparcial" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha fin primer parcial:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="finprimerparcial" class="form-control" id="inputEmail4">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha inicio segundo parcial:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="iniciosegundoparcial" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha fin segundo parcial:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="finsegundoparcial" class="form-control" id="inputEmail4">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha inicio parcial final:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="inicioparcialfinal" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha fin parcial final:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="finparcialfinal" class="form-control" id="inputEmail4">
                </div>
              </div>
            </div>
            <div class=" col-lg-10">
              <button type="submit" class="btn btn-success">Agregar</button>
              <a href="./?view=a_academico&opt=all" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
        
      </div>
    </div>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $academico = A_academicoData::getById($_GET["id"]);
?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Establecer periodo academico</h3>
        <br>
        <form method="POST" action="./?action=a_academico&opt=upd">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Periodo academico:</label>
              <input type="tex" name="nombre" class="form-control" id="inputEmail4" placeholder="ciclo escolar" value="<?= $academico->nombre; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="inputState">Estado:</label>
              <select id="inputState" name="estado" class="form-control">
                <option selected>Abierto</option>
                <option>Cerrado</option>
              </select>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha inicio periodo:</label>
                <input type="date" name="fechainicio" class="form-control" value="<?= $academico->fechainicio; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha fin periodo:</label>
                <input type="date" name="fechafin" class="form-control" value="<?= $academico->fechafin; ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha inicio matricula:</label>
                <input type="date" name="iniciomatricula" class="form-control" value="<?= $academico->iniciomatricula; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha fin matricula:</label>
                <input type="date" name="finmatricula" class="form-control" value="<?= $academico->finmatricula; ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha inicio primer parcial:</label>
                <input type="date" name="inicioprimerparcial" class="form-control" value="<?= $academico->inicioprimerparcial; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha fin primer parcial:</label>
                <input type="date" name="finprimerparcial" class="form-control" value="<?= $academico->finprimerparcial; ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha inicio segundo parcial:</label>
                <input type="date" name="iniciosegundoparcial" class="form-control" value="<?= $academico->iniciosegundoparcial; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha fin segundo parcial:</label>
                <input type="date" name="finsegundoparcial" class="form-control" value="<?= $academico->finsegundoparcial; ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha inicio parcial final:</label>
                <input type="date" name="inicioparcialfinal" class="form-control" value="<?= $academico->inicioparcialfinal; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha fin parcial final:</label>
                <input type="date" name="finparcialfinal" class="form-control" value="<?= $academico->finparcialfinal; ?>">
              </div>
            </div>
            <div class=" col-lg-10">
              <button type="submit" class="btn btn-success">Agregar</button>
              <button type="date" onclick="location='./?view=a_academico&opt=all'" class="btn btn-warning">Cancelar</button>
              <input type="hidden" name="id_a" value="<?= $academico->id_a; ?>">
            </div>
        </form>
      </div>
    </div>
  </section>
  <br>
<?php endif; ?>