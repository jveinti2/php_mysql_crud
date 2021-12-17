<?php
include("db.php");
$DNI= '';
$Nombre= '';
$Date= '';
$Dir= '';
$Tel= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_personas WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $dni = $row['DNI'];
    $name = $row['Nombre'];
    $date = $row['Date'];
    $dir = $row['Dir'];
    $tel = $row['Tel'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $dni= $_POST['dni'];
  $name= $_POST['name'];
  $date= $_POST['date'];
  $dir= $_POST['dir'];
  $tel= $_POST['tel'];

  echo $dni;
  echo $name;
  // $description = $_POST['description'];

  $query = "UPDATE tbl_personas set DNI = '$dni', Nombre = '$name', Date = '$date', Dir = '$dir', Tel = '$tel' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Hecho';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="dni" type="number" class="form-control" value="<?php echo $dni; ?>" placeholder="DNI">
        </div>
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Nombre">
        </div>
        <div class="form-group">
          <input name="date" type="date" class="form-control" value="<?php echo $date; ?>" placeholder="Fecha">
        </div>
        <div class="form-group">
          <input name="dir" type="text" class="form-control" value="<?php echo $dir; ?>" placeholder="Dirección">
        </div>
        <div class="form-group">
          <input name="tel" type="number" class="form-control" value="<?php echo $tel; ?>" placeholder="Telefono">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>