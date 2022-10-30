<?php

Class PhoneModel
{
    private $id;
    private $firId;

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
     * Get the value of firId
     */ 
    public function getFirId()
    {
        return $this->firId;
    }

    /**
     * Set the value of firId
     *
     * @return  self
     */ 
    public function setFirId($firId)
    {
        $this->firId = $firId;
        return $this;
    }
}