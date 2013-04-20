<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Car_Controller {

    //template
    public $template = 'listcars';

    //function to add car
    public function add(array $getVars) {
        $carModel = new Car_Model();
        $carModel->name = $getVars['name'];
        $carModel->model = $getVars['model'];
        $carModel->enginesize = $getVars['enginesize'];
        $carModel->mileage = $getVars['mileage'];
        $carModel->notes = $getVars['notes'];
        $carModel->color = $getVars['color'];
        $carModel->cartype = $getVars['cartype'];
        $carModel->dateadded = $getVars['dateadded'];
        $carModel->featured = $getVars['featured'];
        $carModel->save();
        return $carModel->id;
    }

    public function uploadimage(int $id) {       //to do implement upload image
        if (file_exists(SERVER_ROOT . '/uploads/' . $id . '/')) {
            echo $_FILES["file"] . ["name"] . " already exists";
        } else {
            move_uploaded_file($FILES["file"]["tmp_name"], SERVER_ROOT . '/uploads/' . $id . '/' . $FILES["file"]["name"]);
        }
    }

    public function edit(array $getVars) {
        $carModel = new Car_Model();

        $carModel->name = $getVars['name'];
        $carModel->model = $getVars['model'];
        $carModel->enginesize = $getVars['enginesize'];
        $carModel->mileage = $getVars['mileage'];
        $carModel->notes = $getVars['notes'];
        $carModel->dateadded = $getVars['dateadded'];
        $carModel->featured = $getVars['featured'];
        $carModel->color = $getVars['color'];
        $carModel->cartype = $getVars['cartype'];
        $carModel->id = $getVars['id'];
        return $carModel->save();
    }

    public function delete(array $getVars) {
        $carModel = new Car_Model();
        $carModel->id = $getVars['id'];
        return $carModel->delete();
    }

    public function carcount() {
        $carModel = new Car_Model();
        return $carModel->get_car_count();
    }

    public function getcarimages($id) {
        $carimages = Array();

        if ($handle = opendir(SERVER_ROOT . '/uploads/' . $id . '/')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    array_push($carimages, $entry);
                }
            }
        }
        return $carimages;
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
        
        $carModel = new Car_Model;
        $contentModel = new Content_Model;


        if ($getVars['action'] == 'add') {

            //create folder for images
            //  $path = SERVER_ROOT . "/uploads/".$this->add($getVars)."/";
            // echo $path;
            mkdir(SERVER_ROOT . "/uploads/" . $this->add($getVars) . "/");
        }

        if ($getVars['action'] == 'edit') {
            $this->edit($getVars);
        }

        if ($getVars['action'] == 'delete') {
            $this->delete($getVars);
        }





        if (!$loggedin) {
            $master = new View_Model('listcars');
            $master->assign('carslist', $carModel->get_cars_default());
            $navigation = new View_Model('navigation');
            $navigation->assign('articleslist', $contentModel->get_articles());
            $master->assign('navigation', $navigation->render(FALSE));
        } 
        
        if ($loggedin) {
            $master = new View_Model('listcars');
            $master->assign('carslist', $carModel->get_cars_default());
            
           // $master->assign('numberofviews',get_viewing_count_by_car($carid));
            $loggedinnav = new View_Model('loggedinnavigation');
            $loggedinnav->assign('articleslist', $contentModel->get_articles());
            $master->assign('navigation', $loggedinnav->render(FALSE));
        }
        
        if (($loggedin) && ($admin)) {
            $master = new View_Model('listcarsloggedin');
            $master->assign('carslist', $carModel->get_cars_default());
            
           // $master->assign('numberofviews',get_viewing_count_by_car($carid));
            $loggedinnav = new View_Model('adminnavigation');
            $loggedinnav->assign('articleslist', $contentModel->get_articles());
            $master->assign('navigation', $loggedinnav->render(FALSE));
        }


        if ($getVars['action'] == 'confirmviewing') {
            $viewingmodel = new Viewing_Model();
            $viewingmodel->carid = $getVars['carid'];
            $viewingmodel->dateofviewing = mktime($getVars['viewingdate']);
            //echo mktime($getVars['viewingdate']);
            $viewingmodel->save();
        }


        if ($getVars['action'] == 'bookviewing') {

            $id = $getVars['id'];
            $bookviewingview = new View_Model('/addforms/addviewing');
            $bookviewingview->assign('id',$id);
            $carmodel = array_shift($carModel->get_car($id));
            $bookviewingview->assign('name',$carmodel->name);
               $bookviewingview->assign('model',$carmodel->model);
            $master->assign('bookingform',$bookviewingview->render(FALSE));
            
        }

        if ($getVars['action'] == 'search') {
            
            //display search results
            $carModel->name = $getVars['searchname'];
            $carModel->model = $getVars['searchmodel'];
            $carModel->enginesize = $getVars['searchenginesize'];
            $carModel->mileage = $getVars['searchmileage'];
            $carModel->notes = $getVars['searchnotes'];
            $carModel->dateadded = $getVars['searchdateadded'];
            $carModel->featured = $getVars['searchfeatured'];
            $carModel->color = $getVars['searchcolor'];
            $carModel->cartype = $getVars['searchcartype'];

            //$master = new View_Model($this->template);
            
            
            $searchstring ="";
            foreach ($carModel as $key=>$value)
            {
                if ($value != "")
                {
                    if ($searchstring=="")
                    {
                    $searchstring = $searchstring."$key='$value'";
                    }
                    else
                    {
                     $searchstring = $searchstring." AND $key='$value'";    
                    }
                }
            }
            
        //    echo $searchstring;
            
            $master->assign('carslist', $carModel->FindAll("car_model",$searchstring));
        }


        if ($getVars['action'] == 'showdetails') {
            $id = $getVars['id'];

            $detailsview = new View_Model('cardetails');

            $carmodel = array_shift($carModel->get_car($id));
            $detailsview->assign('id', $carmodel->id);
            $detailsview->assign('carname', $carmodel->name);
            $detailsview->assign('carmodel', $carmodel->model);
            $detailsview->assign('carenginesize', $carmodel->enginesize);
            $detailsview->assign('carmileage', $carmodel->mileage);
            $detailsview->assign('carnotes', $carmodel->notes);
            $detailsview->assign('cardateadded', $carmodel->dateadded);
            $detailsview->assign('color', $carmodel->color);
            $detailsview->assign('featured', $carmodel->featured);
            $detailsview->assign('cartype', $carmodel->cartype);


            $detailsview->assign('carimages', $this->getcarimages($id));


            $master->assign('detailsview', $detailsview->render(FALSE));
        }


        if ($getVars['action'] == 'showsearch') {

            $searchform = new View_Model('searchform');
            $master->assign('searchform', $searchform->render(FALSE));
        }
        
        
         if (($getVars['action'] == 'showdetails') && ($loggedin)) {
            $id = $getVars['id'];

            $detailsview = new View_Model('cardetailsloggedin');

            $carmodel = array_shift($carModel->get_car($id));
            $detailsview->assign('id', $carmodel->id);
            $detailsview->assign('carname', $carmodel->name);
            $detailsview->assign('carmodel', $carmodel->model);
            $detailsview->assign('carenginesize', $carmodel->enginesize);
            $detailsview->assign('carmileage', $carmodel->mileage);
            $detailsview->assign('carnotes', $carmodel->notes);
            $detailsview->assign('cardateadded', $carmodel->dateadded);
            $detailsview->assign('color', $carmodel->color);
            $detailsview->assign('featured', $carmodel->featured);
            $detailsview->assign('cartype', $carmodel->cartype);


            $detailsview->assign('carimages', $this->getcarimages($id));


            $master->assign('detailsview', $detailsview->render(FALSE));
        }
        
        
        
        if (($getVars['action'] == 'listviewings') && ($loggedin)  && ($admin)){
            //list viewings page
          //  echo "test";
            $id = $getVars['id'];
            
            $listviewingform = new View_Model('listviewings');
            $viewingmodel = new Viewing_Model();
            $listviewingform->assign('viewinglist',$viewingmodel->get_viewings_by_car($id));
            
            // echo $id;
           // $carModel = array_shift($carModel->get_article($id));
        }

        if (($getVars['action'] == 'showedit') && ($loggedin) && ($admin)) {

            $id = $getVars['id'];
            // echo $id;
            $carModel = array_shift($carModel->get_car($id));
            $editform = new View_Model('/editforms/editcar');
            $editform->assign('idtoedit', $carModel->id);
            $editform->assign('nametoedit', $carModel->name);
            $editform->assign('modeltoedit', $carModel->model);
            $editform->assign('enginesizetoedit', $carModel->enginesize);
            $editform->assign('mileagetoedit', $carModel->mileage);
            $editform->assign('notestoedit', $carModel->notes);
            $editform->assign('dateaddedtoedit', $carModel->dateadded);
            $editform->assign('featuredtoedit', $carModel->featured);
            $editform->assign('colortoedit', $carmodel->color);
            $editform->assign('featuredtoedit', $carmodel->featured);
            $editform->assign('cartypetoedit', $carmodel->cartype);

            $editimagesform = new View_Model('/editforms/editcarimages');
            $editimagesform->assign('idtoedit', $carmodel->id);

            $master->assign('editform', $editform->render(FALSE));
            $master->assign('editimagesform', $editimagesform->render(FALSE));
        }

        if (($getVars['action'] == 'showadd') && ($loggedin) && ($admin)) {
            $addform = new View_Model('/addforms/addcar');
            $master->assign('addform', $addform->render(FALSE));
        }



        $master->render();
    }

}

?>
