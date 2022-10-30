<?php

Class SimCardModel
{
    private $id;
    private $phoneID;
    private $slot;
    private $mobileNumber;
    private $imsi;
    private $expiration;
    private $mobilnetExpiration;
    private $mobilnetDataLimit;
    private $mobilnetIP;
    private $carrierID;
    private $package;
    private $typeID;
    private $activated;
    private $comment;
    private $creator;
    private $created;
    private $updater;
    private $updated;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }    

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of phoneID
     */ 
    public function getPhoneID()
    {
        return $this->phoneID;
    }

    /**
     * Set the value of phoneID
     *
     * @return  self
     */ 
    public function setPhoneID($phoneID)
    {
        $this->phoneID = $phoneID;
        return $this;
    }

    /**
     * Get the value of slot
     */ 
    public function getSlot()
    {
        return $this->slot;
    }

    /**
     * Set the value of slot
     *
     * @return  self
     */ 
    public function setSlot($slot)
    {
        $this->slot = $slot;
        return $this;
    }

    /**
     * Get the value of mobileNumber
     */ 
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set the value of mobileNumber
     *
     * @return  self
     */ 
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
        return $this;
    }

    /**
     * Get the value of imsi
     */ 
    public function getImsi()
    {
        return $this->imsi;
    }

    /**
     * Set the value of imsi
     *
     * @return  self
     */ 
    public function setImsi($imsi)
    {
        $this->imsi = $imsi;
        return $this;
    }

    /**
     * Get the value of expiration
     */ 
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set the value of expiration
     *
     * @return  self
     */ 
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
        return $this;
    }

    /**
     * Get the value of mobilnetExpiration
     */ 
    public function getMobilnetExpiration()
    {
        return $this->mobilnetExpiration;
    }

    /**
     * Set the value of mobilnetExpiration
     *
     * @return  self
     */ 
    public function setMobilnetExpiration($mobilnetExpiration)
    {
        $this->mobilnetExpiration = $mobilnetExpiration;
        return $this;
    }

    /**
     * Get the value of mobilnetDataLimit
     */ 
    public function getMobilnetDataLimit()
    {
        return $this->mobilnetDataLimit;
    }

    /**
     * Set the value of mobilnetDataLimit
     *
     * @return  self
     */ 
    public function setMobilnetDataLimit($mobilnetDataLimit)
    {
        $this->mobilnetDataLimit = $mobilnetDataLimit;
        return $this;
    }

    /**
     * Get the value of mobilnetIP
     */ 
    public function getMobilnetIP()
    {
        return $this->mobilnetIP;
    }

    /**
     * Set the value of mobilnetIP
     *
     * @return  self
     */ 
    public function setMobilnetIP($mobilnetIP)
    {
        $this->mobilnetIP = $mobilnetIP;
        return $this;
    }

    /**
     * Get the value of carrierID
     */ 
    public function getCarrierID()
    {
        return $this->carrierID;
    }

    /**
     * Set the value of carrierID
     *
     * @return  self
     */ 
    public function setCarrierID($carrierID)
    {
        $this->carrierID = $carrierID;
        return $this;
    }

    /**
     * Get the value of package
     */ 
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Set the value of package
     *
     * @return  self
     */ 
    public function setPackage($package)
    {
        $this->package = $package;
        return $this;
    }

    /**
     * Get the value of typeID
     */ 
    public function getTypeID()
    {
        return $this->typeID;
    }

    /**
     * Set the value of typeID
     *
     * @return  self
     */ 
    public function setTypeID($typeID)
    {
        $this->typeID = $typeID;
        return $this;
    }

    /**
     * Get the value of activated
     */ 
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * Set the value of activated
     *
     * @return  self
     */ 
    public function setActivated($activated)
    {
        $this->activated = $activated;
        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Get the value of creator
     */ 
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Set the value of creator
     *
     * @return  self
     */ 
    public function setCreator($creator)
    {
        $this->creator = $creator;
        return $this;
    }

    /**
     * Get the value of created
     */ 
    public function getCreated()    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @return  self
     */ 
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get the value of updater
     */ 
    public function getUpdater()    {
        return $this->updater;
    }

    /**
     * Set the value of updater
     *
     * @return  self
     */ 
    public function setUpdater($updater)
    {
        $this->updater = $updater;
        return $this;
    }

    /**
     * Get the value of updated
     */ 
    public function getUpdated()    {
        return $this->updated;
    }

    /**
     * Set the value of updated
     *
     * @return  self
     */ 
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }
}