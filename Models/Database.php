<?php

class Database {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function createDriver($fullname, $contactnumber, $address){

        $sql = "INSERT INTO drivers_table VALUES (NULL, :fullname, :contactnumber, :address, :isdeleted)";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':fullname', $fullname);
        $stm->bindValue(':contactnumber', $contactnumber);  
        $stm->bindValue(':address', $address);
        $stm->bindValue(':isdeleted', 0);

        $status = $stm->execute();
        return ($status) ? $this->pdo->lastInsertId() : 0;
    }

    public function createFuelLog($userid, $driverid, $vehicleid, $amountoffuel, $triplocation, $fuellogdate){

        $sql = "INSERT INTO fuel_logs_table VALUES (NULL, :userid, :driverid, :vehicleid, :amountoffuel, :triplocation, :fuellogdate)";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':userid', $userid);
        $stm->bindValue(':driverid', $driverid);  
        $stm->bindValue(':vehicleid', $vehicleid);
        $stm->bindValue(':amountoffuel', $amountoffuel);
        $stm->bindValue(':triplocation', $triplocation);
        $stm->bindValue(':fuellogdate', $fuellogdate);

        $status = $stm->execute();
        return ($status) ? $this->pdo->lastInsertId() : 0;
    }

    public function createUser($username, $password, $fullname, $usertype){

        $sql = "INSERT INTO user_table VALUES (NULL, :username, :password, :fullname, :usertype, :isdeleted)";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':username', $username);
        $stm->bindValue(':password', $password);  
        $stm->bindValue(':fullname', $fullname);
        $stm->bindValue(':usertype', $usertype);
        $stm->bindValue(':isdeleted', 0);

        $status = $stm->execute();
        return ($status) ? $this->pdo->lastInsertId() : 0;
    }

    public function createVehicle($vehiclename, $typeofvehicle, $status){

        $sql = "INSERT INTO vehicles_table VALUES (NULL, :vehiclename, :typeofvehicle, :status, :isdeleted)";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':vehiclename', $vehiclename);
        $stm->bindValue(':typeofvehicle', $typeofvehicle);  
        $stm->bindValue(':status', $status);
        $stm->bindValue(':isdeleted', 0);

        $status = $stm->execute();
        return ($status) ? $this->pdo->lastInsertId() : 0;
    }

    public function deleteDriver($driverid){

        $sql = "UPDATE drivers_table 
        SET 
        isdeleted = :isdeleted 
        where driverid = :driverid"; 
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':driverid', $driverid);
        $stm->bindValue(':isdeleted', 1);

        $status = $stm->execute();
        return $status;
    }

    public function deleteFuelLog($fuellogid){

        $sql = "DELETE  
        FROM fuel_logs_table 
        WHERE 
        fuellogid = :fuellogid"; 
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':fuellogid', $fuellogid);
        
        $status = $stm->execute();
        return $status;
    }


    public function deleteUser($userid){

        $sql = "UPDATE user_table 
        SET 
        isdeleted = :isdeleted 
        where userid = :userid"; 
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':userid', $userid);
        $stm->bindValue(':isdeleted', 1);

        $status = $stm->execute();
        return $status;
    }

    public function deleteVehicle($vehicleid){

        $sql = "UPDATE vehicles_table 
        SET 
        isdeleted = :isdeleted 
        where vehicleid = :vehicleid"; 
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':vehicleid', $vehicleid);
        $stm->bindValue(':isdeleted', 1);

        $status = $stm->execute();
        return $status;
    }

    public function selectDashboard(){
        $stm = $this->pdo->prepare("SELECT 
            (SELECT COUNT(*) FROM drivers_table WHERE isdeleted = 0) AS numberofdrivers,
            (SELECT COUNT(*) FROM vehicles_table WHERE isdeleted = 0) AS numberofvehicles,
            (SELECT COUNT(*) FROM user_table WHERE isdeleted = 0) AS numberofusers,
            (SELECT COUNT(*) FROM fuel_logs_table) AS numberoflogs");
        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectDrivers(){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM drivers_table 
            WHERE isdeleted = 0");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }


    public function selectDriverByID($driverid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM drivers_table
            WHERE driverid = :driverid");

        $stm->bindValue(':driverid', $driverid);  

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    
    public function selectFuelLogByID($fuellogid){
        $stm = $this->pdo->prepare("SELECT
            *
            FROM 
            fuel_logs_view
            WHERE fuellogid = :fuellogid");

        $stm->bindValue(':fuellogid', $fuellogid);  

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectFuelLogs(){
        $stm = $this->pdo->prepare("SELECT
            *
            FROM 
            fuel_logs_view");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }


    public function selectUser($username, $password){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM user_table
            WHERE BINARY username = :username
            AND password = :password 
            AND isdeleted = 0");

        $stm->bindValue(':username', $username);  
        $stm->bindValue(':password', $password); 

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectUserByID($userid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM user_table
            WHERE userid = :userid");

        $stm->bindValue(':userid', $userid);  

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectUsername($username){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM user_table
            WHERE username = :username");

        $stm->bindValue(':username', $username);  

        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectUsers(){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM user_table 
            WHERE isdeleted = 0");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectVehicleByID($vehicleid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM vehicles_table
            WHERE vehicleid = :vehicleid");

        $stm->bindValue(':vehicleid', $vehicleid);  

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectVehicles(){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM vehicles_table 
            WHERE isdeleted = 0");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    } 

    public function updateDriver($driverid, $fullname, $contactnumber, $address){

        $sql = "UPDATE drivers_table 
        SET 
        fullname = :fullname, 
        contactnumber = :contactnumber, 
        address = :address 
        where driverid = :driverid";
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':driverid', $driverid);
        $stm->bindValue(':fullname', $fullname);  
        $stm->bindValue(':contactnumber', $contactnumber);
        $stm->bindValue(':address', $address);

        $status = $stm->execute();
        return $status;
    }

    public function updateFuelLog($fuellogid, $userid, $driverid, $vehicleid, $amountoffuel, $triplocation, $fuellogdate){

        $sql = "UPDATE fuel_logs_table 
        SET 
        userid = :userid, 
        driverid = :driverid, 
        vehicleid = :vehicleid, 
        amountoffuel = :amountoffuel, 
        triplocation = :triplocation, 
        fuellogdate = :fuellogdate 
        where fuellogid = :fuellogid";
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':fuellogid', $fuellogid);
        $stm->bindValue(':userid', $userid);  
        $stm->bindValue(':driverid', $driverid);
        $stm->bindValue(':vehicleid', $vehicleid);
        $stm->bindValue(':amountoffuel', $amountoffuel);
        $stm->bindValue(':triplocation', $triplocation);
        $stm->bindValue(':fuellogdate', $fuellogdate);

        $status = $stm->execute();
        return $status;
    }


    public function updateUser($userid, $password, $fullname, $usertype){

        $sql = "UPDATE user_table 
        SET 
        password = :password, 
        fullname = :fullname, 
        usertype = :usertype 
        where userid = :userid";
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':userid', $userid);
        $stm->bindValue(':password', $password);  
        $stm->bindValue(':fullname', $fullname);
        $stm->bindValue(':usertype', $usertype);

        $status = $stm->execute();
        return $status;
    }

    public function updateVehicle($vehicleid, $vehiclename, $typeofvehicle, $status){

        $sql = "UPDATE vehicles_table 
        SET 
        vehiclename = :vehiclename, 
        typeofvehicle = :typeofvehicle, 
        status = :status 
        where vehicleid = :vehicleid";
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':vehicleid', $vehicleid);
        $stm->bindValue(':vehiclename', $vehiclename);  
        $stm->bindValue(':typeofvehicle', $typeofvehicle);
        $stm->bindValue(':status', $status);

        $status = $stm->execute();
        return $status;
    }
   
}