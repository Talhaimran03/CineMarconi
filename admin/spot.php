<?php
include "config.php";

if (isset($_POST['submit'])) {
    $id_prenotazione = $_POST['id_prenotazione'];
    $id_film = $_POST['id_film'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $tipo = $_POST['tipo'];
    $prezzo = $_POST['prezzo'];


    $sql = "INSERT INTO `prenotazioni`(`id_prenotazione`, `id_film`, `email`, `data`, `ora`, `tipo`, `prezzo`)
            VALUES ('$id_prenotazione', '$id_film', '$email', '$data', '$ora', '$tipo', '$prezzo')";

    $rs = mysqli_query($con, $sql);

    if ($rs) {
        echo "<script>alert('Sussessfully Submitted');
              window.location.href='add.php';</script>";
    }
} else {
    echo "error" . mysqli_error($conn);
}
