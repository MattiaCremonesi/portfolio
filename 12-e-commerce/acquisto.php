<?php
    session_start();
    if(isset($_POST['numero_carta']) && isset($_POST['metodo_pagamento'])) {
        $id_utente = $_SESSION['id_utente'];
        $numero_carta = $_POST['numero_carta'];
        $metodo_pagamento = $_POST['metodo_pagamento'];
        $prezzo = $_POST['prezzo'];

        date_default_timezone_set('Europe/Rome');
        $data_acquisto = date('Y-m-d');

        $conn = new mysqli("localhost","root","", "e-commerce");
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }
    
        $query = "INSERT INTO acquisto (id_utente, data_acquisto, metodo_pagamento, prezzo, numero_carta) VALUES ('".$id_utente."', '".$data_acquisto."', '".$metodo_pagamento."','".$prezzo."', '".$numero_carta."')";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->close();

        $elimina_carrello = "DELETE FROM carrello WHERE id_utente = ".$id_utente."";
        $conn->query($elimina_carrello);
    
        $conn->close();
        header("Location: index.php");
        exit();

        
    } else {
        header("Location: carrello.php?q='error'");
        exit();
    }
?>