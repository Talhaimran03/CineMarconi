<?php
include "config.php";


// Check user login or not
if (!isset($_SESSION['admin'])) {
    header('Location: ../scr/login/login.php');
}

// logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../scr/login/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    
    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="container-lg">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Prenotazioni</b></h2>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>ID prenotazione</th>
                            <th>ID film</th>
                            <th>Email</th>
                            <th>Data</th>
                            <th>Ora</th>
                            <th>Tipo</th>
                            <th>Prezzo</th>

                        </tr>
                        <tbody>
                            <?php

                            $select = "SELECT * FROM `prenotazioni`";
                            $run = mysqli_query($con, $select);
                            while ($row = mysqli_fetch_array($run)) {
                                $id_prenotazione = $row['id_prenotazione'];
                                $id_film = $row['id_film'];
                                $email = $row['email'];
                                $data = $row['data'];
                                $ora = $row['ora'];
                                $tipo = $row['tipo'];
                                $prezzo = $row['prezzo'];
                            ?>
                                <tr align="center">
                                <td><?php echo $id_prenotazione; ?></td>
                                    <td><?php echo $id_film; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $data; ?></td>
                                    <td><?php echo $ora; ?></td>
                                    <td><?php echo $tipo; ?></td>
                                    <td><?php echo $prezzo; ?></td>
                                    <td><button type="submit" type="button" class="btn btn-outline-warning"><?php echo  "<a href='deleteBooking.php?id=" . $row['id_prenotazione'] . "' >Elimina</a>"; ?></button><button name="update"  type="submit" onclick="" type="button" class="btn btn-outline-warning"><?php echo  "<a href='editBooking.php?id=" . $row['id_prenotazione'] . "'>Modifica</a>"; ?></button></td>
                                    <td></td>
                                </tr>

                            <?php }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>