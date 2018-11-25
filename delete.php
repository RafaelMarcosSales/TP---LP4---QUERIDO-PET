<?php
  if ($_SERVER["REQUEST_METHOD"]=="GET") {
  	$id=$_GET["id"];
  	include_once("deleteGet.php");
  } else if ($_SERVER["REQUEST_METHOD"]=="POST") {
  	$MensagemErro="Proprietário excluído";
	if (!isset($_POST["id"])) 
	{
		$MensagemErro="Parâmetros inválidos";
	}
	else
	{   $id=$_POST["id"];
		include_once("conexao.php");
		$con=abreConexao();
		$ps=mysqli_prepare($con,"DELETE FROM pet WHERE ID=?");
		mysqli_stmt_bind_param($ps,"i",$id);
		mysqli_stmt_execute($ps);
	}
    include_once("deletePost.php");
  } else {
  	include_once("erro.php");
  }
?>