<?php
$status='false';
session_start();
require_once'functions.php';
if(isset($_POST['month'])){
  $_SESSION['month']=$_POST['month'];
  $_SESSION['year']=$_POST['year'];
   
   $db=new Database('localhost','christ4life','','fish');
   $db->connect();
   $result=$db->select('item_order',array('month'=>$_SESSION['month'],'year'=>$_SESSION['year'],'uploader_id'=>$_SESSION['id']));  
  
   
   if($db->numRow()==0){
    echo"<h2 class=center>No data Found</h2>";
   }else{
     $status='true'; 
      $result1=$db->select('item_update',array('month'=>$_SESSION['month'],'year'=>$_SESSION['year'],'uploader_id'=>$_SESSION['id']));
   }
    
}

if($status=='true'){   
  
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Owner" />

	<title></title>    
    <link rel="icon" href="images/logo.png" />
    <link  href="css/style.css" rel="stylesheet" media="all" />
    <link  href="css/bootstrap.min.css" rel="stylesheet" media="all" /> 
    
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row center">
        <img src="images/logo.png" width="15%"/>
    
    </div>
    
    <div class="row">
      <div class="col-md-12 center">
      <h3 class="center color" style="font-family: font1;">P.C. Jopac Investment Ltd.</h3><br /><p><i>Importers &amp; Exporters, Dealers in all kinds of Fishing Material</i></p>
      </div>
    </div>

    <div class="row" style="font-size: 17px;">
         <div class="col-md-12">
             <table style="width:100%">
                  <tr>
                      <td>Phone No: 08033125806, 08051027591</td>
                      <td class="right">Head Office: 2 Pam-Pam Lane, Onitsha - Anambra State</td>
                  </tr>
                  <tr>
                       <td>&nbsp;</td>
                       <td>&nbsp;</td>              
                  </tr>
             
             </table>
                  <h3 class="center color">Monthly Report for <?php echo $_SESSION['month'].'-'.$_SESSION['year'];?>, for Seller Id:<?php echo $_SESSION['id']?></h3>
         </div>      
    </div>
    
    <div class="row">
      <div class="col-md-12">
          <table style="width:100%; vertical-align: top; font-size: 18px;" rules="all" frame="box">
              <tr>
                    <th>S/N</th>
                    <th>Warehouse</th>
                    <th>ITem Name</th>
                    <th>Amount</th>
                    <th>Quantity</th>
                    <th>Seller ID</th>
                    <th>Time</th>
                                 
              </tr>
              
              <?php
               $counter=0;
               $total=0;
               while($row=mysqli_fetch_assoc($result)){
                $counter++;
                    extract($row);
                    ?>
                <tr>
                    <td><?php echo $counter;?></td>
                    <td><?php echo $db->getWarehouseName($warehouse_id);?></td>
                    <td><?php echo $db->getItemName($test_id);?></td>
                    <td><?php echo number_format($amount,0);?></td>
                    <td><?php echo $num;?></td>
                    <td><?php echo $uploader_id;?></td>
                    <td><?php echo date('h:ia',strtotime($date_received));?></td>
                    <?php
                     $total_amount=$amount*$num;  
                     $total+=$total_amount;           
                    ?>
                
                </tr>                   
                    
              <?php  
               }
              
              ?> 
              
              <tr>
              <td></td>
              
              </tr> 
              <tr>
              <td><b>Total:&nbsp;  N<?php echo number_format($total,0);?></b></td>
              
              </tr>        
          </table>    
      </div>    
    </div>
    <br />
     <h3 class="center color">Quantity Added This Month</h3>
   <div style="font-size: 18px;">
   <?php
    if(mysqli_num_rows($result1)>0){
       echo"<ol>"; 
       while($row1=mysqli_fetch_assoc($result1)){
        extract($row1);
         echo "<li>The initial quantity of ".$db->getItemName($test_id)."=".$quantity_before.", Added Quantity=".$quantity_added." in ".$db->getWarehouseName($warehouse_id)."</li>";
       }
       echo"</ol>"; 
    }else{
        echo("<h2>No Quantity was increased this month</h2>");
    }
   ?>  
   
  </div>  
   

</div>




</body>
</html>
<?php } 
?>