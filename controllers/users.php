<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Users_Controller
{
    //template
    public $template='displayuser';
    
    
    
    //function to add content
    public function add(array $getVars)
    {
        $userModel = new Users_Model();
        $userModel->id = $getVars['id'];
        $userModel->username = $getVars['username'];
        $userModel->password = $getVars['password'];
        $userModel->firstname = $getVars['firstname'];
        $userModel->secondname = $getVars['secondname'];
        $userModel->address = $getVars['address'];
        $userModel->type = $getVars['type'];
        
        
        return $userModel->save();
        
    }
    
    
    
    public function edit(array $getVars)
    {
        $userModel = new Users_Model();
        
         $userModel->username = $getVars['username'];
        $userModel->password = $getVars['password'];
        $userModel->firstname = $getVars['firstname'];
        $userModel->secondname = $getVars['secondname'];
        $userModel->address = $getVars['address'];
        $userModel->type = $getVars['type'];
       $userModel->id = $getVars['id'];
        return $userModel->save();
        
    }
            
    
    public function main(array $getVars)
    {
      /*  $vars = print_r($getVars,TRUE);
        print "welcome to the frontpage controller";
        print $vars;*/
        
        $contentModel = new Content_Model;
        $userModel = new User_Model;
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
        
        $navigation->assign('articleslist',$contentModel->get_articles());
        
        
        $addform = new View_Model('adduser');
        
        
        $master = new View_Model($this->template);
          //assign article data to view
        
        if ($getVars['action']=='showedit')
        {
            $id = $getVars['id'];
            echo $id;
            $userModel = array_shift($userModel->get_user_by_id($id));
            $editform = new View_Model('edituser');
            $editform->assign('idtoedit',$userModel->id);
            //stopping here...
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
