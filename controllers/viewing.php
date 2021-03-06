<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Viewing_Controller
{
    //template
    public $template='displayviewing';
    
    //function to add content
    public function add(array $getVars)
    {
        $viewingModel = new Viewing_Model();
        $viewingModel->booked = $getVars['booked'];
        $viewingModel->userid = $getVars['userid'];
        $viewingModel->carid = $getVars['carid'];
        $viewingModel->dateofviewing = $getVars['dateofviewing'];
        $viewingModel->clientname=$getVars['clientname'];
        
        return $viewingModel->save();
        
    }
    
    
    
    public function edit(array $getVars)
    {
        $viewingModel = new Viewing_Model();
        $viewingModel->booked = $getVars['booked'];
        $viewingModel->userid = $getVars['userid'];
        $viewingModel->carid = $getVars['carid'];
        $viewingModel->dateofviewing = $getVars['dateofviewing'];
        
        
        return $viewingModel->save();
        
        
    }
    
     public function delete(array $getVars){
        $viewingModel = new Viewing_Model();
        $viewingModel->id = $getVars['id'];
        return $viewingModel->delete();
        
    }
    
    
    public function getviewingsbyuser($id)
    {
         return $this->FindBySql($this, "select * from viewing_model where id=$id");
    }
    
            
    
    public function main(array $getVars)
    {
         $loggedin = false;
        $admin = false;
        if (isset($_SESSION['username'])) {
            $loggedin = true;
        }
        
        
        if ($_SESSION['usertype']<4) {
            $admin = true;
        }
        
        
        if (($getVars['action'] == 'delete') && ($loggedin) && ($admin)){
            $this->delete($getVars);
            header("Location:".SITE_ROOT."?page=car&action=listviewings");
        }
        
         if (($getVars['action'] == 'delete') && ($loggedin) && (!$admin)){
            $this->delete($getVars);
            header("Location:".SITE_ROOT."?page=users&action=profile");
        }
       
        
        
        
    }
    
}


?>
