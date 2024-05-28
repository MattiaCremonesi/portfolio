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

        $query = "INSERT INTO carrello (id_utente, id_prodotto) VALUES ('".$id_utente."', '".$id_prodotto."')";
        
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->close();
    
        $conn->close();

        header("Location: index.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: accedi.php");
    exit();
}
?>