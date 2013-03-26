<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Content_Controller
{
    //template
    public $template='displaycontent';
    
    
    
    //function to add content
    public function add(array $getVars)
    {
        $contentModel = new Content_Model();
        $contentModel->authorid = $getVars['authorid'];
        $contentModel->content = $getVars['content'];
        $contentModel->date = $getVars['date'];
        
        
        return $contentModel->save();
        
    }
    
    
    
    public function edit(array $getVars)
    {
        $contentModel = new Content_Model();
        
        $contentModel->content = $getVars['content'];
        
        $contentModel->id = $getVars['id'];
        return $contentModel->save();
        
    }
            
    
    public function main(array $getVars)
    {
      /*  $vars = print_r($getVars,TRUE);
        print "welcome to the frontpage controller";
        print $vars;*/
        
        $contentModel = new Content_Model;
     //   print_r($frontpageModel->print_articles());
        
       // $article = $contentModel->get_article($getVars['article']);
        
        if ($getVars['action']=='add')
        {
       //     echo 'add';
            $this->add($getVars);
        }
        
        if ($getVars['action']=='edit')
        {
            $this->edit($getVars);
        }
        
        
       if (!isset($_SESSION['username']))
        {
        $master->assign('navigation',$navigation->render(FALSE));
        $master->assign('loginform',$loginform->render(FALSE));
        }
        else 
        {
        $loggedinnav = new View_Model('loggedinnavigation');
        $loggedinnav->assign('articleslist',$contentModel->get_articles());
        $master->assign('navigation',$loggedinnav->render(FALSE));
       
        }
            
        $navigation->assign('articleslist',$contentModel->get_articles());
        
        
        $addform = new View_Model('addcontent');
        
        
        $master = new View_Model($this->template);
          //assign article data to view
        
        if ($getVars['action']=='showedit')
        {
            $id = $getVars['id'];
            echo $id;
            $contentModel = array_shift($contentModel->get_article($id));
            $editform = new View_Model('editcontent');
            $editform->assign('idtoedit',$contentModel->id);
            $editform->assign('texttoedit',$contentModel->content);
            $master->assign('editform',$editform->render(FALSE));
        }
        
        if ($getVars['action']=='showadd')
        {
            $master->assign('addform',$addform->render(FALSE));
            
        }
        
        if ($getVars['article']!= "")   
        { 
            
          $master->assign('article',$contentModel->get_article_by_name($getVars['article']));
        }
        else
        {
            $master->assign('article',$contentModel->get_article_by_name("home"));
        }
        $master->assign('navigation',$navigation->render(FALSE));
        
        //if the edit link was pressed
        
        
        //show the page
        $master->render();
        //$view->assign('title' , $article['title']);
        //$view->assign('content' , $article['content']);
        
    }
}


?>
