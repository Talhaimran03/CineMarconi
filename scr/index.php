<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>CineMarconi</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
</head>

<body>
    <?php
    include "connection.php";
    $sql = "SELECT * FROM film";
    ?>
    <header>
        <?php include "../includes/header.php"; ?>
    </header>
    <div id="home-section-1" class="movie-show-container">
        <h1>Film in sala</h1>
        <h3>Prenota ora</h3>

        <div class="movies-container">

            <?php
            if ($result = mysqli_query($con, $sql)) {
                $num_row = mysqli_num_rows($result);
                if ($num_row > 0) {
                    for ($i = 0; $i < $num_row; $i++) {
                        $row = mysqli_fetch_array($result);
                        echo '<div class="movie-box">';
                        echo '<img src="../' . $row['copertina'] . '" alt=" ">';
                        echo '<div class="movie-info ">';
                        echo '<h3>' . $row['titolo'] . '</h3>';
                        echo '<a href="booking.php?id=' . $row['id_film'] . '"><i class="fas fa-ticket-alt"></i> Prenota </a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    mysqli_free_result($result);
                } else {
                    echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            }

            // Close connection
            mysqli_close($con);
            ?>
        </div>
    </div>

    <div id="home-section-2" class="services-section">
        <h1>Come funziona</h1>
        <h3>3 semplici passi</h3>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Scegli il tuo film</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Paga quando arrivi</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>3. Goditi il tuo film</h2>
            </div>
            <div class="service-item"></div>
            <div class="service-item"></div>
        </div>
    </div>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>