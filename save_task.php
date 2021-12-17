<?php

include("db.php");

if(isset($_POST['save_task'])){
    $dni = $_POST['dni'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $dir = $_POST['dir'];
    $tel = $_POST['tel'];



    $query = "INSERT INTO tbl_personas(DNI, Nombre, Date, Dir, Tel) VALUES ('$dni', '$name', '$date', '$dir', '$tel')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die( 'Aplicación falló' );
    }

    $_SESSION['message'] = 'Guardado, listo para el censo';
    $_SESSION['message_type'] = 'success';
    

     

    header("location: index.php");
}

?>