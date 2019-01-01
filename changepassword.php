<?php
require_once'header.php';

if(! isset($_SESSION['login'])){
   header('location:index.php'); 
}
?>

<form action="transact.php" method="post">
<div class="row">
<?php 
if(isset($_SESSION['a'])){
  echo("<div class='alert alert-danger center' role='alert'>
        <strong>Oops!</strong>
        <br/>Old password not Correct
       </div>");
  unset($_SESSION['a']);
}elseif(isset($_SESSION['b'])){
      echo("<div class='alert alert-success center' role='alert'>
            <strong>Congratulations!</strong>
            <br/>Password Changed Successfully
           </div>");
      unset($_SESSION['b']);
    }elseif(isset($_SESSION['c'])){
          echo("<div class='alert alert-danger center' role='alert'>
                <strong>Oops!</strong>
                <br/>Error Changing Password
               </div>");
          unset($_SESSION['c']);
        }elseif(isset($_SESSION['d'])){
             $error=$_SESSION['d'];
             echo("<div class='alert alert-danger center' role='alert'>
                    <strong>Oops!</strong>
                    <br/>$error
                 </div>");
             unset($_SESSION['d']);
          }

?>
<h3 class="center color">Change Password</h3>
 <div class="col-md-4"></div>
 
 <div class="col-md-4 user-agileits contact-left cont" style="text-align: center;">
 
     <input type="password" placeholder="Old Password" name="old_password" style="margin-bottom: 20px;" required="" /><br />
     <input type="password" placeholder="New Password" name="new_password" style="margin-bottom: 20px;" required=""  /><br />
     <input type="password" placeholder="Confirm New Password" name="new_password1" style="margin-bottom: 20px;" required=""  /><br />
     
     <input type="submit" name="action" value="Change Password" style="display: none;" id="passwordbutton"/>
     <label for="passwordbutton" class="button">Change Password</label>
     
     
     
 
 </div>
 
 <div class="col-md-4"></div>



</div>

</form>



<?php
require_once'footer.php';
?>
