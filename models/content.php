<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
class Content_Model extends MyActiveRecord
{
    
    
    public $id;
    public $content;
    public $date;
    public $authorid;
    
    /*private $articles = array
    (
        //article 1
        'new' => array
        (
            'title' => 'New Website' ,
            'content' => 'Welcome to the site! We are glad to have you here.'
        )
        ,
        //2
        'mvc' => array
        (
            'title' => 'PHP MVC Frameworks are Awesome!' ,
            'content' => 'It really is very easy. Take it from us!'
        )
        ,
        //3
        'test' => array
        (
            'title' => 'Testing' ,
            'content' => 'This is just a measly test article.'
        )
    );*/
    
    public function get_date()
    {
        return $date;
    }
    
    
    public function __construct()
    {
    //    print 'I am the frontpage model';
        //db calls go here.  So for instance get list of articles etc...
    }
    
     public function get_article($articleName)
    {
        //fetch article from array
     //   $article = $this->articles[$articleName];
    $article = "";
        return $article;
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
