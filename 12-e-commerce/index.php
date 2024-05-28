<!DOCTYPE html>
<html>
  <head>
    <title>E-Commerce</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
  </head>
  <body>
    <div class="container_titolo">
      <?php
        session_start();
        if(isset($_SESSION['username'])) {
          echo "<a href='accedi.php'>" . $_SESSION['username'] . "</a>";
          echo "<a href='logout.php'>Logout</a>";
          if($_SESSION['username']=='admin') {
            echo "<a href='add_prodotto.php'>Aggiungi prodotto</a>";
          }
        } else {
          echo "<a href='accedi.php'>👤</a>";
        }
      ?>
      <h2>E-Commerce</h2>
      <a href="carrello.php">🛒</a>
    </div>
    <br>
    <div class="main_container">
  
    <?php
      $conn = new mysqli("localhost","root", "", "e-commerce");
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM Prodotto";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<div class='container' style='width:300px'>";
          echo "<img src=".$row["link_immagine"]."><br>";
          echo "<h4>".$row["nome"]."</h4>";
          echo "<p>".$row["descrizione"]."</p>";
          echo "<p>".$row["prezzo"]." €</p>";
          echo "<form method='post' action='aggiungi_carrello.php'>";
          echo "<input type='hidden' name='id_prodotto' value='".$row["Id"]."'>";
          echo "<button type='submit' class='button button5'>Aggiungi al carrello</button>";
          echo "</form>";
          echo "</div>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
    ?>
    </div>
  </body>
</html>
