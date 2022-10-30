<?php

require_once(ROOT_PATH . '/Database/db_config.php');

Class Database
{
    private $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function findOneById($table, $primaryKeyName, $id, $options="*")
    {
        $query = "SELECT $options FROM $table WHERE `$primaryKeyName`='$id';";        
        $result = $this->connection->query($query);

        if ($result) {            
            return $result->fetch_assoc();
        } else {
            throw new Exception($this->connection->error);
        } 
    }

    public function findAll($table)
    {
        $query = "SELECT * FROM $table;";
        try {
            return $this->connection->query($query);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function save($table, $columns, $values = [])
    {          
        $query = "INSERT INTO $table (";
        $query = $query.$columns.')';
        $query = $query." VALUES (";

        $temp="";
        for($i=0; $i<count($values); $i++) {
            if($i<count($values)-1) {
                $temp = $temp."'".$values[$i]."', ";
            } else {
                $temp = $temp."'".$values[$i]."')";
            }                
        }   

        $query = $query.$temp.";";   
        if ($this->connection->query($query) === TRUE) {
            return true;
        } else {
            throw new Exception($this->connection->error);
        }
    }    

    public function remove($table, $primaryKeyName, $id)
    {
        $query = "DELETE FROM $table WHERE `$primaryKeyName`='$id'";

        if ($this->connection->query($query) === TRUE) {
            return true;
        } else {
            throw new Exception($this->connection->error);
        }
    }

    //$columns = ['columnName' => 'value'];
    public function edit($table, $columns = array(array()), $primaryKeyName, $id)
    {
        $query = "UPDATE $table SET ";

        $temp = "";
        while($value = current($columns)) {
            $temp = $temp.'`'.key($columns)."`='".$value."', ";
            next($columns);
        }
        //Remove last ", "
        $temp = rtrim($temp, ", ");
        $query = $query . $temp . " WHERE `$primaryKeyName`='$id';";

        if ($this->connection->query($query) === TRUE) {
            return true;
        } else {
            throw new Exception($this->connection->error);
        } 
    }
}