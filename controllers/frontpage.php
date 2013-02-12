<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Frontpage_Controller
{
    //template
    public $template='frontpage';
    
    
    public function main(array $getVars)
    {
        $vars = print_r($getVars,TRUE);
        print "welcome to the controller";
        print $vars;
    }
}


?>
