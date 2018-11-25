<?php
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
    $ps=mysqli_prepare($con,"select id, nome, raca, peso, idade, sexo from pet limit ?,?"); // prepara e envia comando ao banco de dados. O parâmetros (?) indicam, respectivamente, o primeiro registo a ser recuperado e a quantidade de registros.
    mysqli_stmt_bind_param($ps, "ii", $inicioPagina,$tamanhoPagina);
    mysqli_stmt_execute($ps); // executa comando SELECT
    mysqli_stmt_bind_result($ps,$id,$nm,$ra,$pe,$ida,$se); // associa variáveis às colunas resultantes do SELECT.
    while (mysqli_stmt_fetch($ps)) { 
        array_push($dados, [$id,$nm, $ra, $pe, $ida, $se]);
    }
    }
?>