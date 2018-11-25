<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Sistema SOS PET</title>
  </head> 
  <?php include("cabecalho.php"); ?>
  <body>
  <div class="container-fluid text-center">    
  <div class="row content">
    
      <!-- Centro -->
    <div class="col-sm-12 text-left"> 
      <center><h1>Editar</h1></center>
     
    <form action="editarPet.php" method="post">
      <?php include("CamposFormPet.php"); ?>
      <button type="submit" class="btn btn-info"  data-toggle="tooltip" title="Alterar"/>Alterar</button>
      <button class="btn btn-default"/><a href="index.php">Voltar</a></button>
      <!-- <!-- <input type="submit" name="Incluir">
      <a href="indexPet.php">Voltar</a>  -->
    </form>
    </div>
  </div>
</div>
</body>
<?php include_once("footer.php");?>
</html>