<?php
session_start();
    require_once'functions.php';
    
      
      if(isset($_POST['keyword1'])){
        $keyword1=$_POST['keyword1'];
        
        $db=new Database('localhost','christ4life','','fish');
        $db->connect();
        $result=$db->select($_SESSION['table'],array('test_id'=>$keyword1));
            if($db->numRow()>0){
              $row=mysqli_fetch_assoc($result);  
              echo $row['price'];              
            }else{
                echo 'Not Found!!!';
              }
      }
      
      
     
      
      

?>