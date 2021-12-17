<?php include('db.php')?>

<?php include('includes/header.php') ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">

                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); } ?>

                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="number" name="dni" class="form-control"
                            placeholder="DNI" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control"
                            placeholder="Nombre" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="date" name="date" class="form-control"
                            placeholder="Fecha nacimiento" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="dir" class="form-control"
                            placeholder="Dirección" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="number" name="tel" class="form-control"
                            placeholder="Numero de telefono" autofocus>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Fecha de nacimiento</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM tbl_personas";
                        $result_tasks = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['DNI'] ?></td>
                                <td><?php echo $row['Nombre'] ?></td>
                                <td><?php echo $row['Date'] ?></td>
                                <td><?php echo $row['Dir'] ?></td>
                                <td><?php echo $row['Tel'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"  ></i>
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"  ></i>
                                    </a>
                                </td>
                            </tr>
                        <?php  } ?>

                    </tbody>

                </table>



                    

            </div>
        </div>
    </div>


<?php include('includes/footer.php') ?>


