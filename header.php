<?php
session_start();
require_once'functions.php';

if(! isset($_SESSION['login'])){
      header('location:index.php');  
}
$title='';
if(isset($_SESSION['access_level'])){
    if($_SESSION['access_level']=='1'){
        $title='Staff';
    }elseif($_SESSION['access_level']=='2'){
        $title='Admin';
       }
}
   
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
    body{width: 100%;background-image: url('images/b.gif');background-size: 100%; }
    </style>   
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <header id="header1">
     <div class="container">
        <div class="row">
            <div class="col-md-6"><i class="glyphicon glyphicon-phone"></i>  08033125806, 08051027591</div>
            <div class="col-md-6 right">
            <i class="glyphicon glyphicon-time"></i>
             <?php 
        		//$time=time();
        		$actualtime=date('F j, Y', strtotime('now'));
        		echo $actualtime;
        	 ?>&nbsp;&nbsp;&nbsp;
             <i class="glyphicon glyphicon-map-marker"></i> 2 Pam-Pam Lane, Onitsha - Anambra State, Nigeria.
            
            
            </div>
        
        </div>
     
     </div>
    </header>
    
    <header id="header2">
        <div class="container">
              <div class="row">
                    <div class="col-md-6"><br />
                        <a href="index.php"><img src="images/banner.png" width="98%" class="img-responsive"/></a>
                    </div>
                    <div class="col-md-6 right clearlink">
                        <?php
                         
                            if(isset($_SESSION['login'])){
                                $db=new Database('localhost','christ4life','','fish');
                                $db->connect();
                                echo "Welcome ".$db->getStatus($_SESSION['access_level']);
                        ?>                      
                         | <a href="transact.php?action=logout">LogOut</a> 
                          
                          
                          <?php
                            }
                          ?>
                    </div>
              
              </div>
        </div>
    </header><br />
    <header id="header3">
    
    
    
    </header>


<br />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 user-agileits" style="color: #000033; font-size: 20px; font-family: font2;">                           
                        <h2 class="center color" style="font-family: font1;"><?php echo $title;?>'s Dashboard</h2><br />
                    <div class="button">   
                     <ul>
                        <li><a href="index1.php"><i class="fa fa-home " style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home/Sales</a></li>
                        <?php if($_SESSION['access_level']=='2'){?>   
                       <div class="y"> <li><a href="newstaff.php"><i class="fa fa-user-md" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Register</a></li>  </div> 
                       <div class="z"><li><a href="staff.php"><i class="fa fa-list-ol" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Staff Account</a></li> </div>
                       <div class=""><li><a href="warehouse.php"><i class="fa fa-list-ol" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Warehouses</a></li> </div>
                        <div class="y"> <li> <a href="warehouseitems.php"><i class="fa fa-list-ul" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Warehouse Item(s)</a></li></div> 
                        <div class="z"> <li><a href="barreport.php"><i class="fa fa-file" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;General POS Report</a></li> </div>           
                                              
                       <?php }?> 
                       
                       <?php if($_SESSION['access_level']=='1' or $_SESSION['access_level']=='2'){?>  
                       
                        <div class=""> <li><a href="barreport1.php"><i class="fa fa-file" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;User POS Report</a></li> </div>                 
                   <?php }?>              
                       <div class="y">  <li> <a href="changepassword.php"><i class="fa fa-key" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Change Password</a></li></div>
                         <div class="z"> <li><a href="reprint1.php"><i class="fa fa-list-ol" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Order Reprint</a></li> </div>  
                         <div class=""> <li><a  href="transact.php?action=logout"><i class="fa fa-power-off" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></li></div>
                                    
                    
                     </ul>
                    </div> 
                                      
                         
                     
                 
                                  
                    </div>
             
                    
                    <div class="col-md-9">
                      <h2 class="center color" style="font-family: font1;" ><?php echo $title;?>'s Dashboard</h2>
                    
                   



