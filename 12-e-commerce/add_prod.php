<?php
    
    if(isset($_POST['nome_prodotto']) && isset($_POST['descrizione']) && isset($_POST['prezzo']) && isset($_POST['immagine'])) {
        $nome_prodotto = $_POST['nome_prodotto'];
        $descrizione = $_POST['descrizione'];
        $prezzo = $_POST['prezzo'];
        $immagine= $_POST['immagine'];

        $conn = new mysqli("localhost","root", "", "e-commerce");
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }
    
        $query = "INSERT INTO prodotto (nome, descrizione, prezzo, link_immagine) VALUES ('".$nome_prodotto."', '".$descrizione."', '".$prezzo."', '".$immagine."')";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->close();
    
        $conn->close();

        header("Location: index.php");
        exit();

        
    } else {
        header("Location: add_prodotto.php");
        exit();
    }
?>
