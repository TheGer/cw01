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
            $this->add($getVars);
        }
        
        if ($getVars['action']=='edit')
        {
            $this->edit($getVars);
        }
        
        
        $navigation = new View_Model('navigation');
        
        //get the list of articles for the top menu bar
        $navigation->assign('articleslist',$contentModel->get_articles());
        
      
        
        $master = new View_Model($this->template);
        $master->assign('carslist',$carModel->get_cars_default()); 
        
         if ($getVars['action']=='showdetails')
         {
             $id = $getVars['id'];
             $detailsview = new View_Model('cardetails');
             $thiscar = array_shift($carModel->get_car($id));
             $detailsview->assign('carname',$thiscar->name);
             $detailsview->assign('carmodel',$thiscar->model);
             $detailsview->assign('carenginesize',$thiscar->enginesize);
             $detailsview->assign('carmileage',$thiscar->mileage);
             $detailsview->assign('carnotes',$thiscar->notes);
             $detailsview->assign('cardateadded',$thiscar->dateadded);
           
             
             $master->assign('detailsview',$detailsview->render(FALSE));
         }

        
        
        
        if ($getVars['action']=='showedit')
        {
            $id = $getVars['id'];
           // echo $id;
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
        
          //create the form to add a car
        $addform = new View_Model('addcar');
        
        
        
        if ($getVars['action']=='showadd')
        {
            $master->assign('addform',$addform->render(FALSE));
            
        }
        
        
        //show the page
        $master->render();
        //$view->assign('title' , $article['title']);
        //$view->assign('car' , $article['car']);
        
    }
}


?>
