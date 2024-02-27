<?php

function controlloEmail($email) {
    $errori = array();
    
    if (strlen($email) == 0){
        return $errori;
    }
    // Verifica che l'email sia valida
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errori, "• L'email inserita non è valida");
    }

    include("../connection.php");
    // Verifica se esiste il nome Utente
    $sql = "SELECT email 
            FROM utenti 
            WHERE email = '$email'";
    $result = $con->query($sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        array_push($errori, "• L'indirizzo email è già presente nel database");
    }

    $con->close();

    return $errori;
}


function controlloPassword($pwd) {
    $errori = array();
    
    // Verifica che la password sia lunga almeno 8 caratteri
    if (strlen($pwd) < 8) {
        array_push($errori, "• La password deve essere lunga almeno 8 caratteri");
        
    }

    // Verifica che la password contenga almeno una lettera maiuscola
    if (!preg_match('/[A-Z]/', $pwd)) {
        array_push($errori, "• La password deve contenere almeno una lettera maiuscola");
        
    }

    // Verifica che la password contenga almeno una lettera minuscola
    if (!preg_match('/[a-z]/', $pwd)) {
        array_push($errori, "• La password deve contenere almeno una lettera minuscola");
        
    }

    // Verifica che la password contenga almeno un numero
    if (!preg_match('/\d/', $pwd)) {
        array_push($errori, "• La password deve contenere almeno un numero");
        
    }

    // Verifica che la password contenga almeno un carattere speciale
    if (!preg_match('/[^A-Za-z0-9]/', $pwd)) {
        array_push($errori, "• La password deve contenere almeno un carattere speciale");
        
    }

    return $errori;
}


function confermaPassword($pwd1, $pwd2) {
    $errori = array();
    
    if ($pwd1 != $pwd2) {
        array_push($errori, "• Le password inserite non corrispondono");
        
    }
    return $errori;
}


function controlloNomeCognome($stringa) {
    $errori = array();
    
    // Verifica che la stringa sia composta solo da lettere
    if (!ctype_alpha($stringa)) {
        array_push($errori, "• Il campo contiene caratteri non ammessi");
        
    }

    // Verifica che non sia troppo corto o troppo lungo
    if (strlen($stringa) < 2 || strlen($stringa) > 50) {
        array_push($errori, "• Il campo non ha la lunghezza consentita");
        
    }

    return $errori;
}

function controlloDataNascita($dataDiNascita) {
    $errori = array();
    $data = DateTime::createFromFormat('Y-m-d', $dataDiNascita);

    // Verifica che la data di nascita sia valida
    if (!$data || $data->format('Y-m-d') !== $dataDiNascita) {
        array_push($errori, "• La data di nascita non è valida");
    } else {
        // Verifica che la data di nascita sia antecedente a oggi
        $oggi = new DateTime();
        if ($data > $oggi) {
            array_push($errori, "• La data di nascita è successiva alla data odierna");
        }
    }

    // Verifica che l'utente abbia almeno 14 anni
    if ($data->diff(new DateTime())->y < 14) {
        array_push($errori, "• L'utente deve avere almeno 14 anni");
    }

    return $errori;
}

function controlloCellulare($cell) {
    $errori = array();

    if (strlen($cell) == 0){
        return $errori;
    }
    // Rimuovi tutti i caratteri non numerici dal numero di telefono
    $cell = preg_replace('/[^0-9]/', '', $cell);
    
    // Verifica che il numero di telefono abbia almeno 10 cifre
    if (strlen($cell) < 10) {
        array_push($errori, "• Il numero di cellulare deve contenere almeno 10 cifre");
        
    }
    return $errori;
}

// Funzione che richiama le altre funzioni e mette il risultato in un array associativo
function controllaDati($email, $pwd, $pwdConf, $nome, $cognome, $data_nascita, $numero_telefono){
    $errori = array(
        "email" => array(controlloEmail($email)),
        "pwd" => array(controlloPassword($pwd)),
        "pwdConf" => array(confermaPassword($pwd, $pwdConf)),
        "nome" => array(controlloNomeCognome($nome)),
        "cognome" => array(controlloNomeCognome($cognome)),
        "data_nascita" => array(controlloDataNascita($data_nascita)),
        "numero_telefono" => array(controlloCellulare($numero_telefono))
    );

    return $errori;
}

?>