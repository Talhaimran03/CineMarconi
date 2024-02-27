<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if (!isset($_SESSION['utente'])) {
    echo "<script>alert('Non hai effettuato il login');window.location.href='login/login.php';</script>";
}

$id = $_GET['id'];

if ((!$_GET['id'])) {
    echo "<script>alert('Errore del server');window.location.href='index.php';</script>";
}
include "connection.php";
$movieQuery = "SELECT * FROM film WHERE id_film = $id";
$movieImageById = mysqli_query($con, $movieQuery);
$row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Prenota <?php echo $row['movieTitle']; ?> Ora</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
</head>

<body style="background-color:#6e5a11;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>Ottieni il tuo biglietto</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                echo '<img src="../' . $row['copertina'] . '" alt=" ">';
                ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['titolo']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>GENERE</td>
                        <td><?php echo $row['genere']; ?></td>
                    </tr>
                    <tr>
                        <td>DURATA</td>
                        <td><?php echo $row['durata_minuti']; ?> minuti</td>
                    </tr>
                    <tr>
                        <td>DATA DI USCITA</td>
                        <td><?php echo $row['data_uscita']; ?></td>
                    </tr>
                    <tr>
                        <td>DIRETTORI</td>
                        <td><?php echo $row['direttori']; ?></td>
                    </tr>
                    <tr>
                        <td>ATTORI</td>
                        <td><?php echo $row['attori']; ?></td>
                    </tr>
                    <tr>
                        <td>TRAILER</td>
                        <td><a href="<?php echo $row['trailer_URL']; ?>" target="_blank"><?php echo $row['trailer_URL']; ?></a></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <form action="verify.php" method="POST">

                    <select name="tipo" required>
                        <option value="" disabled selected>TIPO</option>
                        <option value="3d">3D</option>
                        <option value="2d">2D</option>
                    </select>

                    <select name="data" required>
                        <option value="" disabled selected>DATA</option>
                        <?php
                            include "connection.php";

                            $sql = "SELECT DISTINCT data FROM orario_film WHERE id_film=$id";
                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value=\"" . $row["data"] . "\">" . $row["data"] . "</option>";
                            }

                            mysqli_close($con);
                        ?>
                    </select>

                    <select name="ora" required>
                        <option value="" disabled selected>ORA</option>
                        <?php
                            include "connection.php";

                            $sql = "SELECT DISTINCT ora FROM orario_film WHERE id_film=$id";
                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value=\"" . $row["ora"] . "\">" . $row["ora"] . "</option>";
                            }

                            mysqli_close($con);
                        ?>
                    </select>

                    <input type="hidden" name="id_film" value="<?php echo $id; ?>">

                    <button type="submit" value="save" name="submit" class="form-btn">Prenota</button>

                </form>
            </div>
        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>