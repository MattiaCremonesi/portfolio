<!DOCTYPE html>
<html>
  <head>
    <title>E-Commerce</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_utente.css">
    <link rel="stylesheet" href="style_query.css">
  </head>
  <body>
  <div class="container_titolo">
    <a href="index.php">⬅️</a>
    <h2>Utente</h2>
    <?php
      session_start();
      echo "<h4>".$_SESSION['username']."</h4>"
    ?>
  </div>
  <div class="main_container_utente">
    <div class="container_utente">
        <h3>Profilo</h3>
        <?php
          $conn = new mysqli("localhost","root", "", "e-commerce");
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $id_utente = $_SESSION["id_utente"];

          $query = "SELECT Username, Email FROM utente WHERE Id = ".$id_utente."";
          $result = $conn->query($query);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<p>Username: ".$row['Username']."</p>";
              echo "<p>E-mail: ".$row['Email']."</p>";
            }
          } else {
            echo "0 results";
          }

        ?>
        <a href="logout.php">Logout</a>
    </div>
    <div class="container_acquisti">
        <h3>Acquisti passati</h3>
        <?php
          $query_acquisti = "SELECT * FROM acquisto WHERE id_utente = ".$id_utente.";";
          $result_acquisti = $conn->query($query_acquisti);
          if ($result_acquisti->num_rows > 0) {
            echo "<table class='styled-table'>";
              echo  "<thead>";
                echo "<tr>";
                  echo "<th>Metodo di Pagamento</th>";
                  echo "<th>Data di acquisto</th>";
                  echo "<th>Prezzo</th>";
                echo "</tr>";
              echo "</thead>";
            while($row_acquisti = $result_acquisti->fetch_assoc()) {
              echo "<tbody>";
                echo "<tr>";
                  echo "<td>".$row_acquisti['metodo_pagamento']."</td>";
                  echo "<td>".$row_acquisti['data_acquisto']."</td>";
                  echo "<td>".$row_acquisti['prezzo']."€</td>";
                echo "</tr>";
              
            }
            echo "</tbody>";
            echo "</table>";
          } else {
            echo "0 results";
          }
          $conn->close();
        ?>
    </div>
  </div>

  </body>
</html>