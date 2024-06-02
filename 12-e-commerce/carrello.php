<!DOCTYPE html>
<html>
  <head>
    <title>E-Commerce</title>
    <link rel="stylesheet" href="style_carrello.css">
    <link rel="stylesheet" href="style_query.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <?php
    ?>
    <div class="main_container">

      <div class="product_container">
      <?php
        $conn = new mysqli("localhost","root", "", "e-commerce");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $id_utente = $_SESSION["id_utente"];

        $query = "SELECT id_prodotto, count(id_prodotto) as quantita FROM carrello WHERE id_utente = ".$id_utente." GROUP BY id_prodotto";
        $risultato = $conn->query($query);
        $somma_totale = 0;
        $controllo_carrello = 0;
            while($row_prodotto = $risultato->fetch_assoc()) {
                $query_prodotto = "SELECT * FROM prodotto WHERE Id = ".$row_prodotto["id_prodotto"]."";
                $risultato_prodotto = $conn->query($query_prodotto);
                $prodotto = $risultato_prodotto->fetch_assoc();

                $somma_totale = $somma_totale + ($prodotto["prezzo"]*$row_prodotto["quantita"]);
                echo "<div class='prodotto' style='width:300px;'>";
                echo "<img src=".$prodotto["link_immagine"]."><br>";
                echo "<h4>".$prodotto["nome"]."</h4>";
                echo "<p>".$prodotto["descrizione"]."</p>";
                echo "<p>".$prodotto["prezzo"]." €</p>";
                echo "<p>".$row_prodotto["quantita"]." </p>";
                echo "</div>"; 
                $controllo_carrello = 1;   
                     
            }
        $conn->close();
      ?>
      
      </div>
      <?php
        if($controllo_carrello == 1){
      ?>
      <div class='container_acquisto'>
          <h3>Pagamento</h3>    
          <?php    
          echo "<p>Totale carrello: ".$somma_totale."€</p>"
          ?>
          <form method='post' action='acquisto.php'>
          <input type="radio" id="paypal" name="metodo_pagamento" value="Paypal">
          <label for="paypal">Paypal</label>
          <input type="radio" id="carta" name="metodo_pagamento" value="Carta">
          <label for="carta">Carta</label>
          <input type="radio" id="satispay" name="metodo_pagamento" value="Satispay">
          <label for="satispay">Satispay</label><br><br>
          <label for="numero_carta">Numero carta/conto:</label>
          <input type="text" name="numero_carta" id="numero_carta"><br>
          <?php
          echo "<input type='hidden' name='prezzo' value='".$somma_totale."'>";
          ?>
          <a href='svuota_carrello.php'>Svuota carrello</a>
          <button type='submit' class='button button5'>Acquista</button>
          <br><br>
        </form>  
      </div>
      <?php
        }else{
          
        }
      ?>
    </div>
  </body>
</html>