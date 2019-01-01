<?php
require_once'header.php';

if(! isset($_SESSION['login'])){
   header('location:index.php'); 
}
?>

<form action="yearlybarprint1.php" method="post">
<div class="row">

<h3 class="center color">Generate Annual Report</h3>
 <div class="col-md-4"></div> 
  
 <div class="col-md-4 contact-left cont">
     <select name="year" style="margin-bottom: 20px;" required="">
         <option value="">Select Year</option>
          <?php
            $year=date('Y', strtotime('now'));
            for($i=$year; $i>=2018; $i--){
               echo"<option value=$i>$i</option>"; 
            }
          ?>
     
     </select>
 </div>

<div class="col-md-4"></div> 

</div>


<div class="row">
    <div class="col-md-4 contact-left cont">
     
    </div>
 
    <div class="col-md-4 contact-left cont" style="text-align: center;">
         <input type="submit" name="action" value="Yearly Report" style="display: none;" id="Yearly Report"/>
         <label for="Yearly Report" class="button">Yearly Report</label><br />
        
    </div>
     
    <div class="col-md-4 contact-left cont">
         
    </div>



</div>

</form>



