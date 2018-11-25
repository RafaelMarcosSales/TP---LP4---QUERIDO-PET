<?php
/* Neste arquivo está o código PHP que busca no banco dados sobre os alunos cadastrados. É usado o recurso de paginação com qunatidade de linas conforme $tamanhoPagina. Todo o código HTML fica em outro arquivo (indexGet.php), separando assim a apresentação do processamento dos dados. Para executar, criar o banco de dados ESCOLA e a tabela CREATE TABLE ALUNO(ID INT NOT NULL PRIMARY KEY, NOME VARCHAR(100) NOT NULL, ENDERECO VARCHAR(100) NOT NULL) */

  $tamanhoPagina=5;
  $inicioPagina=0;
  if (isset($_SERVER["PATH_INFO"])) {
    $pinfo = explode("/",$_SERVER["PATH_INFO"]);  
    if (isset($pinfo[1]) && isset($pinfo[2])) {
      if ($pinfo[1]=="Proxima") {
        $inicioPagina = (int)$pinfo[2] + $tamanhoPagina;
      } else if ($pinfo[1]=="Anterior") {
        $inicioPagina = (int)$pinfo[2] - $tamanhoPagina;
        if ($inicioPagina<0) $inicioPagina=0; 
      }
    }
  }
  include_once("conexao.php"); // contém a função abreConexao
  if (!$con = abreConexao()) { // estabelece conexao com banco de dados
    $MensagemErro="Erro de conexão";
    include_once("erro.php"); // página de erro
  } else {
    $dados = array(); // armazena dados de 10 alunos recuperados do bando de dados
    $ps=mysqli_prepare($con,"select id, data, hora, tipoconsulta from servicos limit ?,?"); // prepara e envia comando ao banco de dados. O parâmetros (?) indicam, 
    //respectivamente, o primeiro registo a ser recuperado e a quantidade de registros.
    mysqli_stmt_bind_param($ps,"ii",$inicioPagina,$tamanhoPagina);
    mysqli_stmt_execute($ps); // executa comando SELECT
    mysqli_stmt_bind_result($ps,$id, $dt, $tm, $tc); // associa variáveis às colunas resultantes do SELECT.
    while(mysqli_stmt_fetch($ps)) // obtém 1 linha do resultado do SELECT, retorna FALSE quando não existirem mais linhas.
    
      array_push($dados,array($id, $dt, $tm, $tc)); // inclui linha no vetor, que será usado em indexGet.php
    }
?>