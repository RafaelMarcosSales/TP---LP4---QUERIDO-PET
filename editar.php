<?php
  include("conexao.php");
  if (!$con=abreConexao()) {
  	$MensagemErro="Erro conexao";
  	include_once("erro.php");
  } else {
  	// editar.php
  	if ($_SERVER["REQUEST_METHOD"]=="GET") {
  		$ps=mysqli_prepare($con,"select * from dono where id=?");
  		mysqli_stmt_bind_param($ps,"i",$id);
  		$id=$_GET["id"];
  		mysqli_stmt_execute($ps);
  		mysqli_stmt_bind_result($ps,$id,$nm,$cpf,$ed,$te,$ce);
  		mysqli_stmt_fetch($ps);
  		include_once("editarGet.php");
  	} else if ($_SERVER["REQUEST_METHOD"]=="POST") {
     	$MensagemErro="Pet alterado";
	    if (!isset($_POST["ID"]) || 
		    !isset($_POST["NM"]) ||
		    !isset($_POST["CPF"])||
                    !isset($_POST["ED"])||
                    !isset($_POST["TE"])||
                    !isset($_POST["CE"])
	       )  
	    {
		  $MensagemErro="Parâmetros inválidos";
		  include_once("erro.php");
	    } else {
  		  $ps=mysqli_prepare($con,"update dono set nome=?, cpf=?, endereco=?, telefoneF=?, telefoneC=? where id=?");
  		  mysqli_stmt_bind_param($ps,"sssssi",$_POST["NM"],$_POST["CPF"],$_POST["ED"],$_POST["TE"],$_POST["CE"], $_POST["ID"]);
  		  mysqli_stmt_execute($ps);
    	  include_once("editarPost.php");	    	
	    }
  	} else {
  		include_once("erro.php");
  	}
  }
?>