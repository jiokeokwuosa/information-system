<?php
require_once'header.php';

if(isset($_GET['warehouse'])){   
    $_SESSION['warehouse']=$_GET['warehouse'];
}elseif(isset($_SESSION['warehouse'])){
    $warehouse=$_SESSION['warehouse'];    
  }else{
    header("location:index1.php");
    } 
    
    if($_SESSION['warehouse']==1){        
        $_SESSION['table']='test';
    }elseif($_SESSION['warehouse']==2){
         $_SESSION['table']='test2';
        }elseif($_SESSION['warehouse']==3){
             $_SESSION['table']='test3';
            }elseif($_SESSION['warehouse']==4){
                     $_SESSION['table']='test4';
                }elseif($_SESSION['warehouse']==5){
                     $_SESSION['table']='test5';
                    }elseif($_SESSION['warehouse']==6){
                         $_SESSION['table']='test6';
                        }elseif($_SESSION['warehouse']==7){
                                 $_SESSION['table']='test7';
                            }elseif($_SESSION['warehouse']==8){
                                     $_SESSION['table']='test8';
                                }elseif($_SESSION['warehouse']==9){
                                         $_SESSION['table']='test9';
                                    }elseif($_SESSION['warehouse']==10){
                                             $_SESSION['table']='test10';
                                        }
 
 $db=new Database('localhost','christ4life','','fish');
 $db->connect();  
 $house=$db->getWarehouseName($_SESSION['warehouse']);
?>


<div class="row">
<?php 
if(isset($_SESSION['a'])){
  echo("<div class='alert alert-danger center' role='alert'>
        <strong>Oops!</strong>
        <br/>Error adding order
       </div>");
  unset($_SESSION['a']);
}elseif(isset($_SESSION['b'])){
      echo("<div class='alert alert-success center' role='alert'>
            <strong>Congratulations!</strong>
            <br/>Order added
           </div>");
      unset($_SESSION['b']);
    }elseif(isset($_SESSION['c'])){
      echo("<div class='alert alert-danger center' role='alert'>
            <strong>Oops!</strong>
            <br/>Insufficient Quantity, Only ". $_SESSION['u']." quantity remaining.
           </div>");
      unset($_SESSION['c']);
      unset($_SESSION['u']);
     }elseif(isset($_SESSION['e'])){
          echo("<div class='alert alert-success center' role='alert'>
                <strong>Order Removed</strong>
                <br/>Order added
               </div>");
          unset($_SESSION['e']);
        }elseif(isset($_SESSION['f'])){
              echo("<div class='alert alert-success danger' role='alert'>
                    <strong>Oops!!!</strong>
                    <br/>Error Occured
                   </div>");
              unset($_SESSION['f']);
            }
    
       $result5=$db->select($_SESSION['table'],array());
       $numrow=$db->numRow();
       if($numrow==0){
        echo("<h4><center>No Existing Record</center></h4>");
        
       }else{
        ?>
     <center><table style="width:30%" rules="all" frame="border">
            <h3>Items in <?php echo $house;?></h3>
             <tr class="left"  style="background-color: #000033; color: white; text-align: center;">
                 <th>S/N</th>
                 <th class="left">Item</th>
                 <th class="left">Amount</th>
                 <th class="left">Quantity</th>                
             </tr>  
        
        
        
        <?php
            $counter=0;
            while($row=mysqli_fetch_assoc($result5)){
                extract($row);
               ?> 
              <tr>
                <td><?php echo ++$counter;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $price;?></td>
                <td><?php echo $quantity;?></td>              
              </tr>  
            
      
        
        
        
        
        
       <?php } 
       ?>
       </table></center><br />
       <?php
         }
       
            
       
       $result1=$db->select('item_order',array('session_id'=>session_id(),'print_status'=>'false'));
       $numrow=$db->numRow();
       if($numrow==0){
        echo("");
        
       }else{
        ?>
      <center>  <table style="width:30%" rules="all" frame="border">
      <h4>Item on Cart</h4>
        <a name="ok"></a>
         <tr class="left"  style="background-color: #000033; color: white; text-align: center;">
             <th class="left">Item</th>
             <th class="left">Amount</th>
             <th class="left">Quantity</th>
             <th class="left">Total</th>
             <th class="left">Delete</th>
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
              $total+=$total_amount;            
             ?>
             <td class="left"><?php echo number_format($total_amount,0);?></td>
             <td> <form action="transact.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $order_id;?>" />
                    <input type="hidden" name="warehouse_id" value="<?php echo $warehouse_id;?>" />
                    <input type="hidden" name="test_id" value="<?php echo $test_id;?>" />
                    <input type="hidden" name="quantity" value="<?php echo $num;?>" />                    
                    <input type="submit" value="Delete" name="action"/>
                  </form>
             </td>
         </tr>
         
         
             
      
      <?php
       }
     ?>
         <tr>
            <td class="left"><b>Total:</b></td>
            <td class="left"><b><?php echo number_format($total,0);?></b></td>
         
         </tr>
      </table>
      </center><br />
     <?php
      }
?>

<h3 class="center color">Order Item(s)</h3>
 <div class="col-md-4"></div>
<form action="transact.php" method="post" name="orderItems"> 
 <div class="col-md-4 user-agileits contact-left cont" style="text-align: center;">
     <select name="test_id" style="margin-bottom: 20px;" required="" class="keyword1">
      <?php
        
         
         echo $db->listitems($_SESSION['table']);
      ?>
     
     </select><br />
     <input type="text" placeholder="Amount" name="amount" id="amount" style="margin-bottom: 20px;" required="" /><br />
     <input type="number" name="num" placeholder=" Enter Quantity" style="margin-bottom: 20px;" required=""/> <br />
     <input type="submit" name="action" value="Order Item" style="display: none;" id="Order Item"/>
     <label for="Order Item" class="button">Order Item</label><br />
     <a href="print1.php">Generate Receipt</a>
     
     
     
 
 </div>
 
 <div class="col-md-4"></div>



</div>

</form>



<?php
require_once'footer.php';
?>
