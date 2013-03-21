<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
class Users_Model extends MyActiveRecord
{
    
    
    public $id;
    public $username;
    public $password;
    public $firstname;
    public $secondname;
    public $address;
    public $type;
    
    
    
    
    public function __construct()
    {
    //    print 'I am the frontpage model';
        //db calls go here.  So for instance get list of articles etc...
    }
    
    public function get_user($username,$password)
    {
        
        //fetch article from array
        $sql = $this->Prepare("select * from users_model where username = $username and password = MD5($password)");
        return $this->FindBySql($this,$sql); 
    }
    
         public function get_user_by_id($id)
    {
        //fetch article from array
     
         return $this->FindBySql($this,"select * from users_model where id=$id");
        
    }
    
    
    
    public function get_user_count()
    {
       // echo $this;
        return $this->Count($this);
    }
    
    
    
    public function get_users()
    {
        return $this->FindBySql($this,"select * from users_model");
      //  return $this->articles;
    }
}
?>
