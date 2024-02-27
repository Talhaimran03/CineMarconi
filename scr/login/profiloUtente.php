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
  if (!isset($email)) {
    session_start();
    if (isset($_SESSION['utente'])){
      include("../connection.php");
      $email = $_SESSION['utente'];
      
      $query = "SELECT *
                FROM Utenti 
                WHERE email = '$email'";

      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $pwd = $row['password'];
        $nome = $row['nome'];
        $cognome = $row['cognome'];
        $data_nascita = $row['data_nascita'];
        $numero_telefono = $row['numero_telefono'];

        echo "<center><br><br>
              <div class='container'>
                <h2>Profilo utente</h2>";
      }
      $con->close();
    }

  }

  // Visulizzazione in tabella del profilo utente
  echo ("<table>
          <tr><td>Codice Fiscale:</td><td>" . $email . "</td></tr>
          <tr><td>Password:</td><td>" . str_repeat("•", strlen($pwd)) . "</td></tr>
          <tr><td>Nome:</td><td>" . $nome . "</td></tr>
          <tr><td>Cognome:</td><td>" . $cognome . "</td></tr>
          <tr><td>Data di nascita:</td><td>" . $data_nascita . "</td></tr>
          <tr><td>Cellulare:</td><td>" . $numero_telefono . "</td></tr>
        </table><br>
        ");
        
  if (isset($check)){
    echo ("<form action='login.php'><input type='submit' class='primary-btn' value='Torna al login'></form>
            </div>");
  } else {
    echo ("<form action='../index.php'><input type='submit' class='primary-btn' value='Torna a CineMarconi'></form>
            </div>");
  }
  ?>
</body>
</html>