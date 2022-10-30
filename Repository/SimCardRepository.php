<?php
require_once(ROOT_PATH . "/Model/SimCardModel.php");
require_once(ROOT_PATH . "/Database/Database.php");

Class SimCardRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();    
    }

    public function save($simCardModel)
    {
        try {
            $this->connection->save("simcards", "`PhoneID`, `Slot`, `MobileNumber`, `IMSI`, `Expiration`, `MobilnetExpiration`,
             `MobilnetDataLimit`, `MobilnetIP`, `CarrierID`, `Package`, `TypeID`, `Activated`, `Comment`, `Creator`, `Updater`",
              [$simCardModel->getPhoneID(), $simCardModel->getSlot(), $simCardModel->getMobileNumber(), $simCardModel->getIMSI(),
               $simCardModel->getExpiration(), $simCardModel->getMobilnetExpiration(), $simCardModel->getMobilnetDataLimit(),
                $simCardModel->getMobilnetIP(), $simCardModel->getCarrierID(), $simCardModel->getPackage(), $simCardModel->getTypeID(),
                 $simCardModel->getActivated(), $simCardModel->getComment(), $simCardModel->getCreator(), $simCardModel->getUpdater()]);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }        
    }

    public function findAll()
    {
        $simCards = [];

        $rows = $this->connection->findAll('simcards');
        foreach($rows as $simcard)
        {
            $simCardModel = new SimCardModel();
            $simCardModel->setId($simcard["ID"]);
            $simCardModel->setPhoneId($simcard["PhoneID"]);
            $simCardModel->setSlot($simcard["Slot"]);
            $simCardModel->setMobileNumber($simcard["MobileNumber"]);
            $simCardModel->setImsi($simcard["IMSI"]);
            $simCardModel->setExpiration($simcard["Expiration"]);
            $simCardModel->setMobilnetExpiration($simcard["MobilnetExpiration"]);
            $simCardModel->setMobilNetDataLimit($simcard["MobilnetDataLimit"]);
            $simCardModel->setMobilnetIp($simcard["MobilnetIP"]);
            $simCardModel->setCarrierId($simcard["CarrierID"]);
            $simCardModel->setPackage($simcard["Package"]);
            $simCardModel->setTypeId($simcard["TypeID"]);
            $simCardModel->setActivated($simcard["Activated"]);
            $simCardModel->setComment($simcard["Comment"]);
            $simCardModel->setCreator($simcard["Creator"]);
            $simCardModel->setCreated($simcard["Created"]);
            $simCardModel->setUpdater($simcard["Updater"]);
            $simCardModel->setUpdated($simcard["Updated"]);
            array_push($simCards, $simCardModel);
        }

        return $simCards;
    }
}