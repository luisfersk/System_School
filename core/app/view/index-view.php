<section class="content">
  <div class="row">
    <div class="col-md-12 ">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">

        </div>
      </div>
    </div>
    <br>
    <div class="col-md-12 text-center">

    </div>
    <?php
    $found = true;
    if (isset($_SESSION["user_id"])) {
      $user = UserData::getById($_SESSION["user_id"]);
      if ($user->kind == 1) {
    ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count(EstudiantesData::getAll()); ?></h3>
              <p>Estudiantes</p>
            </div>
            <a href="./?view=estudiantes&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo count(ProfesoresData::getall()); ?></h3>
              <p>Profesores</p>
            </div>
            <a href="./?view=profesores&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count(ProgramaData::getAll()); ?></h3>
              <p>Programas</p>
            </div>
            <a href="./?view=grados&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count(CursosData::getall()); ?></h3>
              <p>Grupos</p>
            </div>
            <a href="./?view=cursos&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php }
    }
    if (isset($_SESSION["user_id"])) {
      if ($user->kind == 0) {
      ?>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count(CursosData::getall()); ?></h3>
              <p>Grupos</p>
            </div>
            <a href="./?view=asis" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
    <?php }
    } ?>
  </div>
</section>