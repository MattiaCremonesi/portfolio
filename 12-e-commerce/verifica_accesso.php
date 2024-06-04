<?php
session_start(); 

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost","root", "", "e-commerce");
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $query = "SELECT * FROM utente WHERE Username = '$username' AND Password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username; 
        $_SESSION['id_utente'] = $row['Id'];

        $conn->close();
        header("Location: index.php");
        exit();
    } else {
        header("Location: accedi.php?q='error'");
        exit();
    }
} else {
    header("Location: registrazione.php");
    exit();
}

