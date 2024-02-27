<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['admin'])) {
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $num_prenotazioni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM prenotazioni"));
    $num_film = mysqli_num_rows(mysqli_query($con, "SELECT * FROM film"));
    $num_utenti = mysqli_num_rows(mysqli_query($con, "SELECT * FROM utenti"));
    ?>

    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">
                <div class="admin-section-panel admin-section-stats">
                    <div class="admin-section-stats-panel">
                        <i class="fa fa-ticket-alt" style="background-color: #cf4545"></i>
                        <h2 style="color: #cf4545"><?php echo $num_prenotazioni ?></h2>
                        <h3>Prenotazioni</h3>
                    </div>
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                        <h2 style="color: #4547cf"><?php echo $num_film ?></h2>
                        <h3>Film</h3>
                    </div>
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-users" style="background-color: #000000"></i>
                        <h2 style="color: #bb3c95"><?php echo $num_utenti ?></h2>
                        <h3>Utenti</h3>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Prenotazioni</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
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

                                $sql = "SELECT * FROM `prenotazioni`";
                                $run = mysqli_query($con, $sql);
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
                                    </tr>

                                <?php }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>