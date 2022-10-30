<?php
require_once(ROOT_PATH . "/Model/TypeModel.php");
require_once(ROOT_PATH . "/Database/Database.php");

Class TypeRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();    
    }

    public function save($typeModel)
    {
        try {
            $this->connection->save("Types", "`Group`, `Name`, `Comment`", [$typeModel->getGroup(), $typeModel->getName(), $typeModel->getComment()]);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }        
    }

    public function findAll()
    {
        $types = [];
        $rows = $this->connection->findAll('types');
        foreach($rows as $type)
        {
            $typeModel = new TypeModel();
            $typeModel->setId($type["ID"]);
            $typeModel->setGroup($type["Group"]);
            $typeModel->setName($type["Name"]);
            $typeModel->setComment($type["Comment"]);
            $typeModel->setCreated($type["Created"]);
            $typeModel->setUpdated($type["Updated"]);
            array_push($types, $typeModel);
        }
        return $types;
    }
}
