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
    
    public function uploadimage(int $id)
    {       //to do implement upload image
        if (file_exists(SERVER_ROOT . '/uploads/'.$id.'/'))
        {
            echo $_FILES["file"].["name"]." already exists";
        }
        else 
        {
            move_uploaded_file($FILES["file"]["tmp_name"], SERVER_ROOT . '/uploads/'.$id.'/'.$FILES["file"]["name"]);
            
        }     
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

        $master->assign('navigation',$navigation->render(FALSE));
        
        
        if ($getVars['action']=='showdetails')
         {
             $id = $getVars['id'];
             
             $detailsview = new View_Model('cardetails');
             
             $carmodel = array_shift($carModel->get_car($id));
             $detailsview->assign('carname',$carmodel->name);
             $detailsview->assign('carmodel',$carmodel->model);
             $detailsview->assign('carenginesize',$carmodel->enginesize);
             $detailsview->assign('carmileage',$carmodel->mileage);
             $detailsview->assign('carnotes',$carmodel->notes);
             $detailsview->assign('cardateadded',$carmodel->dateadded);
           
             $carimages = Array();
             
             if ($handle = opendir(SERVER_ROOT . '/uploads/'.$id.'/')){
                while (false !== ($entry = readdir($handle))) {
                 if ($entry !="." && $entry != "..")
                    {
                        array_push($carimages,$entry);
                    }
                }
             }
             $detailsview->assign('carimages',$carimages);
             
             
             $master->assign('detailsview',$detailsview->render(FALSE));
         }
    
        if ($getVars['action']=='showedit')
        {
            $id = $getVars['id'];
           // echo $id;
            $carModel = array_shift($carModel->get_article($id));
            $editform = new View_Model('/editforms/editcar');
            $editform->assign('idtoedit',$carModel->id);
            $editform->assign('nametoedit',$carModel->name);
            $editform->assign('modeltoedit',$carModel->model);
            $editform->assign('enginesizetoedit',$carModel->enginesize);
            $editform->assign('mileagetoedit',$carModel->mileage);
            $editform->assign('notestoedit',$carModel->notes);
            $editform->assign('dateaddedtoedit',$carModel->dateadded);
            $editform->assign('featuredtoedit',$carModel->featured);
            $editimagesform = new View_Model('/editforms/editcarimages');
            $editimagesform->assign('idtoedit',$carmodel->id);
     
            $master->assign('editform',$editform->render(FALSE));
            $master->assign('editimagesform',$editimagesform->render(FALSE));
            
        }
         
        if ($getVars['action']=='showadd')
        {
              $addform = new View_Model('/addforms/addcar');
            $master->assign('addform',$addform->render(FALSE));
            
        }
        
        
        
        $master->render();
       
    }
}


?>
