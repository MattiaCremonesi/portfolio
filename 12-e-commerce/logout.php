<?php

session_start();

if(isset($_SESSION['username'])){

    $id_utente = $_SESSION['id_utente'];

    $conn = new mysqli("localhost","root", "", "e-commerce");
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $query = "DELETE FROM carrello WHERE id_utente = ".$id_utente."";
    $conn->query($query);

    $conn->close();
}

$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

session_destroy();

header("Location: index.php");
exit;
?>
