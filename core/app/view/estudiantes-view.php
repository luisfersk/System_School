<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $estu = EstudiantesData::getAll();
?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <h1>Estudiantes</h1>
        <a href="./?view=estudiantes&opt=new" class="btn btn-primary">Agregar nuevo estudiante</a>
        <br>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (count($estu) > 0) : ?>
            <table class="table table-bordered table-hover" id="table">
              <thead>
                <tr>
                  <th scope="col">DNI</th>
                  <th scope="col">Nombres</th>
                  <th scope="col">Datos</th>
                  <th scope="col">Fecha/Registro</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Operaciones</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($estu as $es) : ?>
                  <tr>
                    <td><?= $es->dni; ?></td>
                    <td><?= $es->nombre . "<br> " . $es->primer_apellido . " " . $es->segundo_apellido; ?></td>
                    <td>fecha Nacimiento: <?= $es->fecha_nac; ?>
                      <br>Genero: <?= $es->genero; ?>
                      <br>Email: <?= $es->email; ?>
                    </td>
                    <td><?= $es->fecha_reg; ?></td>
                    <td><?= $es->estado; ?></td>
                    <td style="width: 130px;">
                      <div class="btn-group">
                        <a class="btn btn-warning " href="#"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Acciones</a>
                        <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="./?view=estudiantes&opt=edit&id=<?= $es->id_estudiante; ?>"><i class="fa fa-pencil fa-fw"></i> Editar</a></li>
                          <li><a href="./?action=estudiantes&opt=del&id=<?= $es->id_estudiante; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else : ?>
            <div class="box-body">
              <p class="alert alert-warning">Aun no hay estudiantes registrados!</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
  <section class="container">
    <h3>Agregar Estudiante</h3>
    <br>
    <form method="POST" action="./?action=estudiantes&opt=add">
      <?php
      $estado = EstadoData::getAll();
      $genero = GeneroData::getAll();
      $programa = ProgramaData::getAll();
      ?>
      <div class="form-row">
        <div class="form-group col-md-3">
          <label>DNI:</label>
          <input type="tex" name="dni" class="form-control" id="inputEmail4" placeholder="Numero de DNI">
        </div>
        <div class="form-group col-md-3">
          <label>Programa:</label>
          <select name="programa" class="form-control">
            <option selected>Seleccione....</option>
            <?php foreach ($programa as $prog) : ?>
              <option value="<?php echo ($prog->nombre); ?>"><?php echo $prog->nombre ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>Primer apellido:</label>
          <input type="text" name="primer_apellido" class="form-control" placeholder="Apellido paterno">
        </div>
        <div class="form-group col-md-3">
          <label>Apellido Materno:</label>
          <input type="text" name="segundo_apellido" class="form-control" placeholder="Apellido materno">
        </div>
        <div class="form-group col-md-3">
          <label for="inputEmail4">Nombres:</label>
          <input type="text" name="nombre" class="form-control" placeholder="Nombres">
        </div>
        <div class="form-group col-md-3">
          <label>Fecha de Nacimiento:</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="date" name="fecha_nac" class="form-control">
          </div>
        </div>
        <div class="form-group col-md-3">
          <label>Genero:</label>
          <select name="genero" class="form-control">
            <option selected>Seleccione....</option>
            <option>Masculino</option>
            <option>Femenino</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>Estado:</label>
          <select name="estado" class="form-control">
            <option selected>Seleccione....</option>
            <?php foreach ($estado as $esta) : ?>
              <option value="<?php echo ($esta->nombre); ?>"><?php echo $esta->nombre ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Email:</label>
          <input type="text" name="email" class="form-control" placeholder="Email">
        </div>
      </div>
      <div class=" col-lg-10">
        <button type="submit" class="btn btn-success">Agregar</button>
        <button type="button" onclick="location='./?view=estudiantes&opt=all'" class="btn btn-warning">Cancelar</button>
      </div>
    </form>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $estu = EstudiantesData::getById($_GET["id"]);
  $estado = EstadoData::getAll();
  $genero = GeneroData::getAll();
  $programa = ProgramaData::getAll();
?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>editar Alumnos</h1>
        <br>
        <form method="POST" action="./?action=estudiantes&opt=upd">
          <div class="form-group">
            <div class="form-group col-md-3">
              <label>DNI:</label>
              <input type="tex" value="<?= $estu->dni; ?>" name="dni" class="form-control" placeholder="Numero de DNI">
            </div>
            <div class="form-group col-md-3">
              <label>Programa:</label>
              <select name="programa" class="form-control">
                <?php foreach ($programa as $prog) :
                  if ($estu->programa == $prog->nombre) : ?>
                    <option selected value="<?= $prog->nombre; ?>"><?= $prog->nombre; ?></option>
                  <?php else : ?>
                    <option value="<?= $prog->nombre; ?>"><?= $prog->nombre; ?></option>
                <?php endif;
                endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Nombres:</label>
              <input type="text" value="<?= $estu->nombre; ?>" name="nombre" class="form-control" placeholder="Nombres">
            </div>
            <div class="form-group col-md-3">
              <label>Primer apellido:</label>
              <input type="text" value="<?= $estu->primer_apellido; ?>" name="primer_apellido" class="form-control" placeholder="Apellido paterno">
            </div>
            <div class="form-group col-md-3">
              <label>Segundo apellido:</label>
              <input type="text" value="<?= $estu->segundo_apellido; ?>" name="segundo_apellido" class="form-control" placeholder="Apellido materno">
            </div>
            <div class="form-group col-md-3">
              <label>Genero:</label>
              <select value="<?= $estu->genero; ?>" name="genero" class="form-control">
                <?php foreach ($genero as $gene) :
                  if ($estu->genero == $gene->genero) : ?>
                    <option selected value="<?= $gene->genero; ?>"><?= $gene->genero; ?></option>
                  <?php else : ?>
                    <option value="<?= $gene->genero; ?>"><?= $gene->genero; ?></option>
                <?php endif;
                endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Fecha de Nacimiento:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" value="<?= $estu->fecha_nac; ?>" name="fecha_nac" class="form-control">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group col-md-3">
              <label>Estado:</label>
              <select name="estado" class="form-control">
                <?php foreach ($estado as $esta) :
                  if ($estu->estado == $esta->nombre) : ?>
                    <option selected value="<?= $esta->nombre; ?>"><?= $esta->nombre; ?></option>
                  <?php else : ?>
                    <option value="<?= $esta->nombre; ?>"><?= $esta->nombre; ?></option>
                <?php endif;
                endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Email:</label>
              <input type="email" value="<?= $estu->email; ?>" name="email" class="form-control" placeholder="Email">
            </div>
          </div>
          <input type="hidden" name="id" value="<?= $estu->id_estudiante; ?>">
          <div class=" col-lg-10">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <button type="button" onclick="location='./?view=estudiantes&opt=all'" class="btn btn-warning">Cancelar</button>
          </div>
        </form>
  </section>
  <br>
<?php endif; ?>