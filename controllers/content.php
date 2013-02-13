<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Content_Controller
{
    //template
    public $template='content';
    
    
    
    //function to add content
    public function add(array $getVars)
    {
        
    }
    
    
    
    public function main(array $getVars)
    {
      /*  $vars = print_r($getVars,TRUE);
        print "welcome to the frontpage controller";
        print $vars;*/
        
        $contentModel = new Content_Model;
     //   print_r($frontpageModel->print_articles());
        
       // $article = $contentModel->get_article($getVars['article']);
        
        
        $navigation = new View_Model('navigation');
        
        $master = new View_Model($this->template);
          //assign article data to view
        $master->assign('navigation',$navigation->render(FALSE));
        $master->assign('articlecount',$contentModel->get_article_count());
        $master->assign('articleslist',$contentModel->get_articles());
        
        //show the page
        $master->render();
        //$view->assign('title' , $article['title']);
        //$view->assign('content' , $article['content']);
        
    }
}


?>
