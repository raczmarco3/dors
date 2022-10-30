<?php
include ROOT_PATH . "/Repository/PhoneRepository.php";
include ROOT_PATH . "/Repository/CarrierRepository.php";
include ROOT_PATH . "/Repository/TypeRepository.php";
include ROOT_PATH . "/Repository/SimCardRepository.php";
require_once(ROOT_PATH . "/Model/PhoneModel.php");
require_once(ROOT_PATH . "/Model/CarrierModel.php");
require_once(ROOT_PATH . "/Model/TypeModel.php");
require_once(ROOT_PATH . "/Model/SimCardModel.php");

Class SimCardController
{
    private $simCardRepository;

    public function __construct()
    {   
        $this->simCardRepository = new SimCardRepository();     
    }

    public function getAllCarrier()
    {
        $carrierRepository = new CarrierRepository();
        return $carrierRepository->findAll();
    }

    public function getAllPhone()
    {
        $phoneRepository = new PhoneRepository();
        return $phoneRepository->findAll();
    }

    public function getAllType()
    {
        $typeRepository = new TypeRepository();
        return $typeRepository->findAll();
    }

    public function getAllSimCard()
    {
        return $this->simCardRepository->findAll();
    }

    public function addNewSim($phoneID, $slot, $mobileNumber, $imsi, $expiration, $mobilnetExpiration, $mobilnetDataLimit, $mobilnetIP, 
    $carrierID, $package, $typeID, $activated, $comment, $creator=0, $updater=0)
    {
        if(empty($comment)) {
            $comment = " ";
        }

        if(empty($phoneID) || (empty($slot) && !is_numeric($slot)) || empty($mobileNumber) || empty($imsi) || empty($expiration) 
        || empty($mobilnetExpiration) || (empty($mobilnetDataLimit) && !is_numeric($mobilnetDataLimit)) || empty($mobilnetIP) 
        || empty($carrierID) || empty($package) || empty($typeID) || (empty($activated) && !is_numeric($activated))) {
            return "Input fields must not be empty, except comment!";
        } else if(!is_numeric($phoneID)) {
            return "phoneID must be a number!";
        } else if(strlen($mobileNumber)>20) {
            return "The mobileNumber's max length is 20 character!";
        } else if(strlen($imsi)>100) {
            return "The imsi's max length is 100 character!";
        } else if(!is_numeric($mobilnetDataLimit)) {
            return "mobilnetDataLimit must be a number!";
        } else if(strlen($mobilnetIP)>100) {
            return "The mobilnetIP's max length is 100 character!";
        } else if(!is_numeric($carrierID)) {
            return "carrierID must be a number!";
        } else if(strlen($package)>100) {
            return "The package's max length is 100 character!";
        } else if(!is_numeric($typeID)) {
            return "typeID must be a number!";
        } else if(!is_numeric($slot)) {
            return "slot must be a number!";
        } else if(!is_numeric($activated)) {
            return "activated must be a number!";
        } else if(strlen($comment)>255) {
            return "The comment's max length is 255 character!";
        } else {
            $simCardModel = new SimCardModel();
            $simCardModel->setPhoneId($phoneID);
            $simCardModel->setSlot($slot);
            $simCardModel->setMobileNumber($mobileNumber);
            $simCardModel->setImsi($imsi);
            $simCardModel->setExpiration($expiration);
            $simCardModel->setMobilnetExpiration($mobilnetExpiration);
            $simCardModel->setMobilNetDataLimit($mobilnetDataLimit);
            $simCardModel->setMobilnetIp($mobilnetIP);
            $simCardModel->setCarrierId($carrierID);
            $simCardModel->setPackage($package);
            $simCardModel->setTypeId($typeID);
            $simCardModel->setActivated($activated);
            $simCardModel->setComment($comment);
            $simCardModel->setCreator($creator);
            $simCardModel->setUpdater($updater);

            try {
                $this->simCardRepository->save($simCardModel);
                return "New SIM is added successfully!";
            } catch(Exception $e) {
                return $e->getMessage();
            }            
        }
    }
}