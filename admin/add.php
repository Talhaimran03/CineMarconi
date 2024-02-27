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
    <title>Aggiungi prenotazioni</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    ?>

    <?php include('header.php'); ?>
    
    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Aggiungi prenotazione</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <div class="booking-form-container">
                        <form action="spot.php" method="POST">
                            <input placeholder="ID prenotazione" type="text" name="id_prenotazione">
                            <input placeholder="ID film" type="text" name="id_film">
                            <input placeholder="Email" type="email" name="email" required>

                            <select name="data" required>
                                <option value="" disabled selected>DATA</option>
                                <?php
                                    include "config.php";

                                    $sql = "SELECT DISTINCT data FROM orario_film";
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
                                    include "config.php";

                                    $sql = "SELECT DISTINCT ora FROM orario_film";
                                    $result = mysqli_query($con, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value=\"" . $row["ora"] . "\">" . $row["ora"] . "</option>";
                                    }

                                    mysqli_close($con);
                                ?>
                            </select>

                            <select name="tipo" required>
                                <option value="" disabled selected>TIPO</option>
                                <option value="3d">3D</option>
                                <option value="2d">2D</option>
                            </select>
                            
                            <input placeholder="Prezzo" type="text" name="prezzo" required>

                            <button type="submit" value="submit" name="submit" class="form-btn">AGGIUNGI</button>
                            
                        </form>
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