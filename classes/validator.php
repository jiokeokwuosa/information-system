<?php
class Validator{
    protected $is_valid=true;
    protected $error_Messages=array();
    protected $data=array();
       
    
    public function __construct(array $params){
      if(empty($params) or !is_array($params)){
        die("Invalid Data");
      } 
     $this->data=$params;  
    }     
    
    public function validate_login(){
       if(empty($this->data['login_id'])){
        $this->error_Messages['login_id']='Please Enter Your Login Id';        
       }
       
       if(empty($this->data['password'])){
        $this->error_Messages['password']='Please Enter Password';        
       }
                                        
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }      
          
    }   
    
    
        
    public function validate_signup(){
       if(empty($this->data['login_id'])){
        $this->error_Messages['login_id']='Please Enter Login Id';        
       }
       
       if(empty($this->data['password'])){
        $this->error_Messages['password']='Please Enter Password';        
       }elseif(strlen($this->data['password'])<4){
            $this->error_Messages['password']='Password should be up to 4 characters';
         }
       
       if(empty($this->data['password1'])){
        $this->error_Messages['password1']='Please Enter Confirm Password';        
       }
       
       if(!empty($this->data['password']) and !empty($this->data['password1']) and $this->data['password']!=$this->data['password1']){
        $this->error_Messages['password1']='Confirm password do not match';        
       }  
       
       if(empty($this->data['user'])){
        $this->error_Messages['user']='Please Select User';        
       }
           
        
                         
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }      
          
    }
    
     public function validate_staff1(){
       if(empty($this->data['login_id'])){
        $this->error_Messages['login_id']='Please Enter Login Id';        
       }
              
       if(empty($this->data['user'])){
        $this->error_Messages['user']='Please Select User';        
       }
           
        
                         
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }      
          
    }
    
    public function validate_customer(){
       if(empty($this->data['first_name'])){
        $this->error_Messages['first_name']='Please Enter First Name';        
       }
       
       if(empty($this->data['middle_name'])){
        $this->error_Messages['middle_name']='Please Enter Middle Name';        
       }
       
       if(empty($this->data['last_name'])){
        $this->error_Messages['last_name']='Please Enter last Name';        
       }
              
       if(empty($this->data['gender'])){
        $this->error_Messages['gender']='Please Select Gender';        
       }
       
       if(empty($this->data['address'])){
        $this->error_Messages['address']='Please Enter Address';        
       }
       
       if(empty($this->data['marital_status'])){
        $this->error_Messages['marital_status']='Please Select Marital Status';        
       }  
                         
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }      
          
    }
    
    
    public function validate_item(){
       if(empty($this->data['name'])){
        $this->error_Messages['name']='Please Enter the Name';        
       }
       
       if(empty($this->data['price'])){
        $this->error_Messages['price']='Please Enter the Price';        
       }
                                      
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }      
          
    } 
    
    public function validate_warehouse(){
       if(empty($this->data['name'])){
        $this->error_Messages['name']='Please Enter Warehouse Name';        
       }
                                     
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }      
          
    } 
    
    
    public function validate_password(){
       if(empty($this->data['old_password'])){
        $this->error_Messages['old_password']='Please Enter Your Old password';        
       }
       
       if(empty($this->data['new_password'])){
        $this->error_Messages['new_password']='Please Enter New password';        
       }elseif(strlen($this->data['new_password'])<4){
            $this->error_Messages['new_password']='Password should be up to 4 characters';     
          }
       
       if(empty($this->data['new_password1'])){
        $this->error_Messages['new_password1']='Enter Confirm Password';        
       }elseif($this->data['new_password1'] != $this->data['new_password']){
            $this->error_Messages['new_password1']='Confirm Password do not Match';        
          }
                
                           
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }      
          
    }   
     
  
    public function getIsValid(){
     return $this->is_valid;
            
    }
    
    
   
    public function getError(){
     return $this->error_Messages;
            
    }
    
    
    
    
    
    
    
}
?>