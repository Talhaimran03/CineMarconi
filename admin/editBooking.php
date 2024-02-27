<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Modifica</title>
</head>

<body>
<?php

include "config.php";
$id = $_GET['id'];
$sql = "SELECT * FROM prenotazioni WHERE id_prenotazione='$id'";
$qry = mysqli_query($con, $sql);

$data = mysqli_fetch_array($qry); 

if (isset($_POST['modifica'])) {
    $id_prenotazione = $_POST['id_prenotazione'];
    $id_film = $_POST['id_film'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $prezzo = $_POST['prezzo'];
    

    $edit = mysqli_query($con, "UPDATE prenotazioni SET id_prenotazione='$id_prenotazione', id_film='$id_film',email='$email',data='$data',ora='$ora',prezzo='$prezzo' WHERE id_prenotazione='$id'");

    if ($edit) {
        mysqli_close($con); 
        header("location:view.php"); 
        exit;
    } else {
        echo "Errore nella modifica dei dati";
    }
}
?>
    <?php include('header.php'); ?>

    <div class="admin-container">
        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Modifica dati</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <div class="booking-form-container">
                        <form method="POST">
                            <input type="text" name="id_prenotazione" value="<?php echo $data['id_prenotazione'] ?>" placeholder="ID prenotazione" Required>
                            <input type="text" name="id_film" value="<?php echo $data['id_film'] ?>" placeholder="ID film" Required>
                            <input type="text" name="email" value="<?php echo $data['email'] ?>" placeholder="Email" Required>
                            <input type="text" name="data" value="<?php echo $data['data'] ?>" placeholder="Data" Required>
                            <input type="text" name="ora" value="<?php echo $data['ora'] ?>" placeholder="Ora" Required>
                            <input type="text" name="prezzo" value="<?php echo $data['prezzo'] ?>" placeholder="prezzo" Required>
                            <input type="submit" name="modifica" class="form-btn" value="Modifica">
                             
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>