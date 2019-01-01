<?php
require_once'header.php';
?>
 
 <div class="row">
        <div class="col-md-12">
        <br /><br />
    		<div class="main-agileits">
    				<h3 class="center color">New Staff</h3>
                <?php
                    if(isset($_SESSION['c'])){
                     $error=$_SESSION['c'];
                     echo("<div class='alert alert-danger center' role='alert'>
                            <strong>Oops!</strong>
                            <br/>$error
                         </div>");
                     unset($_SESSION['c']);
                    }elseif(isset($_SESSION['d'])){
                         echo("<div class='alert alert-danger center' role='alert'>
                                <strong>Oops!</strong>
                                <br/>Login Id already Exist
                             </div>");
                         unset($_SESSION['d']);
                        }elseif(isset($_SESSION['a'])){
                             echo("<div class='alert alert-success center' role='alert'>
                                    <strong>Congratulation!</strong>
                                    <br/>Staff Account created Successfully
                                 </div>");
                             unset($_SESSION['a']);
                            }elseif(isset($_SESSION['b'])){
                                 echo("<div class='alert alert-danger center' role='alert'>
                                        <strong>Oops!</strong>
                                        <br/>Unable to create Account
                                     </div>");
                                 unset($_SESSION['b']);
                              }elseif(isset($_SESSION['y'])){
                                 echo("<div class='alert alert-success center' role='alert'>
                                        <strong>Congratulation!</strong>
                                        <br/>Staff Account Updated Successfully
                                     </div>");
                                 unset($_SESSION['y']);
                                }elseif(isset($_SESSION['z'])){
                                     echo("<div class='alert alert-danger center' role='alert'>
                                            <strong>Oops!</strong>
                                            <br/>Unable to Modify Account
                                         </div>");
                                     unset($_SESSION['z']);
                                  } 
                              
                              $login_id='';
                              $access_level='';
                              $button='Create Staff';
                              
                              if(isset($_GET['key'])){
                                $button='Modify Staff';
                                $db=new Database('localhost','christ4life','','fish');
                                $db->connect();
                                $result=$db->select('staff_table',array('staff_id'=>$_GET['key']));
                                    if($db->numRow()>0){
                                      $row=mysqli_fetch_assoc($result);
                                      extract($row);  
                                    }
                              }            
                ?>
              
    				<form action="transact.php" method="post" name="register" onsubmit="return checkRegister();">
                      
    					<div class="key">
    						<i class="fa fa-user" aria-hidden="true"></i>
    						<input  type="text" placeholder="Enter Login Id" name="login_id"  required="" value="<?php echo $login_id;?>"/>
    						<div class="clearfix"></div>
    					</div>
                     <?php if(! isset($_GET['key'])){?>  
    					<div class="key">
    						<i class="fa fa-lock" aria-hidden="true"></i>
    						<input  type="password"  name="password" required="" placeholder="Enter Password"/>
    						<div class="clearfix"></div>
    					</div>
                        
                        <div class="key">
    						<i class="fa fa-lock" aria-hidden="true"></i>
    						<input  type="password"  name="password1" required="" placeholder="Confirm Password"/>
    						<div class="clearfix"></div>
    					</div>
                     <?php }
                     if(isset($_GET['key'])){
                        $key=$_GET['key'];
                       echo"<input type='hidden' name='key' value=$key>"; 
                     }                    
                     
                     ?> 
                     
                     
                        <div class="key">
                          <select name="user" required="">
                           <?php
                           $db=new Database('localhost','christ4life','','fish');
                           $db->connect();
                           echo $db->listUsers($access_level);                       
                           ?>                    
                          </select>
                        </div>
                        
                        <div class="key1">
                            <input type="submit" name="action" value="<?php echo $button;?>"/>
                            
                        </div>
    					
    				</form>
    			
    			
    		</div>
    
      </div>
  
 
 </div>





<?php
require_once'footer.php';
?>