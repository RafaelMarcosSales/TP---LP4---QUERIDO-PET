<?php   
 session_start();
 
 ?>  
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <title>Sistema SOS PET</title>
  </head>
  <?php include("cabecalho.php"); ?>
  <body>
   <div class="container-fluid text-center">    
      <div class="row content">
    
      <!-- Centro -->
    <div class="col-sm-12 text-left"> 
    <?php  
                if(isset($_SESSION['username']))  
                {  
                ?>  
                <div align="center">  
                        <h1>Welcome - <?php echo $_SESSION['username']; ?></h1><br />

                </div>  
                <?php  
                } else { echo "<center><h1>Efetue o login.</h1></center>";
                }  
                ?>  
                
                <!-- Carousel -->

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                  <center><img src="img/pets1.jpg" alt="Pets" width="1200" height="800"></center>
                  </div>

                  <div class="item">
                  <center><img src="img/passaros.jpg" alt="Passaros" width="1200" height="800"></center>
                  </div>

                  <div class="item">
                    <center><img src="img/petnerd.jpg" alt="Pet Nerd" width="1200" height="800"></center>
                  </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>


 <!-- Carousel -->
 <br/> <br/> <br/>

              <center><p><b>O Gerencie sua loja com o SOSPET, para mais informações acesse: www.esite.com</p></b></center>
    
      
    </div>
  </div>
</div>
</body>
<?php include_once("footer.php");?>
</html>


 <div id="loginModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Login</h4>  
                </div>  
                <div class="modal-body">  
                     <label>Username</label>  
                     <input type="text" name="username" id="username" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" id="password" class="form-control" />  
                     <br />  
                     <button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#login_button').click(function(){  
           var username = $('#username').val();  
           var password = $('#password').val();  
           if(username != '' && password != '')  
           {  
                $.ajax({  
                     url:"logon.php",  
                     method:"POST",  
                     data: {username:username, password:password},  
                     success:function(data)  
                     {  
                          //alert(data);  
                          if(data == 'No')  
                          {  
                               alert("Wrong Data");  
                          }  
                          else  
                          {  
                               //$('#loginModal').hide();  
                               location.reload();  
                          }  
                     }  
                });  
           }  
           else  
           {  
                alert("Both Fields are required");  
           }  
      });  
      $('#logout').click(function(){  
           var action = "logout";  
           $.ajax({  
                url:"logon.php",  
                method:"POST",  
                data:{action:action},  
                success:function()  
                {  
                     location.reload();  
                }  
           });  
      });  
 });  
 </script>  
