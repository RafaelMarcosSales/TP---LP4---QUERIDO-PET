<?php
  if (isset($con)) {
  	$MensagemErro="Erro conexao";
  	include_once("erro.php");
  } else {
        include("conexao.php");
  	$con = abreConexao();
  	if ($_SERVER["REQUEST_METHOD"]=="GET") {
  		$ps=mysqli_prepare($con,"select id,nome,raca, peso, idade, sexo, iddono from pet where id=?");
                mysqli_stmt_bind_param($ps,"i",$id);
                $id=$_GET["id"];
  		mysqli_stmt_execute($ps);
  		mysqli_stmt_bind_result($ps,$id,$nm,$ra,$pe,$ida,$se,$do);
  		mysqli_stmt_fetch($ps);
  		include_once("editarGetPet.php");
  	} else if ($_SERVER["REQUEST_METHOD"]=="POST") {
     	$MensagemErro="Pet alterado";
	    if (!isset($_POST["ID"]) || 
		    !isset($_POST["NM"]) ||
		    !isset($_POST["RA"])||
        !isset($_POST["PE"])||
        !isset($_POST["IDA"])||
        !isset($_POST["DO"])
	       )  
	    {
		  $MensagemErro="Parâmetros inválidos";
		  include_once("erro.php");
	    } else {
  		  $ps=mysqli_prepare($con,"update pet set nome=?, raca=?, peso=?, idade=?, sexo=?, dono=? where id=?");
  		  mysqli_stmt_bind_param($ps,"ssdsii",$_POST["NM"],$_POST["RA"],$_POST["PE"],$_POST["IDA"],$_POST["DO"],$_POST["ID"]);
  		  mysqli_stmt_execute($ps);
    	  include_once("editarPost.php");	    	
	    }
  	} else {
  		include_once("erro.php");
  	}
  }
?>