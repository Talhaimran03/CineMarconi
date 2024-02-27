<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="login/css/style2.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Pagamento</title>
    <script src="script.js "></script>
</head>

<?php
include "connection.php";
session_start();

if (isset($_SESSION['utente'])){
    $email = $_SESSION['utente'];

    $query = "SELECT *
                FROM Utenti 
                WHERE email = '$email'";
    $e = mysqli_query($con, $query);
    $row = mysqli_fetch_array($e);
} else {
    echo "<script>alert('Non hai effettuato il login');window.location.href='index.php';</script>";
}


// variables
$nome = $row['nome'];
$cognome = $row['cognome'];
$numero_telefono = $row['numero_telefono'];

if (isset($_POST['submit'])) {
    $_SESSION['tipo'] = $_POST['tipo'];
    $_SESSION['data'] = $_POST['data'];
    $_SESSION['ora'] = $_POST['ora'];
    $_SESSION['id_film'] = $_POST['id_film'];
}

$tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : '';
$data = isset($_SESSION['data']) ? $_SESSION['data'] : '';
$ora = isset($_SESSION['ora']) ? $_SESSION['ora'] : '';
$id_film = isset($_SESSION['id_film']) ? $_SESSION['id_film'] : '';

$order = rand(10000, 99999999);


$query = "SELECT prezzo
            FROM film 
            WHERE id_film = '$id_film'";
$e = mysqli_query($con, $query);
$row = mysqli_fetch_array($e);
$prezzo = $row['prezzo'];

if (isset($_POST['submit2'])) {
    $qry = "INSERT INTO prenotazioni(`id_prenotazione`, `id_film`, `email`, `data`, `ora`, `tipo`, `prezzo`)
    VALUES ('$order', '$id_film', '$email','$data','$ora', '$tipo', '$prezzo')";

    $result = mysqli_query($con, $qry);
    echo ("<script>alert('Prenotazione andata a buon fine')
    window.location.href='index.php';</script></script>");
} else {
    ?>
    <body>
        <center>
            <br><br>
            <h1>Conferma prenotazione </h1>
            <br><br>

            <form method="post" action="verify.php">
                <table border="1" style="text-align: center;">
                    <tbody>
                        <tr>
                            <th>Label</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td><label>ORDER_ID</label></td>
                            <td><?php echo $order; ?>
                            </td>
                        </tr>

                        <tr>
                            <td><label>Name</label></td>
                            <td><?php echo $nome . " " . $cognome; ?></td>
                        </tr>
                        <tr>
                            <td><label>Website </label></td>
                            <td>
                                <?php echo "CineMarconi"; ?>
                            </td>
                        </tr>

                        <tr>
                            <td><label>Data</label></td>
                            <td><?php echo $data . " " . $ora; ?></td>
                        </tr>

                        <tr>
                            <td><label>TYPE </label></td>
                            <td>
                                <?php echo $tipo; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Prezzo</label></td>
                            <td>
                                <?php echo $prezzo ?> €
                            </td>
                        </tr>

                    </tbody>
                </table>
                <button value="Book Now!" type="submit" name="submit2" type="button" class="btn btn-danger">Prenota</button>

            </form>
        </center>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
<?php
}
?>

</html>