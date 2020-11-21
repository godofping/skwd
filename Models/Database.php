<?php

class Database {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }


    public function createArea($areaname){

        $sql = "INSERT INTO area VALUES (NULL, :areaname)";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':areaname', $areaname);

        $status = $stm->execute();
        return ($status) ? $this->pdo->lastInsertId() : 0;
    }

    public function createPumpStation($areaid, $pumpstationname){

        $sql = "INSERT INTO pumping_station VALUES (NULL, :areaid, :pumpstationname)";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':areaid', $areaid);
        $stm->bindValue(':pumpstationname', $pumpstationname);  

        $status = $stm->execute();
        return ($status) ? $this->pdo->lastInsertId() : 0;
    }

    public function createUser($username, $password, $fullname, $usertype){

        $sql = "INSERT INTO user VALUES (NULL, :username, :password, :fullname, :usertype)";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':username', $username);
        $stm->bindValue(':password', $password);  
        $stm->bindValue(':fullname', $fullname);
        $stm->bindValue(':usertype', $usertype);

        $status = $stm->execute();
        return ($status) ? $this->pdo->lastInsertId() : 0;
    }

    public function deleteArea($areaid){

        $sql = "DELETE FROM 
        area 
        where areaid = :areaid"; 
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':areaid', $areaid);

        $status = $stm->execute();
        return $status;
    }

    public function deletePumpStation($pumpid){

        $sql = "DELETE FROM 
        pumping_station 
        where pumpid = :pumpid"; 
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':pumpid', $pumpid);

        $status = $stm->execute();
        return $status;
    }

    public function deleteUser($userid){

        $sql = "DELETE FROM 
        user 
        where userid = :userid"; 
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':userid', $userid);

        $status = $stm->execute();
        return $status;
    }

    public function selectAreaByID($areaid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM area
            WHERE areaid = :areaid");

        $stm->bindValue(':areaid', $areaid);  

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectAreas(){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM area");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectPumpStationByID($pumpid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM view_pumping_station
            WHERE pumpid = :pumpid");

        $stm->bindValue(':pumpid', $pumpid);  

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectPumpStations(){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM view_pumping_station");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }


    public function selectUser($username, $password){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM user
            WHERE BINARY username = :username
            AND password = :password");

        $stm->bindValue(':username', $username);  
        $stm->bindValue(':password', $password); 

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectUserByID($userid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM user
            WHERE userid = :userid");

        $stm->bindValue(':userid', $userid);  

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectUsername($username){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM user
            WHERE username = :username");

        $stm->bindValue(':username', $username);  

        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectUsers(){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM user");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function updateArea($areaid, $areaname){

        $sql = "UPDATE area 
        SET 
        areaname = :areaname
        where areaid = :areaid";
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':areaid', $areaid);
        $stm->bindValue(':areaname', $areaname);  

        $status = $stm->execute();
        return $status;
    }

    public function updatePumpStation($pumpid, $areaid, $pumpstationname){

        $sql = "UPDATE pumping_station 
        SET 
        areaid = :areaid, 
        pumpstationname = :pumpstationname 
        WHERE pumpid = :pumpid";
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':pumpid', $pumpid);
        $stm->bindValue(':areaid', $areaid);  
        $stm->bindValue(':pumpstationname', $pumpstationname);  

        $status = $stm->execute();
        return $status;
    }


    public function updateUser($userid, $password, $fullname, $usertype){

        $sql = "UPDATE user 
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


   
}