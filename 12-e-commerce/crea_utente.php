<?php
    
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $conn = new mysqli("localhost","root", "", "e-commerce");
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }
    
        $query = "INSERT INTO utente (Username, Email, Password) VALUES ('".$username."', '".$email."', '".$password."')";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->close();
    
        $conn->close();

        header("Location: accedi.php");
        exit();

        
    } else {
        header("Location: registrazione.php");
        exit();
    }
?>
