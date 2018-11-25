<?php
  if ($_SERVER["REQUEST_METHOD"]=="GET") {
  	$id="";$da="";$ho="";$tipo="";$cao="";
  	include_once("createGetServ.php");
  } else if ($_SERVER["REQUEST_METHOD"]=="POST") {
  	$MensagemErro="Serviço cadastrado";
	if (!isset($_POST["ID"]) || 
		!isset($_POST["DA"]) ||
		!isset($_POST["HO"])||
		!isset($_POST["TIPO"]) ||
		!isset($_POST["CAO"])  
	   ) 
	{
		$MensagemErro="Parâmetros inválidos";
	}
	else
	{
		include_once("conexao.php");
		$con=abreConexao();
		$ps=mysqli_prepare($con,"INSERT INTO servicos VALUES(?,?,?,?,?)");
		mysqli_stmt_bind_param($ps,"issss",$id,$da,$ho,$tipo,$cao);
		$id=$_POST["ID"];
		$da=$_POST["DA"];
		$ho=$_POST["HO"];
		$tipo=$_POST["TIPO"];
		$cao=$_POST["CAO"];
		mysqli_stmt_execute($ps);
	}
    include_once("createPost.php");
  } else {
  	include_once("erro.php");
  }
?>
