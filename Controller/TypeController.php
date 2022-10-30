<?php
include ROOT_PATH . "/Repository/TypeRepository.php";

Class TypeController
{
    private $typeRepository;

    public function __construct() 
    {
        $this->typeRepository = new TypeRepository();
    }

    public function addNewType($group, $name, $comment)
    {
        if(empty($comment)) {
            $comment = " ";
        }
        
        if($group != "1" && $group != "2") {
            return "The value of group should be 1 or 2!";
        } else if($name == "") {
            return "The name should not be empty!";
        } else if($comment != "" && strlen($comment)>255) {
            return "The comment's max length is 255 character!";
        } else {
            $typeModel = new TypeModel();
            $typeModel->setGroup($group);
            $typeModel->setName($name);
            $typeModel->setComment($comment);
            
            try {
                $this->typeRepository->save($typeModel);
                return "New type is added successfully!";
            } catch(Exception $e) {
                return $e->getMessage();
            }
        } 
    }

    public function getAllType() 
    {
        return $this->typeRepository->findAll();
    }
}