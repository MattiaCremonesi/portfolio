<!DOCTYPE html>
<html>
  <head>
    <title>E-Commerce</title>
    <link rel="stylesheet" href="style_accesso.css">
    <meta charset="UTF-8">
  </head>
  <body>
  <a href="index.php">Torna allo shop</a>
    <div class="container_titolo">
      <h2>Aggiungi prodotto</h2>
    </div>
    <div class="container_addprod">
        <br>
        <form method="post" action="add_prod.php">
            <label for="nome">Nome prodotto:</label>
            <input type="text" name="nome_prodotto" id="username"><br>
            <label for="descrizione">Breve descrzione:</label>
            <input type="text" name="descrizione" id="descrizione"><br>
            <label for="quantity">Prezzo:</label>
            <input type="number" id="prezzo" name="prezzo" step="0.01"><br>
            <label for="immagine">Link immagine:</label>
            <input type="text" name="immagine" id="immagine"><br>
            <input type="submit" class = "button button5" value="Aggiungi">
        </form>
    </div>
    
  </body>
</html>
