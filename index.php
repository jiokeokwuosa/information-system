<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Owner" />

	<title>P.C. JOPAC Investment Ltd.</title>
    <link  href="css/style.css" rel="stylesheet" media="all" />
    <link  href="css/bootstrap.min.css" rel="stylesheet" media="all" />  
    <link href="css/font-awesome.css" rel="stylesheet"/> 
    <style>
    body{width: 100%;background-image: url('images/1.jpg');background-size: 100%;}
    </style>   
       
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
</head>

<body>

<div class="container">
            <br><h4 class="title">Welcome</h4><br />
        <div class="col-md-12">
                
              <div class="main-agileits">
              <?php
                if(isset($_SESSION['c'])){
                 $error=$_SESSION['c'];
                 echo("<div class='alert alert-danger center' role='alert'>
                        <strong>Oops!</strong>
                        <br/>$error
                     </div>");
                 unset($_SESSION['c']);
                }elseif(isset($_SESSION['b'])){
                     echo("<div class='alert alert-danger center' role='alert'>
                            <strong>Oops!</strong>
                            <br/>Invalid Login Id/Password
                         </div>");
                     unset($_SESSION['b']);
                    }               
             ?>
                                        
                <form method="POST" action="transact.php">
                        
                     
                          <div class="key">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <input id="login_id" type="text" placeholder="Enter Login Id" name="login_id"  autofocus required=""/>
                                                          
                              <div class="clearfix"></div>
                          </div>
                         
                          <div class="key">
                              <i class="fa fa-lock" aria-hidden="true"></i>
                              <input id="password" type="password" placeholder="Enter Password"  name="password" required=""/>

                                                             
                              <div class="clearfix"></div>
                          </div>
                          
                          
                          
                          <div class="key1">                               
                              <input type="submit" name="action" value="Login"/>                              
                          </div>
                          
                </form>
                  
                  
            </div>
      
        </div>
        
       
      
    </div>


</body>
</html>