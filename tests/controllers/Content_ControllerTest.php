<?php

define('SERVER_ROOT', 'c:\xampp\htdocs\cw01');
define('MYACTIVERECORD_CONNECTION_STR', 'mysql://root@localhost/coursework');

require("../../libraries/MyActiveRecord.php");

require("../../controllers/content.php");
require("../../models/content.php");

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-26 at 18:39:48.
 */
class Content_ControllerTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Content_Controller
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Content_Controller;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }
   
    //deletes article with id 13
   /*
    public function testArticleCount()
    {
        $this->assertEquals(2,$this->object->articlecount());
    }
    
 
    public function testDelete()
    {
            $simulatedGetVars['id']=13;
            $this->assertTrue($this->object->delete($simulatedGetVars));
    }
    * 
    */
    
    
    //if there are three cars in DB test that the count is accurate
    public function testAdd() {
        $simulatedGetVars['authorid']=5;
        $simulatedGetVars['title']="test";
        $simulatedGetVars['name']="testingcontent";
        $simulatedGetVars['content']="Test content";
        $this->assertTrue($this->object->add($simulatedGetVars));     
    }

    
     public function testEdit() {
        $simulatedGetVars['id']=15;
        $simulatedGetVars['title']="test updated";
        $simulatedGetVars['name']="testingcontent updated";
        $simulatedGetVars['content']="Test content updated";
        $this->assertTrue($this->object->edit($simulatedGetVars));     
    }
}
