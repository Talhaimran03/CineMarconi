<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Contact Us</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
</head>

<body>
    <?php
    include "connection.php";
    ?>
    <header>
        <?php include "../includes/header.php"; ?>
    </header>
    <div class="contact-us-container">
        <div class="contact-us-section contact-us-section1">
            <h1>Contatti</h1>
            <p>Contattaci </p>
            <form action="" method="POST">
                <input placeholder="Nome" name="nome" required><br>
                <input placeholder="Cognome" name="cognome"><br>
                <input placeholder="Email" name="email" required><br>
                <textarea placeholder="Inserisci il tuo feedback" name="feedback" rows="10" cols="30" required></textarea><br>
                <button type="submit" name="submit" value="submit">Invia il feedback</button>
                <?php
                if (isset($_POST['submit'])) {
                    $nome = $_POST["nome"];
                    $cognome = $_POST["cognome"];
                    $email = $_POST["email"];
                    $feedback = $_POST["feedback"];

                    include "connection.php";
                    $qry = "INSERT INTO feedback(`nome`, `cognome`, `email`, `feedback`)
                            VALUES ('$nome', '$cognome', '$email', '$feedback')";

                    $result = mysqli_query($con, $qry);

                    echo "<script>alert('Feedback inviato con successo');</script>";
                    
                }
                ?>
            </form>

        </div>
        <div class="contact-us-section contact-us-section2">
            <h1>Info</h1>
            <h3>Emails</h3>
            <p><a href="mailto:19078@studenti.marconiverona.edu.it">19078@studenti.marconiverona.edu.it</a><br>
                <a href="mailto:19245@studenti.marconiverona.edu.it">19245@studenti.marconiverona.edu.it</a></p>
            <h3>Indirizzo</h3>
            <p>Piazzale Romano Guardini, 1, 37138</p>
            <h3>Telefono</h3>
            <p>045 810 1428</p>
        </div>
    </div>
    <div style="width: 75%; height: 350px; margin: 15%;">
        <div class="gmap_canvas"><iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.647626402298!2d10.978536315567438!3d45.42971187910054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477ebd4f4abf4a8b%3A0x915e5f7b233d6b9c!2sPiazzale%20Romano%20Guardini%2C%201%2C%2037138%20Verona%20VR%2C%20Italia!5e0!3m2!1sit!2sus!4v1652223424127!5m2!1sit!2sus" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/owl.carousel.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>