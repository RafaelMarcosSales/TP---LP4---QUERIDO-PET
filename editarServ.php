<?php
  include("conexao.php");
  if (!$con=abreConexao()) {
  	$MensagemErro="Erro conexao";
  	include_once("erro.php");
  } else {
  	// editar.php
  	if ($_SERVER["REQUEST_METHOD"]=="GET") {
  		$ps=mysqli_prepare($con,"select * from servicos where id=?");
  		mysqli_stmt_bind_param($ps,"i",$id);
  		$id=$_GET["id"];
  		mysqli_stmt_execute($ps);
  		mysqli_stmt_bind_result($ps,$id,$da,$ho,$tipo,$cao);
  		mysqli_stmt_fetch($ps);
  		include_once("editarGetServ.php");
  	} else if ($_SERVER["REQUEST_METHOD"]=="POST") {
     	$MensagemErro="Pet alterado";
	    if (!isset($_POST["ID"]) || 
		    !isset($_POST["DA"]) ||
		    !isset($_POST["HO"])||
                    !isset($_POST["TIPO"])||
                    !isset($_POST["CAO"])
	       )  
	    {
		  $MensagemErro="Parâmetros inválidos";
		  include_once("erro.php");
	    } else {
  		  $ps=mysqli_prepare($con,"update servicos set data=?, hora=?, tiposervico=? where id=?");
            mysqli_stmt_bind_param($ps,"sssi",$_POST["DA"],$_POST["HO"],$_POST["TIPO"], $_POST["ID"]);
  		  mysqli_stmt_execute($ps);
    	  include_once("editarPost.php");	    	
	    }
  	} else {
  		include_once("erro.php");
  	}
  }
?>