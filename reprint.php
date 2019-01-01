<?php require_once"header.php";?>
<div class="row">
<form action="print2.php" method="post">
<h3 class="center color">Reprint Slip</h3>
        <div class="col-md-12">
               <?php
               $db=new Database('localhost','christ4life','','fish');
               $db->connect();
               if(isset($_POST['day']) and !empty($_POST['day'])){
                 $result=$db->select('item_order',array('print_status'=>'true','day'=>$_POST['day'],'month'=>$_POST['month'],'year'=>$_POST['year']),array('order_id'=>'desc'));
               }else{
                 $result=$db->select('item_order',array('print_status'=>'true','month'=>$_POST['month'],'year'=>$_POST['year']),array('order_id'=>'desc'));
                }
               $numrow=$db->numRow();
               if($numrow==0){
                echo("<h6 class=title>No Existing Record</h6>");
                
               } else{
               
               ?> 
               <?php
               if(isset($_SESSION['c'])){
                  $error=$_SESSION['c'];
                  echo("<div class='alert alert-danger center' role='alert'>
                        <strong>Oops!</strong>
                        <br/>No Record selected
                     </div>");
                 unset($_SESSION['c']);
                }
                           
               ?>
                <table class="table table-striped table-hover">
                <thead style="background-color: #000033; color: white;">
                    <tr>
                         <div class="col-md-2 contact-left1 cont center"><input type="submit" name="action" value="Reprint" style="margin-bottom: 20px;"/></div>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Select</th>
                        
                    </tr>    
                </thead>    
                <tbody>
                
                    <?php
                    $counter=0;
                    while($row=mysqli_fetch_assoc($result)){
                        ++$counter;
                        extract($row);
                    ?>
                    <tr>
                        <td><?php echo ucwords($db->getItemName($test_id));?></td>
                        <input type="hidden" name="member[<?php echo $counter;?>][order_id]"  value="<?php echo $order_id;?>"/>  
                        <td><?php echo number_format($amount,0);?></td>
                        <td><?php echo number_format($num,0);?></td>
                        <td><?php  echo date('d-m-y --- h:ia',strtotime($date_received));?> </td>
                        <td><input type="checkbox" name="member[<?php echo $counter;?>][item]" class="item" id="item"/> </td>          
                    </tr> 
                    <?php
                    
                    }
                    ?>              
                </tbody> 
                <tfoot style="background-color: #000033; color: white; text-align: center;">
                <tr>
                <td colspan="5">We have <?php echo $numrow;?> Record(s)</td>
                </tr>
                </tfoot>
                
                </table>
   </form>             
                 <?php 
               }
                              
               
               
               
               
               ?> 
                
        <br />          
        
        </div>

</div>