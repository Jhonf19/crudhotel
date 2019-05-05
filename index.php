<?php
include("db.php");
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
include("includes/header.php"); ?>

<div class="container p4">
  <div class="row">
    <div class="col-md-4">
      <?php if (isset($_SESSION['msg'])): ?>
      <div class="alert alert-<?php echo $_SESSION['tmsg']; ?> alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['msg']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php unset($_SESSION['msg'],$_SESSION['tmsg']); endif ?>
      <div class="card card-body">
        <form class="" action="ghab.php" method="post">
          <div class="form-group">
            <input  type="text"class="form-control" name="numero" value="" placeholder="Numero" autofocus>
          </div>
          <div class="form-group">
            <input  type="text"class="form-control" name="precio" value="" placeholder="Precio">
          </div>

          <input type="submit" class="btn btn-block btn-primary" name="guardar_habitacion" value="Agregar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <th>#</th><th>Estado</th><th>Accion</th>
        </thead>
        <tbody>
          <?php $query = "SELECT * FROM habitaciones";
            $res = mysqli_query($conn, $query);
            while ($a = mysqli_fetch_array($res)) :?>
            <tr style="color:black; background:<?php if ($a['estado']==0) {
              echo 'green';
            }else {
              echo 'red';
            } ?>;">
              <td><?php echo $a['numero']; ?></td>
              <td><?php if ($a['estado']==0) {
                echo "Disponible";
              }else {
                echo "Ocupada";
              } ?></td>
              <td> <a href="ghab.php?id=<?php echo $a['id_habitacion']; ?>&es=<?php echo $a['estado']; ?>" ><?php if ($a['estado']==0) {
                echo "Reservar";
              }else {
                echo "Habilitar";
              } ?></a> </td>
            </tr>
            <?php endwhile ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php  include("includes/footer.php");  ?>
