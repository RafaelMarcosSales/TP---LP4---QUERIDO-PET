<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Sistema SOS PET</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <?php include("cabecalho.php"); ?>
  <body>
  <div class="container-fluid text-center">    
  <div class="row content">
    
      <!-- Centro -->
    <div class="col-sm-12 text-left"> 
      <center><h1>Clientes</h1></center>
      
      <?php $Uvisita= filter_input(INPUT_COOKIE,"uVisita"); ?>      
      <h3>Sua ultima visita foi em: <?php echo $Uvisita; ?></h3>      
      <hr>  
      
      <form action="create.php" method="post">
     
        <?php include("CamposForm.php"); ?>
        
        <button type="submit" class="btn btn-success"  data-toggle="tooltip" title="Adicionar"/>Adicionar</button>
        <!-- <input type="submit" value="Incluir"> -->
        
        <button class="btn btn-default"/><a href="index.php">Voltar</a></button>
      
      </form>
      <hr/>   
      
    </div>
  </div>
</div>
</body>
<?php include_once("indexGet.php");?>
<center>
    <table class="table-bordered table-hover">
        <thead style="text-align: center; font-weight: bold">
            <tr><td>ID</td><td>Nome</td><td>CPF</td><td>Endereço</td><td>Telefone</td><td>Celular</td><td colspan="2">Ações</td></tr>
        </thead>
        <tbody style="text-align: center">
            <?php
            foreach ($dados as $i => $v) {
                echo "<tr>";
                foreach ($v as $i2 => $v2) {
                    echo "<td>$v2</td>";
                }


                echo "<td><button class='btn btn-info'/><a style='color:black; text-decoration:none;' href='editar.php?id={$v[0]}'>Editar</a></button></td>";
                echo "<td><button class='btn btn-danger'/><a style='color:black; text-decoration:none;' href='delete.php?id={$v[0]}'>Excluir</a></button></td></td>";
                echo "<tr>";
            }
            ?>
    </table>        
    </center>
<hr>
    
    <?php
    $z = "Andre Martins";
    if(isset($_SESSION['username'])==$z)  
                {                  
                include_once("upload/FormUploadCliente.php");
                ?>      
                
                <?php  
                } else { echo ";)";
                  
                }  
               
                echo "---------------------------------";
            
                ?>
                
    <?php include_once("footer.php");?>
<!-- <footer>
<br/><br/><br/><br/>
<br/><br/><br/><br/>
<br/><br/><br/><br/>
<br/><br/><br/><br/>
<center><p> sospet. desenvolvido por AJ2P. 2018 </p></center>
</footer> -->
<script>
$(document).ready(function(){
        $("#logout").hide();
        });


</script>
</html>
