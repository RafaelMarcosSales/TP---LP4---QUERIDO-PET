<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Sistema SOS PET</title>
  </head>
  <?php include("cabecalho.php"); ?>
<div class="container-fluid text-center">    
  <div class="row content">
    
      <!-- Centro -->
    <div class="col-sm-12 text-left"> 
      <center><h1>Clientes</h1></center>
      <h1>Confirma exclusão?</h1>
        <form action="delete.php" method="post">
          <label>ID
            <input type="number" name="id" value="<?= $id ?>" readonly>
          </label>
          <input type="submit" value="Confirmar">
        </form>
    </div>
  </div>
</div>
</body>
<?php include_once("footer.php");?>
</html>