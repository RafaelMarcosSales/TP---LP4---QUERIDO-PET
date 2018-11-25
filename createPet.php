<?php
  if ($_SERVER["REQUEST_METHOD"]=="GET") {
  	$id="";$nm="";$ra="";$pe="";$se="";$ida="";$do="";
  	include_once("createGetPet.php");
  } else if ($_SERVER["REQUEST_METHOD"]=="POST") {
  	$MensagemErro="Pet cadastrado";
	if (!isset($_POST["ID"]) || 
		!isset($_POST["NM"]) ||
		!isset($_POST["RA"])||
		!isset($_POST["PE"]) ||
		!isset($_POST["SE"]) ||
		!isset($_POST["IDA"]) ||
		!isset($_POST["DO"])  
	   ) 
	{
		$MensagemErro="Parâmetros inválidos";
	}
	else
	{
		//include_once("conexao.php");
		$con=abreConexao();
		$ps=mysqli_prepare($con,"INSERT INTO pet VALUES(?,?,?,?,?,?,?)");
		mysqli_stmt_bind_param($ps,"issssis",$id,$nm,$ra,$pe,$se,$ida,$do);
		$id=$_POST["ID"];
		$nm=$_POST["NM"];
		$ra=$_POST["RA"];
		$pe=$_POST["PE"];
		$se=$_POST["SE"];
		$ida=$_POST["IDA"];
		$do=$_POST["DO"];
		mysqli_stmt_execute($ps);
	}
    include_once("createPost.php");
  } else {
  	include_once("erro.php");
  }
?>