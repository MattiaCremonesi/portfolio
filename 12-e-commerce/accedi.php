<!DOCTYPE html>
<html>
  <head>
    <title>E-Commerce</title>
    <link rel = "stylesheet" href="style_accesso.css">
  </head>
    <body>
      <div class="container">
        <div class="divtitolo">
        <h1>Accedi al tuo account</h1>
        </div>
        <div class="div1">
        <form method="post" action="verifica_accesso.php">
            <label for="email">Username:</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br>

            <?php
              if (isset($_GET["q"])){
                echo "<p style='color:red;'>Username o Password errati</p>";
              }
            ?>
            <a href="registrazione.php">Non hai un account?</a><a href="index.php">Torna allo shop</a><br>
            <input type="submit" class = "button button5" value="Accedi">
        </form>

        </div>
      </div>
  </body>
</html>