<?php
include("conexao.php");
  $erro = array();
  if ($_FILES) { // Se $_FILES diferente de vazio, equivale a true

    /*
       Preparação do comando SQL Insert para inserir os dados do arquivo na tabela Mysql. 
       Referência: http://php.net/manual/pt_BR/mysqli.prepare.php
    */
    $con = abreConexao(); // Conexão
    $ps=mysqli_prepare($con,"insert into dono values(?,?,?,?,?,?)"); // Preparação
    // Liga variáveis aos parâmetros do Insert (ou seja, as ?)
    mysqli_stmt_bind_param($ps,"isssss",$id,$nm,$cpf,$ed,$te,$ce);

    /* Copia arquivo
       move_uploaded_file(ArquivoOrigem,ArquivoDestino) 
       Referência: http://php.net/manual/pt_BR/function.move-uploaded-file.php
    */
    $status = move_uploaded_file(  // Se erro retorna FALSE.
      $_FILES["arq1"]["tmp_name"], // ArquivoOrigem
      "arquivo/".$_FILES["arq1"]["name"]); // ArquivoDestino

    if ($status) {
      /*
      A função fopen abre arquivo. Neste exemplo o arquivo é aberto apnas para leitura (segundo parâmetro "r").
      Referência: http://php.net/manual/pt_BR/function.fopen.php
      */
      $a = fopen("arquivo/".$_FILES["arq1"]["name"],"r");
      if ($a) { // Retorna um recurso de ponteiro de arquivo em caso de sucesso, ou FALSE em caso de erro.
        // Referência: https://www.w3schools.com/php/func_filesystem_fgetcsv.asp
        $lin = fgetcsv($a,100,";"); // Desconsidera 1a linha de títulos
        $lin = fgetcsv($a,100,";");
        while($lin!=null) {
          // Atribui valores às vriáveis ligadas ao Insert preparado 
          //mysqli_stmt_bind_param($ps,"isssss",$id,$nm,$cpf,$ed,$te,$ce);
          //$teste = 0;
          $id = $lin[0];
          $nm = $lin[1];
          $cpf = $lin[2];
          $ed = $lin[3];
          $te = $lin[4];
          $ce = $lin[5];
          // Execução do Insert compementado com os dados nas variáveis ligadas
          if (!mysqli_stmt_execute($ps)) {
            $erro[count($erro)]="Linha ID={$lin[0]} não inserida";
          }
          $lin = fgetcsv($a,100,";");
        }
        fclose($a);
      }      
    }
  }
?>
<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <title>Upload</title>  
  </head>
  <body>
    <h3>
      <?php
        foreach($erro as $i=>$v) {
          echo $v."<br/>";
        }
      ?>
   </h3>
      <p><a href="http://localhost/tp-php/create.php">Voltar</a></p>
  </body>
</html>