<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Frontpage_Controller
{
    //template
    public $template='frontpage';
    
    
    public function main(array $getVars)
    {
      /*  $vars = print_r($getVars,TRUE);
        print "welcome to the frontpage controller";
        print $vars;*/
        
        $frontpageModel = new Frontpage_Model;
     //   print_r($frontpageModel->print_articles());
        
        $article = $frontpageModel->get_article($getVars['article']);
        
        $view = new View_Model($this->template);
          //assign article data to view
        $view->assign('title' , $article['title']);
        $view->assign('content' , $article['content']);
        
    }
}


?>
