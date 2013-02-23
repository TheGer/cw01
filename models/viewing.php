<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
class Viewing_Model extends MyActiveRecord
{
    
    
    public $id;
    public $userid;
    public $carid;
    public $dateofviewing;
    public $booked;
    

    
    public function get_viewing($id)
    {
        $sql = $this->Prepare("select * from viewing_model where id = $id");
        return $this->FindBySql($this,$sql);
    }
    
    public function get_viewings_by_car($carid)
    {
        $sql = $this->Prepare("select * from viewing_model where carid = $carid");
        return $this->FindBySql($this,$sql);
    }
    
    public function get_viewing_count_by_car($carid)
    {
        return $this->Count($this,"where carid = $carid");
    }
    
    public function get_viewing_count()
    {
       // echo $this;
        return $this->Count($this);
    }
    
    public function get_viewings()
    {
        return $this->FindBySql($this,"select * from viewing_model");
      //  return $this->articles;
    }
}
?>
