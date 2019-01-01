<?php
    session_start();
    require_once'functions.php';
    $date=date('Y-m-d H:i:s', strtotime('now'));
    $year=date('Y', strtotime('now'));
    $month=date('m', strtotime('now'));
    $day=date('d', strtotime('now'));
    
    if(isset($_REQUEST['action'])){
       
       $action=$_REQUEST['action'];
       
        switch($action){
            
              
            case'Login':
            
                $validate=new Validator($_POST);
                $validate->validate_login();
                
                if($validate->getIsValid()){
                    $db=new Database('localhost','christ4life','','fish');
                    $db->connect();
                    $result=$db->select('staff_table',array('login_id'=>$_POST['login_id'],'password'=>$_POST['password']));
                        if($db->numRow()==1){
                          $_SESSION['login']=true;                          
                          $row=mysqli_fetch_assoc($result);
                          $_SESSION['access_level']=$row['access_level'];
                          $_SESSION['id']=$row['staff_id'];
                         header('location:index1.php');    
                        }else{
                            $_SESSION['b']=true;
                            header("location:index.php");  
                                  
                          }
                }else{
                    $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:index.php");
                  }           
            
            break;             
            
            
            case 'logout':
                        
                session_destroy();
                header('location:index.php');
                
            break;         
         
            
            case'Create Staff':
                
                $validate=new Validator($_POST);
                $validate->validate_signup();
                
                  if($validate->getIsValid()){
                  
                   $db=new Database('localhost','christ4life','','fish');
                   $db->connect();
                   $db->select('staff_table',array('login_id'=>$_POST['login_id']));
                        if($db->numRow()>0){
                          $_SESSION['d']=true; 
                          header("location:newstaff.php");  
                        }else{                   
                            $save=$db->insert('staff_table',array('login_id'=>$_POST['login_id'],'password'=>$_POST['password'],'access_level'=>$_POST['user'],'creator'=>$_SESSION['id']));                   
                            if($save){
                                $_SESSION['a']=true;
                            } else{
                                $_SESSION['b']=true;
                                }                             
                            header("location:newstaff.php"); 
                         }         
                 }else{
                     $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:newstaff.php");
                   } 
             
            break;          
            
            
            case 'Modify Staff':
                   $key=isset($_POST['key'])? $_POST['key']:'';    
                   if(!empty($key) and $_SESSION['access_level']==2){                    
                   
                        $validate=new Validator($_POST);
                        $validate->validate_staff1();
                        
                          if($validate->getIsValid()){
                            $db=new Database('localhost','christ4life','','fish');
                            $db->connect();
                            $db->select('staff_table',array('login_id'=>$_POST['login_id'],'access_level'=>$_POST['user']));
                            $result=$db->numRow();
                                if($result>0){
                                    $_SESSION['d']=true;
                                    
                                    header("location:newstaff.php?key=$key");                            
                                }else{
                                    $save=$db->update('staff_table',array('login_id'=>$_POST['login_id'],'access_level'=>$_POST['user']),array('staff_id'=>$key));
                                        if($save){
                                            $_SESSION['y']=true;
                                            header("location:newstaff.php?key=$key");                                            
                                        }else{
                                            $_SESSION['z']=true;
                                            header("location:newstaff.php?key=$key");
                                          }
                                   }
                            
                            
                          }else{
                                $error=$validate->getError();
                                 foreach($error as $a=>$b){
                                       $my_error.=$b;
                                       $my_error.="<br>";                   
                                   } 
                                   $_SESSION['c']=$my_error;   
                                 header("location:newstaff.php?key=$key");
                            }
                  } 
            break; 
            
            
                  
           case 'deleteUser':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               $dest=isset($_GET['dest'])? $_GET['dest']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']==2){
                    $db=new Database('localhost','christ4life','','fish');
                    $db->connect();
                    $result=$db->delete('staff_table',array('staff_id'=>$key));
                                                               
                        if($result){                            
                            $_SESSION['e']=true;                                                     
                        }else{
                            $_SESSION['f']=true;                        
                          }
                        
                    header("location:".$dest.".php");
               }
               
            break;
                              
                     
            case 'Add Item':
                        
                $validate=new Validator($_POST);
                $validate->validate_item();
                
                  if($validate->getIsValid()){
                    $db=new Database('localhost','christ4life','','fish');
                    $db->connect();
                    $db->select($_SESSION['table'],array('name'=>$_POST['name'],'price'=>$_POST['price']));
                    $result=$db->numRow();
                        if($result>0){
                            $_SESSION['b']=true;
                            header("location:product.php");                            
                        }else{
                            $save=$db->insert($_SESSION['table'],array('name'=>$_POST['name'],'price'=>$_POST['price'],'quantity'=>$_POST['quantity'],'uploader_id'=>$_SESSION['id']));
                                if($save){
                                    $_SESSION['a']=true;
                                    header("location:product.php");
                                }else{
                                    $_SESSION['d']=true;
                                    header("location:product.php");
                                  }
                           }
                    
                    
                  }else{
                    $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:product.php");
                   }
            
                
            break;
            
            
            case 'Add Warehouse':
                        
                $validate=new Validator($_POST);
                $validate->validate_warehouse();
                
                  if($validate->getIsValid()){
                    $db=new Database('localhost','christ4life','','fish');
                    $db->connect();
                    $db->select('warehouse',array('name'=>$_POST['name']));
                    $result=$db->numRow();
                        if($result>0){
                            $_SESSION['b']=true;
                            header("location:warehouse.php");                            
                        }else{
                            $save=$db->insert('warehouse',array('name'=>$_POST['name']));
                                if($save){
                                    $_SESSION['a']=true;
                                    header("location:warehouse.php");
                                }else{
                                    $_SESSION['d']=true;
                                    header("location:warehouse.php");
                                  }
                                
                           }
                    
                    
                  }else{
                    $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:warehouse.php");
                   }
            
                
            break;
            
            
            case 'editItem':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']==2){
                    $db=new Database('localhost','christ4life','','fish');
                    $db->connect();
                    $result=$db->select($_SESSION['table'],array('test_id'=>$key));
                    $numrow=$db->numRow();
                    
                    if($numrow>0){
                      $row=mysqli_fetch_assoc($result);
                      extract($row);
                      $_SESSION['test_id']=$test_id;  
                      $_SESSION['name']=$name;
                      $_SESSION['price']=$price; 
                      $_SESSION['quantity']=$quantity;                    
                      header('location:product.php');
                    }
               }
               
            break; 
            
            case 'editWarehouse':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']==2){
                    $db=new Database('localhost','christ4life','','fish');
                    $db->connect();
                    $result=$db->select('warehouse',array('id'=>$key));
                    $numrow=$db->numRow();
                    
                    if($numrow>0){
                      $row=mysqli_fetch_assoc($result);
                      extract($row);
                      $_SESSION['id1']=$id;  
                      $_SESSION['name']=$name;
                                        
                      header('location:warehouse.php');
                    }
               }
               
            break; 
            
            case 'Modify Item':
                        
                  $validate=new Validator($_POST);
                  $validate->validate_item();
                    
                      if($validate->getIsValid()){
                        $db=new Database('localhost','christ4life','','fish');
                        $db->connect();
                        $db->select($_SESSION['table'],array('name'=>$_POST['name'],'price'=>$_POST['price']));
                        $result=$db->numRow();
                            if($result>0){
                                $_SESSION['b']=true;
                                header("location:product.php");                            
                            }else{
                                $save=$db->update($_SESSION['table'],array('name'=>$_POST['name'],'price'=>$_POST['price'],'quantity'=>$_POST['quantity'],'uploader_id'=>$_SESSION['id']),array('test_id'=>$_POST['test_id']));
                                    if($save){
                                        $_SESSION['y']=true;
                                        header("location:product.php");
                                        unset($_SESSION['test_id']);
                                        unset($_SESSION['name']);
                                        unset($_SESSION['price']); 
                                        unset($_SESSION['quantity']);                                      
                                    }else{
                                        $_SESSION['z']=true;
                                        header("location:product.php");
                                      }
                               }
                        
                        
                      }else{
                            $error=$validate->getError();
                             foreach($error as $a=>$b){
                                   $my_error.=$b;
                                   $my_error.="<br>";                   
                               } 
                               $_SESSION['c']=$my_error;   
                             header("location:product.php");
                        }
                   
            break; 
            
            
            case 'Modify Warehouse':
                        
                  $validate=new Validator($_POST);
                  $validate->validate_warehouse();
                    
                      if($validate->getIsValid()){
                        $db=new Database('localhost','christ4life','','fish');
                        $db->connect();
                        $db->select('warehouse',array('name'=>$_POST['name']));
                        $result=$db->numRow();
                            if($result>0){
                                $_SESSION['b']=true;
                                header("location:warehouse.php");                            
                            }else{
                                $save=$db->update('warehouse',array('name'=>$_POST['name']),array('id'=>$_POST['id']));
                                    if($save){
                                        $_SESSION['y']=true;
                                        header("location:warehouse.php");
                                        unset($_SESSION['id1']);
                                        unset($_SESSION['name']);
                                                                            
                                    }else{
                                        $_SESSION['z']=true;
                                        header("location:warehouse.php");
                                      }
                               }
                        
                        
                      }else{
                            $error=$validate->getError();
                             foreach($error as $a=>$b){
                                   $my_error.=$b;
                                   $my_error.="<br>";                   
                               } 
                               $_SESSION['c']=$my_error;   
                             header("location:warehouse.php");
                        }
                   
            break; 
            
            
            
            case 'deleteItem':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']==2){
                    $db=new Database('localhost','christ4life','','fish');
                    $db->connect();
                    $result=$db->delete($_SESSION['table'],array('test_id'=>$key));
                                           
                        if($result){
                            $_SESSION['e']=true;                                                     
                        }else{
                            $_SESSION['f']=true;                        
                          }
                        
                    header("location:product.php");
               }
               
            break; 
            
            case 'deleteWarehouse':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']==2){
                    $db=new Database('localhost','christ4life','','fish');
                    $db->connect();
                    $result=$db->delete('warehouse',array('id'=>$key));
                                           
                        if($result){
                            $_SESSION['e']=true;                                                     
                        }else{
                            $_SESSION['f']=true;                        
                          }
                        
                    header("location:warehouse.php");
               }
               
            break; 
            
            case'Increase Item':
                 
                 $test_id= isset($_POST['test_id'])? $_POST['test_id']:'';
                 $quantity= isset($_POST['quantity'])? $_POST['quantity']:'';
                  if(! empty($test_id) and !empty($quantity)){
                     $db=new Database('localhost','christ4life','','fish');
                     $db->connect();
                     $result=$db->select($_SESSION['table'],array('test_id'=>$test_id));
                     $row=mysqli_fetch_assoc($result);
                     $qua=$row['quantity'];  
                     $quaNew=$qua+$quantity;
                     $quaNew;  
                     $result=$db->update($_SESSION['table'],array('quantity'=>$quaNew),array('test_id'=>$test_id));  
                     
                     if($result){
                        $_SESSION['t']=true;
                        $db->insert('item_update',array('test_id'=>$test_id,'quantity_before'=>$qua,'quantity_added'=>$quantity,'warehouse_id'=>$_SESSION['warehouse'],'uploader_id'=>$_SESSION['id'],'day'=>$day,'month'=>$month,'year'=>$year,'date_uploaded'=>$date));
                     }else{
                        $_SESSION['q']=true;
                      } 
                      header("location:product.php#a");             
                  }
              
            break;
            
            case 'Order Item':
            
               if(isset($_POST['amount']) and !empty($_POST['amount'])){
                     $db=new Database('localhost','christ4life','','fish');
                     $db->connect();
                     $result1=$db->select($_SESSION['table'],array('test_id'=>$_POST['test_id']));
                     $row=mysqli_fetch_assoc($result1);
                     $initialQuantity=$row['quantity'];
                     $finalQuantity=$initialQuantity-$_POST['num'];
                      if($finalQuantity<0){
                        $_SESSION['c']='true';
                        $_SESSION['u']=$initialQuantity;
                        header('location:pricelist.php');
                        die();
                      }
                     $result=$db->insert('item_order',array('warehouse_id'=>$_SESSION['warehouse'],'test_id'=>$_POST['test_id'],'amount'=>$_POST['amount'],'num'=>$_POST['num'],'uploader_id'=>$_SESSION['id'],'session_id'=>session_id(),'day'=>$day,'month'=>$month,'year'=>$year));
                     $db->update($_SESSION['table'],array('quantity'=>$finalQuantity), array('test_id'=>$_POST['test_id']));
                     if($result){
                        
                        $_SESSION['b']='true';
                     }else{
                        $_SESSION['a']='true';
                       }
                     
                    
                   header('location:pricelist.php'); 
                }
            
               
            
            
            break;
            
            case 'Delete':
               
               
                if(is_numeric($_POST['id'])){   
                    $db=new Database('localhost','christ4life','','fish');
                    $db->connect();
                    
                      $key=isset($_POST['id'])? $_POST['id']:'';
                      $warehouse_id=isset($_POST['warehouse_id'])? $_POST['warehouse_id']:'';
                      $test_id=isset($_POST['test_id'])? $_POST['test_id']:'';
                      $Addquantity=isset($_POST['quantity'])? $_POST['quantity']:'';
              
                   
                            if($warehouse_id==1){        
                                $table='test';
                            }elseif($warehouse_id==2){
                                 $table='test2';
                                }elseif($warehouse_id==3){
                                     $table='test3';
                                    }elseif($warehouse_id==4){
                                             $table='test4';
                                        }elseif($warehouse_id==5){
                                             $table='test5';
                                            }elseif($warehouse_id==6){
                                                 $table='test6';
                                                }elseif($warehouse_id==7){
                                                         $table='test7';
                                                    }elseif($warehouse_id==8){
                                                             $table='test8';
                                                        }elseif($warehouse_id==9){
                                                                 $table='test9';
                                                            }elseif($warehouse_id==10){
                                                                     $table='test10';
                                                                }
              
                    $result=$db->select($table,array('test_id'=>$test_id));
                    if($result){
                        $row=mysqli_fetch_assoc($result);
                        extract($row);
                        $finalQuantity=$quantity+$Addquantity;
                       $result= $db->update($table,array('quantity'=>$finalQuantity), array('test_id'=>$test_id));
                        if($result){
                            $result=$db->delete('item_order',array('order_id'=>$key));
                                           
                            if($result){
                                $_SESSION['e']=true;                                                     
                            }else{
                                $_SESSION['f']=true;                      
                              }
                       
                            header("location:pricelist.php");
                        }
                    }
                    
                }
               
            break; 
            
            
            case'Change Password':
             
                $validate=new Validator($_POST);
                $validate->validate_password();
                    
                      if($validate->getIsValid()){
                        $db=new Database('localhost','christ4life','','fish');
                        $db->connect();
                        $db->select('staff_table',array('password'=>$_POST['old_password']));
                        $numrow=$db->numRow();
                        if($numrow>0){
                          $status=$db->update('staff_table',array('password'=>$_POST['new_password']),array('staff_id'=>$_SESSION['id']));
                          if($status){
                            $_SESSION['b']=true;
                          }else{
                            $_SESSION['c']=true;
                           }
                          
                        }else{
                           $_SESSION['a']=true;
                            
                        }
                      
                        header("location:changepassword.php"); 
                      }else{
                            $error=$validate->getError();
                             foreach($error as $a=>$b){
                                   $my_error.=$b;
                                   $my_error.="<br>";                   
                             } 
                             $_SESSION['d']=$my_error;   
                             header("location:changepassword.php");
                        }
                    
                      
            
            break;
            
            
            
            
            
            
      
      
      
      
      
            default:
            
                 header('location:index.php');            
            
            break;
      
      
      
      
      
            
        }
        
    }






















?>