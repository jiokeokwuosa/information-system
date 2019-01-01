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
    
    
    
    if(isset($_POST['action'])){
        $values=array();
        for($i=1; $i<count($_POST['member'])+1;  $i++){
                         
              if(@$_POST['member'][$i]['item']=='on'){                   
                  $values[]= $_POST['member'][$i]['order_id'];
                  $status=true;                  
              }
             
          // $subject_name=$db->getSubjectName1($_POST['member'][$i]['subject_id']);
           //$values[]='("'.$_POST['member'][$i]['reg_number'].'","'.$_POST['member'][$i]['session_id'].'","'.$_POST['member'][$i]['term_id'].'","'.$_POST['member'][$i]['class_id'].'","'.$_POST['member'][$i]['subject_id'].'","'.$_POST['member'][$i]['assesment_score'].'","'.$_POST['member'][$i]['exam_score'].'","'.$_POST['member'][$i]['uploader'].'")'; 
        }
       
    }
    
    
   


     
?>


<?php 
if($status){
    $item=array();
    $amt=array();
    $quantity=array();
      for($i=0; $i<count($values); $i++){
        $result1=$db->select('item_order',array('order_id'=>$values[$i]));
        $row=mysqli_fetch_assoc($result1);
        extract($row);
        $item[]=$db->getItemName($test_id);
        $amt[]=$amount;
        $quantity[]=$num;        
      }
       
  
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
         for($i=0; $i<count($values); $i++){
            
         ?>
         <tr>
             <td class="left"><?php echo ucwords(strtolower($item[$i]));?></td>
             <td class="left"><?php echo number_format($amt[$i],0);?></td>
             <td class="left"><?php echo number_format($quantity[$i],0);?></td>
             <?php
            //
            
             $total_amount=$amt[$i]*$quantity[$i];    
            
                         
             ?>
         </tr>
         
         <?php
         $total+=$total_amount;
         
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
         <tr><td colspan="2" class="left"><b>............................................................</td></tr>
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
  


 ?>
 