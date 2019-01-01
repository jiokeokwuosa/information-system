<?php
session_start();
ob_start();
$status=false;

    if(! isset($_SESSION['login'])){
        header('Location:index.php');
    }
    
    require_once'functions.php';
    $db=new Database('localhost','christ4life','','fish');
    $db->connect();
    $status=true;
        


     
?>


<?php 
if($status){
       $result1=$db->select('item_order',array('session_id'=>session_id(),'print_status'=>'false'));
       $numrow=$db->numRow();
       if($numrow==0){
        echo("<h4>No Existing Record</h4>");
        
       } else{
          
 ?>
 <!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Owner" />

	<title>P.C Jopac Investment Ltd</title>    
    <link  href="css/style.css" rel="stylesheet" media="all" />
    <link  href="css/bootstrap.min.css" rel="stylesheet" media="all" /> 
    
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body style="margin-left: -5px;">
<div class="container-fluid">
   
    <div class="row" style="font-size: 12px;">
      <div class="col-md-2 center">
      <table style="width:25%;">
          <tr><td colspan="2"><img src="images/logo.png" width="30%"/></td></tr>
          
          <tr>
            <td colspan="2">  <span style="font-weight: bolder; font-size: 12px;">P.C JOPAC INVESTMENT LTD.</span></td>
          </tr>  
          
          <tr>
            <td colspan="2"><i class="glyphicon glyphicon-map-marker"></i>2 Pam-Pam Lane, Onitsha-Anambra State.<br /> <i class="glyphicon glyphicon-phone"></i>  08033125806, 08051027591 </td>
          </tr>
                        
          <tr><td colspan="2">&nbsp;</td></tr>
         
         <tr class="left">
             <th class="left">Item</th>
             <th class="left">Amount</th>
             <th class="left">No</th>
         </tr> 
         <?php
         $total=0;
         while($row=mysqli_fetch_assoc($result1)){
            extract($row); 
         ?>
         <tr>
             <td class="left"><?php echo ucwords(strtolower($db->getItemName($test_id)));?></td>
             <td class="left"><?php echo number_format($amount,0);?></td>
             <td class="left"><?php echo $num;?></td>
             <?php
             $total_amount=$amount*$num;             
             ?>
         </tr>
         
         <?php
         $total+=$total_amount;
         //$db->update('item_order',array('print_status'=>'true'),array('order_id'=>$order_id));
          }
         
         ?>
         <tr>
            <td class="left"><b>Total:</b></td>
            <td class="left"><b><?php echo number_format($total,0);?></b></td>
         
         </tr>
         <tr><td colspan="2">&nbsp;</td></tr> 
         <tr><td colspan="2" class="left"><b>Date:</b> <?php echo date('d-m-y',strtotime($date_received));?></tr>
         <tr><td colspan="2">&nbsp;</td></tr> 
         <tr><td colspan="2"class="left"><b>Account Officer's Id: <?php echo $_SESSION['id'];?></b></td></tr> 
         <tr><td colspan="2">&nbsp;</td></tr> 
         <tr><td colspan="2" class="left"><b>Sign..............................................</td></tr>
         <tr><td colspan="2" class="center"><b>Thank you for your patronage!!!</b></td></tr>    
     </table>
     
      </div>
      <div class="col-md-10">
      &nbsp;
      </div>    
 </div>
 
 
 <hr style="color: black;"/>
 
     <div class="row" style="font-size: 12px;">
      <div class="col-md-2 center">
      <table style="width:25%;">
          <tr><td colspan="2"><img src="images/logo.png" width="30%"/></td></tr>
          
          <tr>
            <td colspan="2">  <span style="font-weight: bolder; font-size: 12px;">P.C JOPAC INVESTMENT LTD.</span></td>
          </tr>  
          
          <tr>
            <td colspan="2"><i class="glyphicon glyphicon-map-marker"></i>2 Pam-Pam Lane, Onitsha-Anambra State.<br /> <i class="glyphicon glyphicon-phone"></i>  08033125806, 08051027591 </td>
          </tr>
                        
          <tr><td colspan="2">&nbsp;</td></tr>
         
         <tr class="left">
             <th class="left">Item</th>
             <th class="left">Amount</th>
             <th class="left">No</th>
         </tr> 
         <?php
         $result2=$db->select('item_order',array('session_id'=>session_id(),'print_status'=>'false'));
         $total=0;
         while($row=mysqli_fetch_assoc($result2)){
            extract($row); 
         ?>
         <tr>
             <td class="left"><?php echo ucwords(strtolower($db->getItemName($test_id)));?></td>
             <td class="left"><?php echo number_format($amount,0);?></td>
             <td class="left"><?php echo $num;?></td>
             <?php
             $total_amount=$amount*$num;             
             ?>
         </tr>
         
         <?php
         $total+=$total_amount;
         $db->update('item_order',array('print_status'=>'true'),array('order_id'=>$order_id));
          }
         
         ?>
         <tr>
            <td class="left"><b>Total:</b></td>
            <td class="left"><b><?php echo number_format($total,0);?></b></td>
         
         </tr>
         <tr><td colspan="2">&nbsp;</td></tr> 
         <tr><td colspan="2" class="left"><b>Date:</b> <?php echo date('d-m-y',strtotime($date_received));?></tr>
         <tr><td colspan="2">&nbsp;</td></tr> 
         <tr><td colspan="2"class="left"><b>Account Officer's Id: <?php echo $_SESSION['id'];?></b></td></tr> 
         <tr><td colspan="2">&nbsp;</td></tr> 
         <tr><td colspan="2" class="left"><b>Sign..............................................</td></tr>
         <tr><td colspan="2" class="center"><b>Thank you for your patronage!!!</b></td></tr>    
     </table>
     
      </div>
      <div class="col-md-10">
      &nbsp;
      </div>    
 </div>
 
    

   

</div>




</body>
</html>
 
    
    
    
<?php  
 
   }
  
}
 ?>
 