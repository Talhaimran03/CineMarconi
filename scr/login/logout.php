<?php
// Script per la chiusura della sessione

session_start();
session_destroy();
header("Location: ../index.php");
exit();
?>