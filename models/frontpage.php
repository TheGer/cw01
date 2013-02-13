<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
class Frontpage_Model
{
    
    private $articles = array
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
    );
    
    
    public function __construct()
    {
    //    print 'I am the frontpage model';
        //db calls go here.  So for instance get list of articles etc...
    }
    
     public function get_article($articleName)
    {
        //fetch article from array
        $article = $this->articles[$articleName];
    
        return $article;
    }
    
    public function print_articles()
    {
        return $this->articles;
    }
}
?>
