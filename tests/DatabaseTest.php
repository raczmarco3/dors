<?php

use PHPUnit\Framework\TestCase;
include_once("../config.php");
include_once(ROOT_PATH . "/Database/Database.php");

final class DatabaseTest extends PHPUnit_Framework_TestCase
{
    public function testSave()
    {
        $database = new Database();
        $this->assertTrue($database->save('types', '`Group`, `Name`, `Comment`', ['0', 'deletetest', 'deletetestComment']));
    } 

    public function testFindByIdWithExistingId()
    {
        $database = new Database();
        $this->assertSame('deletetest', $database->findOneById('types', 'Name', 'deletetest')["Name"]);
    }

    public function testFindByIdWithNotExistingId()
    {
        $database = new Database();
        $this->assertSame(null, $database->findOneById('types', 'id', '-1'));
    }    

    public function testEdit()
    {
        $database = new Database();
        $this->assertTrue($database->edit('types', ['Name' => 'deletetest2'], 'Comment', 'deletetestComment'));
    }

    public function testRemove()
    {
        $database = new Database();
        $this->assertTrue($database->remove('types', 'Name', 'deletetest2'));
    }
}