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
        header("Location: index.php");
        exit();
    } else {
        echo "Username o password errati. Riprova.";
    }

    $conn->close();
} else {
    header("Location: registrazione.php");
    exit();
}

