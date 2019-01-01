<?php
require_once'header.php';

if(! isset($_SESSION['login'])){
   header('location:index.php'); 
}
?>

<form action="dailybarprint1.php" method="post">
<div class="row">

<h3 class="center color">Generate Daily Report</h3>
 <div class="col-md-4 contact-left cont">
     <select name="day" style="margin-bottom: 20px;" required="">
         <option value="">Select Day</option>
          <?php
            for($i=1; $i<=31; $i++){
               echo"<option value=$i>$i</option>"; 
            }
          ?>
     
     </select>
 </div>
 
 <div class="col-md-4 contact-left cont" style="text-align: center;">
    <select name="month" required="">
        <option value="">Select Month</option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>
    
 </div>
 
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



</div>


<div class="row">
    <div class="col-md-4 contact-left cont">
     
    </div>
 
    <div class="col-md-4 contact-left cont" style="text-align: center;">
         <input type="submit" name="action" value="Daily Report" style="display: none;" id="Daily Report"/>
         <label for="Daily Report" class="button">Daily Report</label><br />
        
    </div>
     
    <div class="col-md-4 contact-left cont">
         
    </div>



</div>

</form>



