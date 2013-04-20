<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Users_Controller {

    //template
    public $template = 'listusers';

    
    public function count()
    {
        $userModel = new Users_Model();
        return $userModel->get_user_count();
    }
    //function to add content
    public function add(array $getVars) {
        $userModel = new Users_Model();
      
        $userModel->username = $getVars['username'];
        $userModel->password = md5($getVars['password']);
        $userModel->firstname = $getVars['firstname'];
        $userModel->secondname = $getVars['secondname'];
        $userModel->address = $getVars['address'];
        $userModel->type = $getVars['type'];


        return $userModel->save();
    }

    public function delete(array $getVars) {
        //  print_r($getVars);
        $userModel = new Users_Model();
        $userModel->id = $getVars['id'];
        return $userModel->delete();
    }

    public function edit(array $getVars) {
        $userModel = new Users_Model();

        $userModel->username = $getVars['username'];
        $userModel->password = md5($getVars['password']);
        $userModel->firstname = $getVars['firstname'];
        $userModel->secondname = $getVars['secondname'];
        $userModel->address = $getVars['address'];
        $userModel->type = $getVars['type'];
        $userModel->id = $getVars['id'];
        return $userModel->save();
    }

    public function main(array $getVars) {

        $loggedin = false;
        $admin = false;
        if (isset($_SESSION['username'])) {
            $loggedin = true;
        }
        
        
        if ($_SESSION['usertype']<4) {
            $admin = true;
        }
        
        //for the top navigation menu
        $contentModel = new Content_Model;
        
        //user class
        $userModel = new Users_Model;

        if (($getVars['action'] == 'add')) {
            //this handles both add and register
            $this->add($getVars);
        }

        if (($getVars['action'] == 'edit') && ($loggedin)) {
            $this->edit($getVars);
        }
        if (($getVars['action'] == 'delete') && ($loggedin)) {
            $this->delete($getVars);
        }

        if ($getVars['action'] == 'logout') {

            session_destroy();
            //when you log out, take the user outside
            header("Location:" . SITE_ROOT);
        }


        $navigation = new View_Model('navigation');

        $navigation->assign('articleslist', $contentModel->get_articles());





        $master = new View_Model($this->template);
        

        if (($getVars['action'] == 'showedit') && ($loggedin) && (!$admin)) {
            $id = $getVars['id'];
              //echo "test".$id;
            $userModel = array_shift($userModel->get_user_by_id($id));
            $editform = new View_Model('editforms/editprofile');
            $editform->assign('idtoedit', $userModel->id);
            $editform->assign('usernametoedit', $userModel->username);
            
            $editform->assign('passwordtoedit', $userModel->password);
            $editform->assign('firstnametoedit', $userModel->firstname);
            $editform->assign('secondnametoedit', $userModel->secondname);
            $editform->assign('addresstoedit', $userModel->address);
         

            $master->assign('editform', $editform->render(FALSE));
        }
        
        
        if (($getVars['action'] == 'showedit') && ($loggedin) && ($admin)) {
            $id = $getVars['id'];
              //echo "test".$id;
            $userModel = array_shift($userModel->get_user_by_id($id));
            $editform = new View_Model('editforms/edituser');
            $editform->assign('idtoedit', $userModel->id);
            $editform->assign('usernametoedit', $userModel->username);
            
            $editform->assign('passwordtoedit', $userModel->password);
            $editform->assign('firstnametoedit', $userModel->firstname);
            $editform->assign('secondnametoedit', $userModel->secondname);
            $editform->assign('addresstoedit', $userModel->address);
            $editform->assign('typetoedit', $userModel->type);

            $master->assign('editform', $editform->render(FALSE));
        }

        if (($getVars['action'] == 'showadd') && ($loggedin) && ($admin)) {
            $addform = new View_Model('addforms/adduser');
            $master->assign('addform', $addform->render(FALSE));
        }

        if ($getVars['action'] == 'register') {
            $registerform = new View_Model('addforms/registeruser');
            $master->assign('addform', $registerform->render(FALSE));
        }

       
        $loginform = new View_Model('login');

        if (!$loggedin) {
            //show login form
            $master->assign('navigation', $navigation->render(FALSE));
            if (!isset($getVars['action'])) {
                $master->assign('loginform', $loginform->render(FALSE));
            }
        } 
        
        
         if ($getVars['action'] == 'editviewings') {
             
             
             
            $listviewings = new View_Model('listviewings');
            
            $viewingmodel = new Viewing_Model();
            
            $listviewings->assign('viewinglist',$viewingmodel->getviewingsbyuser($_SESSION['userid'])); 
             
            $master->assign('viewingslist', $listviewings->render(FALSE));
        }
        
        
        
        
        if (($loggedin) && (!$admin)) {
            $loggedinnav = new View_Model('loggedinnavigation');
            $loggedinnav->assign('articleslist', $contentModel->get_articles());
            $master->assign('navigation', $loggedinnav->render(FALSE));
            
            $profile = new View_Model('profile');
        
            $currentUser = new Users_Model();
            
            $currentUser = array_shift($userModel->get_user_by_id($_SESSION['userid']));
            
            $profile->assign('firstname',$currentUser->firstname);
            $profile->assign('secondname',$currentUser->secondname);
            $profile->assign('address',$currentUser->address);
            $profile->assign('id',$currentUser->id);
            
            $master->assign('profile',$profile->render(FALSE));
        }
        
        
        
        if (($loggedin) && ($admin)) {
            $loggedinnav = new View_Model('adminnavigation');
            $loggedinnav->assign('articleslist', $contentModel->get_articles());
            $master->assign('navigation', $loggedinnav->render(FALSE));
            $master->assign('users', $userModel->get_users());
        }






        $master->render();
    }

}

?>
