<!DOCTYPE html>
<html>
  <head>
    <title>E-Commerce</title>
    <link rel = "stylesheet" href="style_accesso.css">
  </head>
    <body>
      <div class="container">
        <div class="divtitolo">
        <h1>Registrati</h1>
        </div>
        <div class="div1">

        <form method="post" action="crea_utente.php">

            <label for="email">Username:</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br>

            <a href="accedi.php">Hai già l'account?</a><a href="index.php">Torna allo shop</a><br>
            <input type="submit" class = "button button5" value="Sign in">
        </form>

      </div>
  </body>
</html>