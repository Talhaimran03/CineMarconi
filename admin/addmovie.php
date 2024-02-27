<?php
include "config.php";

if (!isset($_SESSION['admin'])) {
    header('Location: ../scr/login/login.php');
}

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
    <title>Pannello di controllo</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $sql = "SELECT * FROM prenotazioni";
    $bookingsNo = mysqli_num_rows(mysqli_query($con, $sql));
    ?>
    
    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">

                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Film</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>ID film</th>
                            <th>Titolo</th>
                            <th>Genere</th>
                            <th>Data di uscita</th>
                            <th>Direttori</th>
                            <th>Attori</th>
                            <th>Elimina</th>
                            
                        </tr>
                        <tbody>
                            <?php

                            $select = "SELECT * FROM `film`";
                            $run = mysqli_query($con, $select);
                            while ($row = mysqli_fetch_array($run)) {
                                $id_film = $row['id_film'];
                                $titolo = $row['titolo'];
                                $genere = $row['genere'];
                                $data_uscita = $row['data_uscita'];
                                $direttori = $row['direttori'];
                                $attori = $row['attori'];
                            ?>
                                <tr align="center">
                                    <td><?php echo $id_film; ?></td>
                                    <td><?php echo $titolo; ?></td>
                                    <td><?php echo $genere; ?></td>
                                    <td><?php echo $data_uscita; ?></td>
                                    <td><?php echo $direttori; ?></td>
                                    <td><?php echo $attori; ?></td>
                                    <td><button value="Elimina" type="submit" onclick="" type="button" class="btn btn-outline-warning"><?php echo  "<a href='deletemovie.php?id=" . $row['id_film'] . "'>Elimina</a>"; ?></button></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>

                    </table>
                </div>

                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Aggiungi film</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" enctype="multipart/form-data" method="POST">
                        <input placeholder="Titolo" type="text" name="titolo" required>
                        <input placeholder="Genere" type="text" name="genere" required>
                        <input placeholder="Durata" type="number" name="durata" required>
                        <input placeholder="Data di uscita" type="date" name="data_uscita" required>
                        <input placeholder="Direttori" type="text" name="direttori" required>
                        <input placeholder="Attori" type="text" name="attori" required>
                        <input placeholder="Trailer UTL" type="text" name="trailer_URL" required>
                        <input placeholder="Prezzo" type="text" name="prezzo" required>
                        <input type="file" name="copertina" accept="image/*" required>
                        <button type="submit" value="submit" name="submit" class="form-btn">Add Movie</button>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $sql = "INSERT INTO film ( copertina, titolo, genere, durata_minuti, data_uscita, direttori, attori, trailer_URL, prezzo)
                                VALUES ( 'img/" . $_FILES['copertina']['name'] . "', '" . $_POST["titolo"] . "', '" . $_POST["genere"] . "', '" . $_POST["durata"] . "', '" . $_POST["data_uscita"] . "', '" . $_POST["direttori"] . "', '" . $_POST["attori"] . "', '" . $_POST["trailer_URL"] . "', '" . $_POST["prezzo"] . "')";
                        $rs= mysqli_query($con, $sql);

                        if ($rs) {
                        echo "<script>alert('Film aggiunto con successo');
                                window.location.href='addmovie.php';</script>";
                        $nFile = $_FILES['copertina']['name'];
                        $percorsoFile = $_FILES['copertina']['tmp_name'];
                        move_uploaded_file($percorsoFile, "../img/$nFile");
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>