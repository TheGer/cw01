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
        
        
        $navigation = new View_Model('navigation');
        $addform = new View_Model('addcontent');
        
        
        $master = new View_Model($this->template);
          //assign article data to view
        $master->assign('navigation',$navigation->render(FALSE));
        $master->assign('articlecount',$contentModel->get_article_count());
        
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
        else
        {
        $master->assign('articleslist',$contentModel->get_articles());
        
        //if the user can add
        $master->assign('addform',$addform->render(FALSE));
        }
        //if the edit link was pressed
        
        
        //show the page
        $master->render();
        //$view->assign('title' , $article['title']);
        //$view->assign('content' , $article['content']);
        
    }
}


?>
