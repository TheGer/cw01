<?php
define('SERVER_ROOT', 'c:\xampp\htdocs\cw01');
define('MYACTIVERECORD_CONNECTION_STR', 'mysql://root@localhost/coursework');

require("../../libraries/MyActiveRecord.php");

require("../../controllers/car.php");
require("../../models/car.php");

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-26 at 18:39:34.
 */
class Car_ControllerTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Car_Controller
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Car_Controller;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    
    //if there are three cars in DB test that the count is accurate
    public function testCarCount(){
        $this->assertEquals(2,$this->object->carcount()); 
    }
   
    
    //tests deleting a car with ID 2
    public function testDelete()
    {
        $simulatedGetVars = Array();
        $simulatedGetVars['id'] = 2;
        $this->object->delete($simulatedGetVars);
        $this->assertEquals(2,$this->object->carcount());
    }
    
    
    public function testGetCarImages()
    {
        $numberofimages = count($this->object->getcarimages(1));
         $this->assertEquals(2,$numberofimages);
    }
    
}
