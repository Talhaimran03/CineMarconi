<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style1.css">
    
</head>

<body>
    <header>
    <div class="navbar-brand">
        <a href="../index.php">
            <h1 class="navbar-heading">CineMarconi</h1>
        </a>
    </div>
    </header>
    <?php
    function login($email = null, $pwd = null, $errore = null){
    ?>
        <div class="container">
            <form method="post" action="login.php" id="outline">
                <h1>Login CineMarconi</h1>
                <div>
                    <input type="text"  id="input-field" name="email" placeholder="Email *" value="<?= $email ?>" required/>
                </div>
                <div>
                    <input type="password"  id="input-field" name="pwd" placeholder="Password *" value="<?= $pwd ?>" required/>
                </div>
                <div>
                <button type="submit" name="submit" class="primary-btn" id="lightning-button"> Registrati </button>
                </div>

                <?php echo"<br><span>$errore</span><br>"; ?>

                <p id="link"> Non hai un account? <a href="registrazione.php">Registrati</a></p> <br>
            </form>
        </div>
    <?php
    }
    ?>
</body>

</html>

<?php

if (isset($_SESSION['utente'])) {
    header('Location: ../index.php');
}

include "../connection.php";

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pwd']);

    if ($email != "" && $password != "") {

        $sql_query = "select count(*) as n_utenti from utenti where email='" . $email . "' and password='" . $password . "' and ruolo='admin'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['n_utenti'];

        if ($count == 1) {
            session_start();
            $_SESSION['admin'] = $email;
            header('Location: ../../admin/admin.php');
        } else {
            $sql_query = "select count(*) as n_utenti from utenti where email='" . $email . "' and password='" . $password . "' and ruolo='utente'";
            $result = mysqli_query($con, $sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['n_utenti'];

            if ($count == 1) {
                session_start();
                $_SESSION['utente'] = $email;
                header('Location: ../index.php');
            } else {
                login($email, $password, "Email o password errate");
            }
        }
    }
} else {
    login();
}
?>
</body>
</html>