      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
  <link rel="shortcut icon" href="img/animal-prints (1).png"/>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
		font-family:Tahoma, Geneva, sans-serif;
      /*background-color: #555;
      color: white;
      padding: 15px;*/
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>

<?php  
if(isset($_SESSION['username'])){?>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">sospet</a>
    </div>


    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="create.php">Clientes</a></li>
        <li><a href="createPet.php">Pets</a></li>
        <li><a href="createServ.php">Serviços</a></li>
        <li><a href="sobre.php">Sobre</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
        <?php  
if(isset($_SESSION['username'])){
  	?>
        <button type="button" name="logout" id="logout" class="btn btn-success btn-md" data-toggle="modal" data-target="#loginModal">SAIR</button>
    <?php  } else { ?>
        <button type="button" name="login" id="login" class="btn btn-success btn-md" data-toggle="modal" data-target="#loginModal">ENTRAR</button>
 <?php  } ?>
      </ul>
    </div>
  </div>
</nav>

        
    <?php  } else { ?>
      <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">sospet</a>
    </div>


    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="sobre.php">Sobre</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
        <?php  
if(isset($_SESSION['username'])){
  	?>
        <button type="button" name="logout" id="logout" class="btn btn-success btn-md" data-toggle="modal" data-target="#loginModal">SAIR</button>
    <?php  } else { ?>
        <button type="button" name="login" id="login" class="btn btn-success btn-md" data-toggle="modal" data-target="#loginModal">ENTRAR</button>
 <?php  } ?>
      </ul>
    </div>
  </div>
</nav>

       
 <?php  } ?>

