<?php
require_once"header.php";

    $db=new Database('localhost','christ4life','','fish');
    $db->connect();
    $result=$db->select('warehouse',array(),array('id'=>'ASC'));
    $num_record=$db->numRow();
    
    $response=array();
    while($row=mysqli_fetch_assoc($result)){
		$response[]=$row;	
    } 
    
    
     
?>
<div class="row">
<h2 class="center color" style="font-family: font1;">SELECT WAREHOUSE</h2>
    <div class="col-md-4 square1 clearlink">
                 <a href="product.php?warehouse=1">
                	<div class="icon center">
            					<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                                <h4><?php echo $response[0]['name'];?></h4>
                                <h5>Enter</h5>
            		</div><hr />
                 </a>
    </div>
    
    <div class="col-md-4 square1 clearlink">
                 <a href="product.php?warehouse=2">
                	<div class="icon center">
            					<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                                <h4><?php echo $response[1]['name'];?></h4>
                                <h5>Enter</h5>
            		</div><hr />
                 </a>
    </div>
    
    <div class="col-md-4 square1 clearlink">
                 <a href="product.php?warehouse=3">
                	<div class="icon center">
            					<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                                <h4><?php echo $response[2]['name'];?></h4>
                                <h5>Enter</h5>
            		</div><hr />
                 </a>
    </div>
 
    
</div>
<br />
<div class="row">

    <div class="col-md-4 square1 clearlink">
                 <a href="product.php?warehouse=4">
                	<div class="icon center">
            					<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                                <h4><?php echo $response[3]['name'];?></h4>
                                <h5>Enter</h5>
            		</div><hr />
                 </a>
    </div>
    
    <div class="col-md-4 square1 clearlink">
                 <a href="product.php?warehouse=5">
                	<div class="icon center">
            					<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                                <h4><?php echo $response[4]['name'];?></h4>
                                <h5>Enter</h5>
            		</div><hr />
                 </a>
    </div>
    
    <div class="col-md-4 square1 clearlink">
                 <a href="product.php?warehouse=6">
                	<div class="icon center">
            					<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                                <h4><?php echo $response[5]['name'];?></h4>
                                <h5>Enter</h5>
            		</div><hr />
                 </a>
    </div>
 
    
</div>

<br />
<div class="row">

    <div class="col-md-4 square1 clearlink">
                 <a href="product.php?warehouse=7">
                	<div class="icon center">
            					<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                                <h4><?php echo $response[6]['name'];?></h4>
                                <h5>Enter</h5>
            		</div><hr />
                 </a>
    </div>
    
    <div class="col-md-4 square1 clearlink">
                 <a href="product.php?warehouse=8">
                	<div class="icon center">
            					<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                                <h4><?php echo $response[7]['name'];?></h4>
                                <h5>Enter</h5>
            		</div><hr />
                 </a>
    </div>
    
    <div class="col-md-4 square1 clearlink">
                 <a href="product.php?warehouse=9">
                	<div class="icon center">
            					<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                                <h4><?php echo $response[8]['name'];?></h4>
                                <h5>Enter</h5>
            		</div><hr />
                 </a>
    </div>
 
    
</div>
<br />
<div class="row">
    <div class="col-md-4 square1 clearlink">
         <a href="product.php?warehouse=10">
                	<div class="icon center">
            					<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                                <h4><?php echo $response[9]['name'];?></h4>
                                <h5>Enter</h5>
            		</div><hr />
         </a>
    
    </div>
</div>
<?php
require_once"footer.php";
?>


