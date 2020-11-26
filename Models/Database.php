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

    public function createDataEntry($data){

        $sql = "INSERT INTO monthly_production_data VALUES (NULL, 
        :pumpingstationuserid, 
        :d10, 
        :e10, 
        :d11, 
        :d12, 
        :d13, 
        :d15, 
        :d16, 
        :d17, 
        :d19, 
        :d20, 
        :d21, 
        :d23, 
        :e23, 
        :d24, 
        :e24, 
        :d25, 
        :e25, 
        :e26, 
        :c27, 
        :d27, 
        :d30, 
        :e30, 
        :d31, 
        :e31, 
        :d32, 
        :e32, 
        :e33, 
        :c34, 
        :d34, 
        :d38, 
        :d39, 
        :d40, 
        :d43, 
        :e43, 
        :d44, 
        :e44, 
        :d45, 
        :e45, 
        :e46, 
        :c47, 
        :d47, 
        :d50, 
        :e50, 
        :d51, 
        :e51, 
        :d52, 
        :e52, 
        :e53, 
        :c55, 
        :d55, 
        :d58, 
        :e58, 
        :d59, 
        :e59, 
        :e60, 
        :d61, 
        :e61, 
        :d62, 
        :e62,  
        :e63, 
        :e65, 
        :forval, 
        :datecreated)";
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':pumpingstationuserid', $data['pumpingstationuserid']);
        $stm->bindValue(':d10', $data['d10']);
        $stm->bindValue(':e10', $data['e10']);
        $stm->bindValue(':d11', $data['d11']);
        $stm->bindValue(':d12', $data['d12']);
        $stm->bindValue(':d13', $data['d13']);
        $stm->bindValue(':d15', $data['d15']);
        $stm->bindValue(':d16', $data['d16']);
        $stm->bindValue(':d17', $data['d17']);
        $stm->bindValue(':d19', $data['d19']);
        $stm->bindValue(':d20', $data['d20']);
        $stm->bindValue(':d21', $data['d21']);
        $stm->bindValue(':d23', $data['d23']);
        $stm->bindValue(':e23', $data['e23']);
        $stm->bindValue(':d24', $data['d24']);
        $stm->bindValue(':e24', $data['e24']);
        $stm->bindValue(':d25', $data['d25']);
        $stm->bindValue(':e25', $data['e25']);
        $stm->bindValue(':e26', $data['e26']);
        $stm->bindValue(':c27', $data['c27']);
        $stm->bindValue(':d27', $data['d27']);
        $stm->bindValue(':d30', $data['d30']);
        $stm->bindValue(':e30', $data['e30']);
        $stm->bindValue(':d31', $data['d31']);
        $stm->bindValue(':e31', $data['e31']);
        $stm->bindValue(':d32', $data['d32']);
        $stm->bindValue(':e32', $data['e32']);
        $stm->bindValue(':e33', $data['e33']);
        $stm->bindValue(':c34', $data['c34']);
        $stm->bindValue(':d34', $data['d34']);
        $stm->bindValue(':d38', $data['d38']);
        $stm->bindValue(':d39', $data['d39']);
        $stm->bindValue(':d40', $data['d40']);
        $stm->bindValue(':d43', $data['d43']);
        $stm->bindValue(':e43', $data['e43']);
        $stm->bindValue(':d44', $data['d44']);
        $stm->bindValue(':e44', $data['e44']);
        $stm->bindValue(':d45', $data['d45']);
        $stm->bindValue(':e45', $data['e45']);
        $stm->bindValue(':e46', $data['e46']);
        $stm->bindValue(':c47', $data['c47']);
        $stm->bindValue(':d47', $data['d47']);
        $stm->bindValue(':d50', $data['d50']);
        $stm->bindValue(':e50', $data['e50']);
        $stm->bindValue(':d51', $data['d51']);
        $stm->bindValue(':e51', $data['e51']);
        $stm->bindValue(':d52', $data['d52']);
        $stm->bindValue(':e52', $data['e52']);
        $stm->bindValue(':e53', $data['e53']);
        $stm->bindValue(':c55', $data['c55']);
        $stm->bindValue(':d55', $data['d55']);
        $stm->bindValue(':d58', $data['d58']);
        $stm->bindValue(':e58', $data['e58']);
        $stm->bindValue(':d59', $data['d59']);
        $stm->bindValue(':e59', $data['e59']);
        $stm->bindValue(':e60', $data['e60']);
        $stm->bindValue(':d61', $data['d61']);
        $stm->bindValue(':e61', $data['e61']);
        $stm->bindValue(':d62', $data['d62']);
        $stm->bindValue(':e62', $data['e62']);
        $stm->bindValue(':e63', $data['e63']);
        $stm->bindValue(':e65', $data['e65']);
        $stm->bindValue(':forval', $data['forval']);
        $stm->bindValue(':datecreated', $data['datecreated']);


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


    public function createPumpStationUser($userid, $pumpid){

        $sql = "INSERT INTO pumping_station_user VALUES (NULL, :userid, :pumpid)";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':userid', $userid);
        $stm->bindValue(':pumpid', $pumpid);  

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

    public function deleteDataEntry($monthlyproductiondataid){

        $sql = "DELETE FROM 
        monthly_production_data 
        where monthlyproductiondataid = :monthlyproductiondataid"; 
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':monthlyproductiondataid', $monthlyproductiondataid);

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

    public function deletePumpStationUser($pumpingstationuserid){

        $sql = "DELETE FROM 
        pumping_station_user 
        where pumpingstationuserid = :pumpingstationuserid"; 
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':pumpingstationuserid', $pumpingstationuserid);

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

    public function selectDashboard(){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM view_dashboard");
        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectDataEntries(){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM view_monthly_production_data");

        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectDataEntriesByPumpingStationUserID($pumpingstationuserid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM view_monthly_production_data 
            where pumpingstationuserid = :pumpingstationuserid");

        $stm->bindValue(':pumpingstationuserid', $pumpingstationuserid); 

        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectDataEntryByPumpingStationUserID($monthlyproductiondataid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM view_monthly_production_data 
            where monthlyproductiondataid = :monthlyproductiondataid");

        $stm->bindValue(':monthlyproductiondataid', $monthlyproductiondataid); 

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
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

    public function selectPumpStationUserByID($pumpingstationuserid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM view_pump_station_user
            WHERE pumpingstationuserid = :pumpingstationuserid");

        $stm->bindValue(':pumpingstationuserid', $pumpingstationuserid);  

        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function selectPumpStationUserByUserID($userid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM view_pump_station_user
            WHERE userid = :userid 
            ORDER BY pumpstationname, areaname ASC");

        $stm->bindValue(':userid', $userid);  

        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
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

    public function selectPumpStationsUsers($pumpid){
        $stm = $this->pdo->prepare("SELECT 
            *
            FROM view_pump_station_user 
            WHERE pumpid = :pumpid");

        $stm->bindValue(':pumpid', $pumpid);  

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

    public function selectUsersAvailable($pumpid){
        $stm = $this->pdo->prepare("SELECT 
        *  
        FROM user 
        WHERE userid NOT IN 
        (SELECT userid FROM pumping_station_user WHERE pumpid = :pumpid)");

        $stm->bindValue(':pumpid', $pumpid);  

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

    public function updateDataEntry($data){

        $sql = "UPDATE monthly_production_data SET 
        d10 = :d10, 
        e10 = :e10, 
        d11 = :d11, 
        d12 = :d12, 
        d13 = :d13, 
        d15 = :d15, 
        d16 = :d16, 
        d17 = :d17, 
        d19 = :d19, 
        d20 = :d20, 
        d21 = :d21, 
        d23 = :d23, 
        e23 = :e23, 
        d24 = :d24, 
        e24 = :e24, 
        d25 = :d25, 
        e25 = :e25, 
        e26 = :e26, 
        c27 = :c27, 
        d27 = :d27, 
        d30 = :d30, 
        e30 = :e30, 
        d31 = :d31, 
        e31 = :e31, 
        d32 = :d32, 
        e32 = :e32, 
        e33 = :e33, 
        c34 = :c34, 
        d34 = :d34, 
        d38 = :d38, 
        d39 = :d39, 
        d40 = :d40, 
        d43 = :d43, 
        e43 = :e43, 
        d44 = :d44, 
        e44 = :e44, 
        d45 = :d45, 
        e45 = :e45, 
        e46 = :e46, 
        c47 = :c47, 
        d47 = :d47, 
        d50 = :d50, 
        e50 = :e50, 
        d51 = :d51, 
        e51 = :e51, 
        d52 = :d52, 
        e52 = :e52, 
        e53 = :e53, 
        c55 = :c55, 
        d55 = :d55, 
        d58 = :d58, 
        e58 = :e58, 
        d59 = :d59, 
        e59 = :e59, 
        e60 = :e60, 
        d61 = :d61, 
        e61 = :e61, 
        d62 = :d62, 
        e62 = :e62,  
        e63 = :e63, 
        e65 = :e65, 
        forval = :forval 
        WHERE monthlyproductiondataid = :monthlyproductiondataid";
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':monthlyproductiondataid', $data['monthlyproductiondataid']);
        $stm->bindValue(':d10', $data['d10']);
        $stm->bindValue(':e10', $data['e10']);
        $stm->bindValue(':d11', $data['d11']);
        $stm->bindValue(':d12', $data['d12']);
        $stm->bindValue(':d13', $data['d13']);
        $stm->bindValue(':d15', $data['d15']);
        $stm->bindValue(':d16', $data['d16']);
        $stm->bindValue(':d17', $data['d17']);
        $stm->bindValue(':d19', $data['d19']);
        $stm->bindValue(':d20', $data['d20']);
        $stm->bindValue(':d21', $data['d21']);
        $stm->bindValue(':d23', $data['d23']);
        $stm->bindValue(':e23', $data['e23']);
        $stm->bindValue(':d24', $data['d24']);
        $stm->bindValue(':e24', $data['e24']);
        $stm->bindValue(':d25', $data['d25']);
        $stm->bindValue(':e25', $data['e25']);
        $stm->bindValue(':e26', $data['e26']);
        $stm->bindValue(':c27', $data['c27']);
        $stm->bindValue(':d27', $data['d27']);
        $stm->bindValue(':d30', $data['d30']);
        $stm->bindValue(':e30', $data['e30']);
        $stm->bindValue(':d31', $data['d31']);
        $stm->bindValue(':e31', $data['e31']);
        $stm->bindValue(':d32', $data['d32']);
        $stm->bindValue(':e32', $data['e32']);
        $stm->bindValue(':e33', $data['e33']);
        $stm->bindValue(':c34', $data['c34']);
        $stm->bindValue(':d34', $data['d34']);
        $stm->bindValue(':d38', $data['d38']);
        $stm->bindValue(':d39', $data['d39']);
        $stm->bindValue(':d40', $data['d40']);
        $stm->bindValue(':d43', $data['d43']);
        $stm->bindValue(':e43', $data['e43']);
        $stm->bindValue(':d44', $data['d44']);
        $stm->bindValue(':e44', $data['e44']);
        $stm->bindValue(':d45', $data['d45']);
        $stm->bindValue(':e45', $data['e45']);
        $stm->bindValue(':e46', $data['e46']);
        $stm->bindValue(':c47', $data['c47']);
        $stm->bindValue(':d47', $data['d47']);
        $stm->bindValue(':d50', $data['d50']);
        $stm->bindValue(':e50', $data['e50']);
        $stm->bindValue(':d51', $data['d51']);
        $stm->bindValue(':e51', $data['e51']);
        $stm->bindValue(':d52', $data['d52']);
        $stm->bindValue(':e52', $data['e52']);
        $stm->bindValue(':e53', $data['e53']);
        $stm->bindValue(':c55', $data['c55']);
        $stm->bindValue(':d55', $data['d55']);
        $stm->bindValue(':d58', $data['d58']);
        $stm->bindValue(':e58', $data['e58']);
        $stm->bindValue(':d59', $data['d59']);
        $stm->bindValue(':e59', $data['e59']);
        $stm->bindValue(':e60', $data['e60']);
        $stm->bindValue(':d61', $data['d61']);
        $stm->bindValue(':e61', $data['e61']);
        $stm->bindValue(':d62', $data['d62']);
        $stm->bindValue(':e62', $data['e62']);
        $stm->bindValue(':e63', $data['e63']);
        $stm->bindValue(':e65', $data['e65']);
        $stm->bindValue(':forval', $data['forval']);

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