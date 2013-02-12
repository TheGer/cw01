<?php
//fetch the passed request
$request = $_SERVER['QUERY_STRING'];



//parse the page request and other GET variables
$parsed = explode('&' , $request);

//the page is the first element
$page = array_shift($parsed);

//the rest of the array are get statements, parse them out.
$getVars = array();
foreach ($parsed as $argument)
{
    //split GET vars along '=' symbol to separate variable, values
    list($variable , $value) = preg_split('[=]' , $argument);
    $getVars[$variable] = $value;
    $target = SERVER_ROOT . '/controllers/'.$page.'.php';
    
}
//get target
if (file_exists($target))
{
    include_once($target);

    //modify page to fit naming convention
    $class = ucfirst($page) . '_Controller';

    //instantiate the appropriate class
    if (class_exists($class))
    {
        $controller = new $class;
    }
    else
    {
        //did we name our class correctly?
        die('class does not exist!');
    }
}
else
{
    //can't find the file in 'controllers'! 
    die('page does not exist!');
}

//once we have the controller instantiated, execute the default function
//pass any GET varaibles to the main method
$controller->main($getVars);



/*
//this is a test , and we will be removing it later
print "The page your requested is '$page'";
print '<br/>';
$vars = print_r($getVars, TRUE);
print "The following GET vars were passed to the page:<pre>".$vars."</pre>";

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
