<?php
  if ($_SERVER["REQUEST_METHOD"]=="GET") {
  	$id="";$nm="";$cpf="";$ed="";$te="";$ce="";
  	include_once("createGet.php");
  } else if ($_SERVER["REQUEST_METHOD"]=="POST") {
  	$MensagemErro="Proprietário cadastrado";
	if (!isset($_POST["ID"]) || 
		!isset($_POST["NM"]) ||
		!isset($_POST["CPF"])||
		!isset($_POST["ED"]) ||
		!isset($_POST["TE"]) ||
		!isset($_POST["CE"])  
	   ) 
	{
		$MensagemErro="Parâmetros inválidos";
	}
	else
	{
		include_once("conexao.php");
		$con=abreConexao();
		$ps=mysqli_prepare($con,"INSERT INTO dono VALUES(?,?,?,?,?,?)");
		mysqli_stmt_bind_param($ps,"isssss",$id,$nm,$cpf,$ed,$te,$ce);
		$id=$_POST["ID"];
		$nm=$_POST["NM"];
		$cpf=$_POST["CPF"];
		$ed=$_POST["ED"];
		$te=$_POST["TE"];
		$ce=$_POST["CE"];
		mysqli_stmt_execute($ps);
	}
    include_once("createPost.php");
  } else {
  	include_once("erro.php");
  }
?>