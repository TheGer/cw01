<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Content_Controller {

    //template
    public $template = 'displaycontent';

    //function to add content
    public function add(array $getVars) {
    //echo "test".$getVars['title'];
        $contentModel = new Content_Model();
        $contentModel->authorid = $getVars['authorid'];
        $contentModel->title = $getVars['title'];  
        $contentModel->name = $getVars['name'];  
        $contentModel->content = $getVars['content'];
       


        return $contentModel->save();
    }
    
    
     public function delete(array $getVars){
        $contentModel = new Content_Model();
        $contentModel->id = $getVars['id'];
        return $contentModel->delete();
        
    }
    

    public function edit(array $getVars) {
        $contentModel = new Content_Model();

        $contentModel->content = $getVars['content'];

        $contentModel->id = $getVars['id'];
        return $contentModel->save();
    }

    public function main(array $getVars) {

        $loggedin = false;
        if (isset($_SESSION['username'])) {
            $loggedin = true;
        }

        $contentModel = new Content_Model;

        if (($getVars['action'] == 'add') && ($loggedin)) {
            $this->add($getVars);
        }

        if (($getVars['action'] == 'edit') && ($loggedin)) {
            $this->edit($getVars);
        }
        
        if (($getVars['action'] == 'delete') && ($loggedin)) {
            $this->delete($getVars);
        }

        $navigation = new View_Model('navigation');
        $navigation->assign('articleslist', $contentModel->get_articles());

        if (!$loggedin) {
            $master = new View_Model($this->template);
            $master->assign('navigation', $navigation->render(FALSE));
            if ($getVars['article'] != "") {
                $master->assign('article', $contentModel->get_article_by_name($getVars['article']));
            } else {
                $master->assign('article', $contentModel->get_article_by_name("home"));
            }
        } else {
            //user is logged in but selects an article  
            if ($getVars['article'] != "") {
                $master = new View_Model($this->template);
                $master->assign('article', $contentModel->get_article_by_name($getVars['article']));
            } else {
                //if no article is mentioned list all articles  
                $master = new View_Model('displaycontentloggedin');
                $master->assign('articleslist', $contentModel->get_articles());
            }
            $loggedinnav = new View_Model('loggedinnavigation');
            $loggedinnav->assign('articleslist', $contentModel->get_articles());

            $master->assign('navigation', $loggedinnav->render(FALSE));
        }


       


        //assign article data to view

        if (($getVars['action'] == 'showedit') && ($loggedin)) {
            $id = $getVars['id'];
            //     echo $id;
            $contentModel = array_shift($contentModel->get_article($id));
            $editform = new View_Model('editforms/editcontent');
            $editform->assign('idtoedit', $contentModel->id);
            $editform->assign('texttoedit', $contentModel->content);
            $master->assign('editform', $editform->render(FALSE));
        }

        if (($getVars['action'] == 'showadd') && ($loggedin)) {
            
            $addform = new View_Model('addforms/addcontent');
            $master->assign('addform', $addform->render(FALSE));
        }



        //if the edit link was pressed
        //show the page
        $master->render();
        //$view->assign('title' , $article['title']);
        //$view->assign('content' , $article['content']);
    }

}

?>
