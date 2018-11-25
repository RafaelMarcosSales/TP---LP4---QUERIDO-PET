<?php  
 session_start();
 date_default_timezone_set('America/Sao_Paulo');
 $connect = mysqli_connect("localhost", "root", "", "pet");  
 
 $uname = $_POST["username"];
 $pass = $_POST["password"];
 //$result="";
//$cont = 0;
 
 if(isset($_POST["username"]))  
 {  
      $query = "  
      SELECT user_nreal FROM usuario  
      WHERE user_log =?  
      AND user_pass =?
      ";  
      
      $stmt = mysqli_stmt_init($connect);
      if(!mysqli_stmt_prepare($stmt, $query)) {
          echo 'No';
      } else { 
          mysqli_stmt_bind_param($stmt,ss, $uname,$pass);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          foreach($result as $i => $value)
          {
          		$user = $value['user_nreal'];
          }
          $_SESSION['username'] = $user;
          //$cont +1;
          
      }
      
      if(mysqli_num_rows($result) > 0)  
      {  
           setcookie("uVisita",date('d/m/Y H:i:s'), (time()+ (3 * 24 * 3600)));                      
           echo 'Yes';
      }  
      else  
      {  
           echo 'No';  
      }  
 }  
 if(isset($_POST["action"]))  
 {  
      unset($_SESSION["username"]);
      //$cont=0;
      session_destroy();
 }  
 ?>  