<?php
require_once(ROOT_PATH . "/Model/CarrierModel.php");
require_once(ROOT_PATH . "/Database/Database.php");

Class CarrierRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();    
    }

    public function findAll()
    {
        $carriers = [];
        $rows = $this->connection->findAll('carriers');
        foreach($rows as $carrier)
        {
            $carrierModel = new CarrierModel();
            $carrierModel->setId($carrier["ID"]);
            $carrierModel->setName($carrier["Name"]);
            array_push($carriers, $carrierModel);
        }

        return $carriers;
    }
}