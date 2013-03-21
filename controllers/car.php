<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Car_Controller
{
    //template
    public $template='displaycar';
    
    
    
    //function to add car
    public function add(array $getVars)
    {
        $carModel = new Car_Model();
        $carModel->name = $getVars['name'];
        $carModel->model = $getVars['model'];
        $carModel->enginesize = $getVars['enginesize'];
        $carModel->mileage = $getVars['mileage'];
        $carModel->notes = $getVars['notes'];
        $carModel->dateadded = $getVars['dateadded'];
        $carModel->featured = $getVars['featured'];
        
        return $carModel->save();
        
    }
    
    
    
    public function edit(array $getVars)
    {
        $carModel = new Car_Model();
        
        $carModel->name = $getVars['name'];
        $carModel->model = $getVars['model'];
        $carModel->enginesize = $getVars['enginesize'];
        $carModel->mileage = $getVars['mileage'];
        $carModel->notes = $getVars['notes'];
        $carModel->dateadded = $getVars['dateadded'];
        $carModel->featured = $getVars['featured'];
        
        $carModel->id = $getVars['id'];
        return $carModel->save();
        
    }
            
    
    public function main(array $getVars)
    {
     
        
        $carModel = new Car_Model;
        $contentModel = new Content_Model;
    
        
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
        
        //get the list of articles for the top menu bar
        $navigation->assign('articleslist',$contentModel->get_articles());
        
        //create the form to add a car
        $addform = new View_Model('addcar');
        
        
        $master = new View_Model($this->template);
          //assign article data to view
        
        if ($getVars['action']=='showedit')
        {
            $id = $getVars['id'];
            echo $id;
            $carModel = array_shift($carModel->get_article($id));
            $editform = new View_Model('editcar');
            $editform->assign('idtoedit',$carModel->id);
            $editform->assign('nametoedit',$carModel->name);
            $editform->assign('modeltoedit',$carModel->model);
            $editform->assign('enginesizetoedit',$carModel->enginesize);
            $editform->assign('mileagetoedit',$carModel->mileage);
            $editform->assign('notestoedit',$carModel->notes);
            $editform->assign('dateaddedtoedit',$carModel->dateadded);
            $editform->assign('featuredtoedit',$carModel->featured);
            
     
            $master->assign('editform',$editform->render(FALSE));
        }
        
        if ($getVars['action']=='showadd')
        {
            $master->assign('addform',$addform->render(FALSE));
            
        }
        
        //to do here: show featured cars because this is what the default for the cars will be
        //
        //
        //if the edit link was pressed
        
        
        //show the page
        $master->render();
        //$view->assign('title' , $article['title']);
        //$view->assign('car' , $article['car']);
        
    }
}


?>
