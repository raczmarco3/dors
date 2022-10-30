<?php

use PHPUnit\Framework\TestCase;
include_once("../config.php");
include_once(ROOT_PATH . "/Controller/TypeController.php");

final class TypeControllerTest extends PHPUnit_Framework_TestCase
{
    public function testAddNewTypeWrongGroup()
    {
        $typeController = new TypeController();
        $this->assertSame("The value of group should be 1 or 2!", $typeController->addNewType("0", "name", " "));
    }

    public function testAddNewTypeEmptyName()
    {
        $typeController = new TypeController();
        $this->assertSame("The name should not be empty!", $typeController->addNewType("1", "", ""));
    }

    public function testAddNewTypeTooLongComment()
    {
        $typeController = new TypeController();
        $this->assertSame("The comment's max length is 255 character!", $typeController->addNewType("1", "asd", "ryiSQlZ1h3a9gr76eCFZ4yNuy69BDFjBd5YhBppF2GXmuPwWcPdqv50WbGPFaZkUagJUNZnS5AWzHpGmuYTEgeheqPZQ9vvFlj7CSRfzOePJETMq5keulXzsFoPBvsmK8svhAgfmY6SQjrpKImexkeIDLNbrooLhyNpYC5RAhFA9PBeOppY2oOEyI2Kpc8SlEAb8ZXbMdXg3sLnsoA5d0CmvCXTAQLbkHhqdwzN07Ccw3z0vmvoJWfFhQZMcLjEf
        "));
    }

    public function testAddNewTypeSuccesfullAdd()
    {
        $typeController = new TypeController();
        $this->assertSame("New type is added successfully!", $typeController->addNewType("1", "asd", ""));
    }
}