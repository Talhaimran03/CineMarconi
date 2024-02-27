<?php 
    $id = $_GET['id'];
    include "config.php";

    $sql = "DELETE FROM film WHERE id_film = $id"; 

    if ($con->query($sql) === TRUE) {
        header('Location: addmovie.php');
        exit;
    } else {
        echo "Error deleting record: ";
    }
?>