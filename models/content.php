<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
class Content_Model extends MyActiveRecord
{
    
    
    public $id;
    public $name;
    public $title;
    public $content;
    public $date;
    public $authorid;
    

    
    public function get_date()
    {
        return $date;
    }
    
    
    public function __construct()
    {
    //    print 'I am the frontpage model';
        //db calls go here.  So for instance get list of articles etc...
    }
    
     public function get_article($id)
    {
        //fetch article from array
     
         return $this->FindBySql($this,"select * from content_model where id=$id");
        
    }
    
    
    public function get_article_by_name($name)
    {
        $name = mysql_real_escape_string($name);
        $sql = "select * from content_model where name = '$name'";
        return $this->FindBySql($this,$sql);
    }
    
    
    
    public function get_article_count()
    {
       // echo $this;
        return $this->Count($this);
    }
    
    
    
    public function get_articles()
    {
        
        return $this->FindBySql($this,"select * from content_model order by date");
      //  return $this->articles;
    }
}
?>
