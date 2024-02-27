<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>CineMarconi</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
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
    
    // Funzione per il form di login e stampa delgi errori
    function chiediDati($errori = null, $email = null, $pwd = null, $pwdConf = null , $nome = null, $cognome = null, $data_nascita = null, $numero_telefono = null){
    ?>
    <form action="registrazione.php" method="post" id="outline">
        <div class="container">
            <h1>Registrazione CineMarconi</h1>

            <div>
                <input type="text" placeholder="Email *" name="email" id="input-field" value="<?= $email ?>" pattern=".{9,}" required>
                <?php stampaErrori($errori, "email")?>
            </div>

            <div>
                <input type="password" placeholder="Password *" name="pwd" id="input-field" value="<?= $pwd ?>" pattern=".{8,}" required>
                <?php stampaErrori($errori, "pwd")?>
            </div>

            <div>
                <input type="password" placeholder="Conferma password *" name="pwdConf" id="input-field" value="<?= $pwdConf ?>" pattern=".{8,}" required>
                <?php stampaErrori($errori, "pwdConf")?>
            </div>

            <div>
                <input type="text" placeholder="Nome *" name="nome" id="input-field" value="<?= $nome ?>" pattern=".{2,255}" required>
                <?php stampaErrori($errori, "nome")?>
            </div>

            <div>
                <input type="text" placeholder="Cognome *" name="cognome" id="input-field" value="<?= $cognome ?>" pattern=".{2,255}" required>
                <?php stampaErrori($errori, "cognome")?>
            </div>

            <div>
                <input type="date" placeholder="Data di nascita *" name="data_nascita" id="input-field" value="<?= $data_nascita ?>" pattern="\d{4}-\d{2}-\d{2}" max="<?php echo date('Y-m-d', strtotime('-14 years')); ?>" required>
                <?php stampaErrori($errori, "data_nascita")?>
            </div>

            <div>
                <input type="tel" placeholder="Numero di telefono *" name="numero_telefono" id="input-field" value="<?= $numero_telefono ?>" pattern="^\d{10}$" required>
                <?php stampaErrori($errori, "numero_telefono")?>
            </div><br>

            <button type="submit" name="submit" class="primary-btn" id="lightning-button"> Registrati </button>

            <div class="new-member">
                <p id="link"> Hai già un account? <a href="login.php">Accedi</a></p>
            </div> <br>
        </div>
    </form>
    <?php
    }

    function stampaErrori($errori, $campo){
        if ($errori != null){
            echo "<br>";
            foreach ($errori[$campo][0] as $errore) {
                echo "<span>$errore</span><br>";
            }
            echo "<br>";
        }
    }

    function registrazione($email, $pwd, $nome, $cognome, $data_nascita, $numero_telefono) {
        include("../connection.php");
        
        $sql = "INSERT INTO utenti(email, password, nome, cognome, data_nascita, numero_telefono, ruolo)
                VALUES ('$email', '$pwd', '$nome', '$cognome', '$data_nascita', '$numero_telefono', 'utente')";
        
        $check = "t";
        if ($con->query($sql) === TRUE) {
            echo "<center><br><br>
                  <div class='container'>
                  <h2>Creazione account avvenuta con successo</h2>";
            include("profiloUtente.php");
        } else {
            echo "Errore nella creazione dell'account";
        }
        
        $con->close();
    }
    
    function controlloInput(){
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $pwdConf = $_POST['pwdConf'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $data_nascita = $_POST['data_nascita'];
        $numero_telefono = $_POST['numero_telefono'];

        include("controlloDati.php");
        $errori = controllaDati($email, $pwd, $pwdConf, $nome, $cognome, $data_nascita, $numero_telefono);
        $erroreTrovato = false;
        
        foreach ($errori as $err => $valore) {
            foreach ($valore as $val => $v) {
                if (!empty($v)) {
                    $erroreTrovato = true;
                } 
            }
        }       

        if ($erroreTrovato == false) {
            registrazione($email, $pwd, $nome, $cognome, $data_nascita, $numero_telefono);
        } else {
            chiediDati($errori, $email, $pwd, $pwdConf, $nome, $cognome, $data_nascita, $numero_telefono);
        }
    }

    if (isset($_SESSION['utente'])) {
        header('Location: ../index.php');
    }

    if (isset($_POST['submit'])) {
        controlloInput();
    } else {
        chiediDati();
    }
    ?>
</body>
</html>