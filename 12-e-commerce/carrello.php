<!DOCTYPE html>
<html>
  <head>
    <title>E-Commerce</title>
    <link rel="stylesheet" href="style_carrello.css">
    <meta charset="UTF-8">
  </head>
  <body>
    <div class="container_titolo">
      <?php
        session_start();
        if (!isset($_SESSION["username"])){
            header("Location: accedi.php");
            exit();
        }
      ?>
      <a href="index.php">⬅️</a>
      <h2>Carrello</h2>
      <?php
        echo "<h4>".$_SESSION['username']."</h4>"
      ?>
    </div>
    <br>
    <div class="main">
    <div class="container_acquisto">
      <h3>Pagamento</h3>
    </div>
    <div class="main_container">
    <?php
      $conn = new mysqli("localhost","root", "", "e-commerce");
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $id_utente = $_SESSION["id_utente"];

      $query = "SELECT id_prodotto FROM carrello WHERE id_utente = ".$id_utente."";
      $risultato = $conn->query($query);
      
        while($row_prodotto = $risultato->fetch_assoc()) {
            $query_prodotto = "SELECT * FROM prodotto WHERE Id = ".$row_prodotto["id_prodotto"]."";
            $risultato_prodotto = $conn->query($query_prodotto);
            $prodotto = $risultato_prodotto->fetch_assoc();
            echo "<div class='container' style='width:300px'>";
            echo "<img src=".$prodotto["link_immagine"]."><br>";
            echo "<h4>".$prodotto["nome"]."</h4>";
            echo "<p>".$prodotto["descrizione"]."</p>";
            echo "<p>".$prodotto["prezzo"]." €</p>";
            echo "</div>";          
        }
      $conn->close();
    ?>
    </div>
    </>
  </body>
</html>