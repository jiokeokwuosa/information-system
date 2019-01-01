$(document).ready(function(){
  $(document).on('change',".keyword1", function(){
              var keyword1= $(this).val(); 
                          
              if(keyword1 != ''){ 
                 $.ajax({type:"POST",
                    url:"custom.php",
                    data:"keyword1="+keyword1,
                    success:function(result){                    
                      // document.getElementById('')
                      document.orderItems.amount.value=result;                   
                     }  
                 });   
                
               }else{
                  $("#amount").html('Oops!!!');
                 }  
         
         
 }); 
         
         
         
         
         
        
       
        
            
});





function checkRegister() {
   
	if (document.register.login_id.value == "") {
		alertify.alert('Sign up Error', 'Please Enter Login Id');
		return false;
	}
	if (document.register.password.value == "") {
		alertify.alert('Sign up Error', 'Please Enter Password');
		return false;
	} else if (document.register.password.value.length < 4) {
		alertify.alert('Sign up Error', 'Password should be up to 4 characters');
		return false;
	}
	if (document.register.password1.value == "") {
		alertify.alert('Sign up Error', 'Please Enter Confirm Password');
		return false;
	}
	if (document.register.password.value != document.register.password1.value) {
		alertify.alert('Sign up Error', 'Confirm Password do not match');
		return false;
	}
	if (document.register.user.value == "") {
		alertify.alert('Sign up Error', 'Please Select User');
		return false;
	}
	      
	return true;
}

function checkEdit(){    
   
    var status=confirm('Confirm Edit?');
    if(status){
        return true;
    }else{
        return false;
      }
       
}

function checkDelete(){
    
    var status=confirm('Confirm Delete?');
    if(status){
        return true;
    }else{
        return false;
      }  
    
}

function checkApprove(){
    
    var status=confirm('Confirm Payment?');
    if(status){
        return true;
    }else{
        return false;
      }  
    
}

function checkApprove1(){
    
    var status=confirm('Mark Test as Done?');
    if(status){
        return true;
    }else{
        return false;
      }  
    
}

function checkRetract(){
    
    var status=confirm('Confirm Retract?');
    if(status){
        return true;
    }else{
        return false;
      }  
    
}




