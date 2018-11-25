<?php 
session_start();
?>

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
      <center><h1>Pets</h1></center>
       
      <hr>  
      
      <form action="createPet.php" method="post">
        <?php include("CamposFormPet.php"); ?>
        <button type="submit" class="btn btn-success"  data-toggle="tooltip" title="Adicionar"/>Adicionar</button>
        <button class="btn btn-default"/><a href="index.php">Voltar</a></button>
      </form>   
      <hr/>
    </div>
  </div>
</div>
</body>
<?php include("indexPet.php"); ?>
<center>
<table border="1">
<thead style="text-align: center; font-weight: bold">
    <tr><td>ID</td><td>Nome</td><td>Raça</td><td>Peso</td><td>Idade</td><td>Sexo</td><td colspan="2">Ações</td></tr>
    </thead>
    <tbody style="text-align: center">
        <?php
          foreach($dados as $i=>$v) {
            echo "<tr>";
            foreach ($v as $i2 => $v2) {
              echo "<td>$v2</td>";
            }
            echo "<td><button class='btn btn-info'/><a style='color:black; text-decoration:none;' href='editarPet.php?id={$v[0]}'>Editar</a></button></td>";
            echo "<td><button class='btn btn-danger'/><a style='color:black; text-decoration:none;' href='deletePet.php?id={$v[0]}'>Excluir</a></button></td></td>";
            echo "<tr>";
          }
        ?>
    </tbody>
    </table>
    </center>

    <hr>
    
    <?php
    $z = "Andre Martins";
    if(isset($_SESSION['username'])==$z)  
                {                  
                include_once("upload/FormUploadPet.php");
                ?>      
                
                <?php  
                } else { echo ";)";
                  
                }  
               
                ?>
    
<!-- <footer>
<br/><br/><br/><br/>
<br/><br/><br/><br/>
<br/><br/><br/><br/>
<br/><br/><br/><br/>
<center><p> sospet. desenvolvido por AJ2P. 2018 </p></center>
</footer> -->
<?php include_once("footer.php");?>
<script>
$(document).ready(function(){
        $("#logout").hide();
        });


</script>
</html>
</html>
