<?php
session_start(); 

 
if(isset($_SESSION['username'])) {
    
    if(isset($_POST['id_prodotto'])) {

        $id_prodotto = $_POST['id_prodotto'];
        $id_utente = $_SESSION['id_utente'];

        $conn = new mysqli("localhost","root", "", "e-commerce");
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $query = "DELETE FROM carrello WHERE id_utente = ".$id_utente." AND id_prodotto = ".$id_prodotto."";
        
        $conn->query($query);
        $conn->close();

        header("Location: carrello.php");
        exit();
    } 
} else {
    header("Location: accedi.php");
    exit();
}
?>