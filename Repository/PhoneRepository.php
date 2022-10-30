<?php
require_once(ROOT_PATH . "/Model/PhoneModel.php");
require_once(ROOT_PATH . "/Database/Database.php");

Class PhoneRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();    
    }

    public function findAll()
    {
        $phones = [];
        $rows = $this->connection->findAll('phones');
        foreach($rows as $phone)
        {
            $phoneModel = new PhoneModel();
            $phoneModel->setId($phone["id"]);
            $phoneModel->setFirId($phone["FirID"]);
            array_push($phones, $phoneModel);
        }

        return $phones;
    }
}