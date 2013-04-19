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
            
    
    public function main(array $getVars)
    {
   
    }
    
}


?>
