<?php
require_once'header.php';


if($_SESSION['access_level']!=2){
   header('Location:login.php');
 }

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
<form action="transact.php" method="post">

<div class="row">
    <h3 class="center color">Manage Product in <?php echo $house;?></h3>
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
                <br/>Data already Exist
               </div>");
          unset($_SESSION['b']);
        }elseif(isset($_SESSION['a'])){
              echo("<div class='alert alert-success center' role='alert'>
                    <strong>Congratulations</strong>
                    <br/>Data Inserted Successfully
                   </div>");
              unset($_SESSION['a']);
           }elseif(isset($_SESSION['d'])){
                echo("<div class='alert alert-danger center' role='alert'>
                        <strong>Cops!</strong>
                        <br/>Error Inserting Data
                       </div>");
                unset($_SESSION['d']);
              }elseif(isset($_SESSION['e'])){
                    echo("<div class='alert alert-success center' role='alert'>
                            <strong>Congratulations</strong>
                            <br/>Data Deleted Successfully
                           </div>");
                    unset($_SESSION['e']);
                  }elseif(isset($_SESSION['f'])){
                        echo("<div class='alert alert-danger center' role='alert'>
                                <strong>Oops!</strong>
                                <br/>Error Deleting Data
                               </div>");
                        unset($_SESSION['f']);
                      }elseif(isset($_SESSION['y'])){
                            echo("<div class='alert alert-success center' role='alert'>
                                    <strong>Congratulations</strong>
                                    <br/>Data Updated Successfully
                                   </div>");
                            unset($_SESSION['y']);
                          }elseif(isset($_SESSION['z'])){
                                echo("<div class='alert alert-danger center' role='alert'>
                                        <strong>Oops!</strong>
                                        <br/>Error Updating Data
                                       </div>");
                                unset($_SESSION['z']);
                              }
                              
            
                $id='';
                $name='';
                $price='';
                $quantity='';
                $button='Add Item';
            
            
            if(isset($_SESSION['test_id'])){
                $id=$_SESSION['test_id'];
                $name=$_SESSION['name'];
                $quantity=$_SESSION['quantity'];
                $price=$_SESSION['price'];                
                $button='Modify Item';
               
            }
            
    
    ?>
   
        <div class="col-md-4 contact-left cont"><input type="text" name="name" placeholder="Enter Name" style="margin-bottom: 20px;" value="<?php echo $name;?>" required=""/>    </div>
        <div class="col-md-3 contact-left cont"><input type="number" name="price" placeholder="Price" style="margin-bottom: 20px;" value="<?php echo $price;?>" required=""/>    </div>
        <div class="col-md-3 contact-left cont"><input type="number" name="quantity" placeholder="Quantity" style="margin-bottom: 20px;" value="<?php echo $quantity;?>" required=""/>       </div>
        <?php if(isset($_SESSION['test_id'])){?>
        <input type="hidden" name="test_id" value="<?php echo $id;?>"/> 
        <?php }?> 
        <div class="col-md-2 contact-left1 cont"><input type="submit" name="action" value="<?php echo $button;?>" style="margin-bottom: 20px;"/></div>
    
</div>
</form>

<div class="row">
        <div class="col-md-12">
               <?php
               $db=new Database('localhost','christ4life','','fish');
               $db->connect();
               $result=$db->select($_SESSION['table'],array(),array('test_id'=>'desc'));
               $numrow=$db->numRow();
               if($numrow==0){
                echo("<h6 class=title>No Existing Record</h6>");
                
               } else{
               
               ?> 
                <table class="table table-striped table-hover">
                <thead style="background-color: #000033; color: white;">
                    <tr>
                        
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Delete</th>
                        <th>Edit</th>
                        
                    </tr>    
                </thead>    
                <tbody>
                
                    <?php
                    
                    while($row=mysqli_fetch_assoc($result)){ 
                        extract($row);
                    ?>
                    <tr>
                        <td><?php echo ucwords($name);?></td>
                        <td><?php echo number_format($price,0);?></td>
                        <td><?php echo number_format($quantity,0);?></td>
                        <td><?php  echo"<a onclick='return checkDelete();' href=transact.php?key=$test_id&action=deleteItem>";?><i class="glyphicon glyphicon-remove" style="color: red;"></i></a> </td>
                        <td><?php  echo"<a onclick='return checkEdit();' href=transact.php?key=$test_id&action=editItem>";?><i class="glyphicon glyphicon-pencil" style="color: green;"></i></a> </td>          
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
                
                 <?php 
               }
               
               ?> 
                
        <br />          
        
        </div>

</div>
                <h3 class="center color">Increase Quantity</h3>
                <a name="a"></a>
                <?php
                    if(isset($_SESSION['t'])){
                        echo("<div class='alert alert-success center' role='alert'>
                                <strong>Congratulations</strong>
                                <br/>Quantity Updated Successfully
                               </div>");
                        unset($_SESSION['t']);
                      }elseif(isset($_SESSION['q'])){
                            echo("<div class='alert alert-danger center' role='alert'>
                                    <strong>Oops!</strong>
                                    <br/>Error Updating Data
                                   </div>");
                            unset($_SESSION['q']);
                          }
                              
                
                ?>
<div class="row">
    <form action="transact.php" method="post">
        <div class="col-md-2"></div>
        <div class="col-md-3 contact-left cont"><select name="test_id" required="">
                           <?php
                           $db=new Database('localhost','christ4life','','fish');
                           $db->connect();
                           echo $db->listItems($_SESSION['table']);                       
                           ?>                    
                          </select>  
         </div>
        <div class="col-md-3 contact-left cont">
        <input type="number" name="quantity" placeholder="Increase By" style="margin-bottom: 20px;" required=""/>  <br /> 
       </div>
       <div class="col-md-2 contact-left1 cont"><input type="submit" name="action" value="Increase Item" style="margin-bottom: 20px;"/></div>
        <div class="col-md-2"></div>
    </form>


</div>






<?php
require_once'footer.php';
?>
