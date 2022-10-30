<?php

use PHPUnit\Framework\TestCase;
include_once("../config.php");
include_once(ROOT_PATH . "/Controller/SimCardController.php");

final class SimCardControllerTest extends PHPUnit_Framework_TestCase
{
    public function testAddNewSimEmptyPhoneID()
    {
        $simCardController = new SimCardController();
        $this->assertSame("phoneID must be a number!", 
        $simCardController->addNewSim(" ", "0", "ambl", "test", "2022-10-16", "2022-10-07", "150", '192.168.0.25', 
        "8", "szoveg", "5", '1', $comment="", $creator=0, $updater=0));
    }
    
    public function testAddNewSimTooLongMobilnetIP()
    {
        $simCardController = new SimCardController();
        $this->assertSame("The mobilnetIP's max length is 100 character!", 
        $simCardController->addNewSim("5", "0", "ambl", "test", "2022-10-16", "2022-10-07", "150",
         "Da070FYliyjYkUO9dbpX4tFcoMJrrqInLhrQ3Dfv31rlNR6uRdvQvOW2GRFr2oLjzWAbgUFAFwHamy4O0j1Oinbf9XZwzVtH8cIPn", 
        "8", "szoveg", "5", '1', $comment="", $creator=0, $updater=0));
    } 

    public function testAddNewSimEmptyCarrierID()
    {
        $simCardController = new SimCardController();
        $this->assertSame("carrierID must be a number!", 
        $simCardController->addNewSim("5", "0", "ambl", "test", "2022-10-16", "2022-10-07", "150", "192.168.0.1", 
        " ", "szoveg", "5", '1', $comment="", $creator=0, $updater=0));
    } 

    public function testAddNewSimEmptyTypeID()
    {
        $simCardController = new SimCardController();
        $this->assertSame("typeID must be a number!", 
        $simCardController->addNewSim("5", "0", "ambl", "test", "2022-10-16", "2022-10-07", "5", "3", 
        "8", "asd", " ", '1', $comment="", $creator=0, $updater=0));
    } 

    public function testAddNewSimSuccesfull()
    {
        $simCardController = new SimCardController();
        $this->assertSame("New SIM is added successfully!", 
        $simCardController->addNewSim("5", "0", "ambl", "test", "2022-10-16", "2022-10-07", "150", "192.168.0.1", 
        "3", "szoveg", "5", '1', $comment="", $creator=0, $updater=0));
    }
}