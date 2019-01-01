<?php
require_once'header.php';

if(!isset($_SESSION['access_level']) or $_SESSION['access_level']!=2){
  header('location:index.php');   
}
?>
<h3 class="center color">Our Staff</h3>

<div class="row clearlink">
    <div class="col-md-12">
   <?php
   
   if(isset($_SESSION['e'])){
     echo("<div class='alert alert-success center' role='alert'>
            <strong>Congratulation!</strong>
            <br/>Account Deleted Successfully
         </div>");
     unset($_SESSION['e']);
    }elseif(isset($_SESSION['f'])){
         echo("<div class='alert alert-danger center' role='alert'>
                <strong>Oops!</strong>
                <br/>Error Deleting Account
             </div>");
         unset($_SESSION['f']);
      }  
   
      
    
   $db=new Database('localhost','christ4life','','fish');
   $db->connect();
   $result=$db->select('staff_table');
   $numrow=$db->numRow();
   if($numrow==0){
    echo("<h3 class='center color'>No Exisiting Record</h3>");
    
   } else{
   
   ?> 
    <table class="table table-striped table-hover">
    <thead style="background-color: #000033; color: white;">
        <tr>
            <th>Seller Id</th>
            <th>Login Id</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>    
    </thead>    
    <tbody>
    
        <?php
        while($row=mysqli_fetch_assoc($result)){ 
            extract($row);
        ?>
        <tr>
            <td><?php echo $staff_id;?></td>
            <td><?php echo $login_id;?></td>
            <td><?php echo $db->getStatus($access_level);?></td>
            <td><?php  echo"<a onclick='return checkEdit();' href=newstaff.php?key=$staff_id>";?><i class="glyphicon glyphicon-pencil" style="color: green;"></i></a> </td>
            <td><?php  echo"<a onclick='return checkDelete();' href=transact.php?key=$staff_id&action=deleteUser&dest=staff>";?><i class="glyphicon glyphicon-trash" style="color: red;"></i></a> </td>
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
    
    </div>

</div>

