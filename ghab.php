<?php
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
include("db.php");

if (isset($_POST['guardar_habitacion'])) {
  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";
    $numero = $_POST['numero'];
    $precio = $_POST['precio'];
    $estado = 0;

    $query = "INSERT INTO habitaciones(numero, precio, estado) VALUES('$numero', '$precio', '$estado')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
      die("Upps");
  }else {
    $_SESSION['msg']="Habitacion Agregada";
    $_SESSION['tmsg']="primary";
    header("location:index.php");
  }
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $es = $_GET['es'];
  if ($es==0) {
    $es=1;
    $x="Reservada";
  }else {
    $es=0;
    $x="Habilitada";
  }

  $query = "UPDATE habitaciones SET estado='$es' WHERE id_habitacion=$id";
    $resul = mysqli_query($conn, $query);
    if (!$resul) {
      die("Upps");
  }else {
    $_SESSION['msg']="Habitacion ".$x;
    $_SESSION['tmsg']="danger";
    header("location:index.php");
  }

}
 ?>
