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
      
        
        $contentModel = new Content_Model;
        $userModel = new Users_Model;
     
        if ($getVars['action']=='add')
        {
       //     echo 'add';
            $this->add($getVars);
        }
        
        if ($getVars['action']=='edit')
        {
            $this->edit($getVars);
        }
        
        if ($getVars['action']=='logout')
        {
           
            session_destroy();
        }
        
        
        $navigation = new View_Model('navigation');
        
        $navigation->assign('articleslist',$contentModel->get_articles());
        
        
      
        
        
        $master = new View_Model($this->template);
          //assign article data to view
        
        if ($getVars['action']=='showedit')
        {
            $id = $getVars['id'];
            echo $id;
            $userModel = array_shift($userModel->get_user_by_id($id));
            $editform = new View_Model('edituser');
            $editform->assign('idtoedit',$userModel->id);
            $editform->assign('passwordtoedit',$userModel->password);
            $editform->assign('firstnametoedit',$userModel->firstname);
            $editform->assign('secondnametoedit',$userModel->secondname);
            $editform->assign('addresstoedit',$userModel->address);
            $editform->assign('typetoedit',$userModel->type);
            
            $master->assign('editform',$editform->render(FALSE));
        }
        
        if ($getVars['action']=='showadd')
        {
              $addform = new View_Model('adduser');
            $master->assign('addform',$addform->render(FALSE));
            
        }
       
        
        //to do here: show list of users because this is the default page for the users
       
        $loginform = new View_Model('login');
        
        
       
        
        
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
        $master->assign('users',$userModel->get_users());    
        }
        
        
        
        
        
        
        //if the edit link was pressed
        
        
        //show the page
        $master->render();
        //$view->assign('title' , $article['title']);
        //$view->assign('content' , $article['content']);
        
    }
}


?>
