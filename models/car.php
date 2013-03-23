<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
class Cart_Model extends MyActiveRecord
{
    
    
    public $id;
    public $name;
    public $model;
    public $enginesize;
    public $mileage;
    public $notes;
    public $dateadded;
    public $featured;
    
    
    public function __construct()
    {
    //    print 'I am the frontpage model';
        //db calls go here.  So for instance get list of articles etc...
    }
    
     public function get_car($id)
    {
        //fetch article from array
     return $this->FindBySql($this,"select * from cars_model where id=$id");
        
    }
    
    public function get_cars($orderby)
    {
         return $this->FindBySql($this,"select * from cars_model order by $orderby desc");
    }
    
    public function get_cars_default()
    {
        return $this->FindBySql($this,"select * from cars_model order by $orderby desc");
    }
  
    public function get_featured_cars()
    {
         return $this->FindBySql($this,"select * from cars_model where featured = true");
    }
    
    public function get_car_count()
    {
       // echo $this;
        return $this->Count($this);
    }
    
    
    
   
}
?>
