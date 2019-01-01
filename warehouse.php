<?php
require_once'header.php';


if($_SESSION['access_level']!=2){
   header('Location:login.php');
 }
  
?>
<form action="transact.php" method="post">

<div class="row">
    <h3 class="center color">Manage Warehouse(s)</h3>
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
                    <br/>Warehouse Created Successfully
                   </div>");
              unset($_SESSION['a']);
           }elseif(isset($_SESSION['d'])){
                echo("<div class='alert alert-danger center' role='alert'>
                        <strong>Cops!</strong>
                        <br/>Error Creating Warehouse
                       </div>");
                unset($_SESSION['d']);
              }elseif(isset($_SESSION['e'])){
                    echo("<div class='alert alert-success center' role='alert'>
                            <strong>Congratulations</strong>
                            <br/>Warehouse Deleted Successfully
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
                                    <br/>Warehouse Updated Successfully
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
                $button='Add Warehouse';
            
            
            if(isset($_SESSION['id1']) and !empty($_SESSION['name'])){
                $id=$_SESSION['id1'];
                $name=$_SESSION['name'];
                $button='Modify Warehouse';
               
            }
            
    
    ?>
        <div class="col-md-2"></div>
        <div class="col-md-5 contact-left cont"><input type="text" name="name" placeholder="Warehouse Name" style="margin-bottom: 20px;" value="<?php echo $name;?>" required=""/>    </div>
        
        <?php if(isset($_SESSION['id1'])){?>
        <input type="hidden" name="id" value="<?php echo $id;?>"/> 
        <?php }?> 
        <div class="col-md-3 contact-left1 cont"><?php if($button=='Modify Warehouse'){?><input type="submit" name="action" value="<?php echo $button;?>" style="margin-bottom: 20px;"/><?php }?></div>
        <div class="col-md-2"></div>
</div>
</form>

<div class="row">
        <div class="col-md-12">
               <?php
               $db=new Database('localhost','christ4life','','fish');
               $db->connect();
               $result=$db->select('warehouse',array(),array('id'=>'ASC'));
               $numrow=$db->numRow();
               if($numrow==0){
                echo("<h6 class=title>No Existing Record</h6>");
                
               } else{
               
               ?> 
                <table class="table table-striped table-hover">
                <thead style="background-color: #000033; color: white;">
                    <tr>
                        <th>S/No</th>
                        <th>Name</th>   
                        <th>Edit</th>                                
                        
                    </tr>    
                </thead>    
                <tbody>
                
                    <?php
                    $counter=0;
                    while($row=mysqli_fetch_assoc($result)){ 
                        extract($row);
                    ?>
                    <tr>
                        <td><?php echo ++$counter;?></td>
                        <td><?php echo ucwords($name);?></td>                      
                        <td><?php  echo"<a onclick='return checkEdit();' href=transact.php?key=$id&action=editWarehouse>";?><i class="glyphicon glyphicon-pencil" style="color: green;"></i></a> </td>          
                    </tr> 
                    <?php
                    
                    }
                    ?>              
                </tbody> 
                <tfoot style="background-color: #000033; color: white; text-align: center;">
                <tr>
                <td colspan="3">We have <?php echo $numrow;?> Record(s)</td>
                </tr>
                </tfoot>
                
                </table>
                
                 <?php 
               }
               
               ?> 
                
        <br />          
        
        </div>

</div>
               



<?php
require_once'footer.php';
?>
