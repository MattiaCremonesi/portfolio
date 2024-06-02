<?php
    
    session_start();
    $id_utente = $_SESSION['id_utente'];
   
    $conn = new mysqli("localhost","root", "", "e-commerce");
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    
    $query = "DELETE FROM carrello WHERE id_utente = ".$id_utente."";
    $conn->query($query);
        
    $conn->close();
        
    header("Location: carrello.php");
    exit;

    
?>