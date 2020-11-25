<?php

Class Controller {

    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function unSetSession()
    {
        unset($_SESSION['userid']);
        unset($_SESSION['usertype']);

    }

    public function index() {

        $page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_SPECIAL_CHARS);

        switch ($page) {

            //ROUTES

            case ($page === ""):
                require "Views/login.php";
                exit();
            break;

            case ($page === "assign-users"):
                if ($_SESSION['usertype'] == 'ADMIN' and isset($_GET['pumpid'])) {
                    require "Views/assign-users.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;

            case ($page === "areas"):
                if ($_SESSION['usertype'] == 'ADMIN') {
                    require "Views/areas.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;

            case ($page === "dashboard"):
                if ($_SESSION['usertype'] == 'ADMIN') {
                    require "Views/dashboard.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;

            case ($page === "data-entry" and isset($_GET['pumpingstationuserid'])):
                if ($_SESSION['usertype'] == 'USER') {
                    require "Views/data-entry.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;

            case ($page === "login"):
                require "Views/login.php";
                exit();
            break;

            case ($page === "logout"):
                $this->unSetSession();
                header("Location: ?p=login");
                exit();
            break;

            case ($page === "pumping-stations"):
                if ($_SESSION['usertype'] == 'ADMIN') {
                    require "Views/pumping-stations.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;

            case ($page === "select-areas"):
                if ($_SESSION['usertype'] == 'USER') {
                    require "Views/select-areas.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;
            
            case ($page === "users"):
                if ($_SESSION['usertype'] == 'ADMIN') {
                    require "Views/users.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;



            //END ROUTES
           

            //LOAD
            case ($page === "load"):

                if (isset($_POST['load'])) {

        
                    $load = $_POST['load'];

                    if ($load == 'selectarea') {
                        echo json_encode($this->db->selectAreaByID($_POST['areaid']));
                        exit();
                    }

                    if ($load == 'selectareas') {
                        echo json_encode($this->db->selectAreas());
                        exit();
                    }

                    if ($load == 'selectdataentiesbypumpingstationuser') {
                        echo json_encode($this->db->selectDataEntriesByPumpingStationUserID($_POST['pumpingstationuserid']));
                        exit();
                    }

                    if ($load == 'selectpumpstation') {
                        echo json_encode($this->db->selectPumpStationByID($_POST['pumpid']));
                        exit();
                    }

                    if ($load == 'selectpumpstations') {
                        echo json_encode($this->db->selectPumpStations());
                        exit();
                    }

                    if ($load == 'selectpumpstationuser') {
                        echo json_encode($this->db->selectPumpStationUserByID($_POST['pumpingstationuserid']));
                        exit();
                    }

                    if ($load == 'selectpumpstationsusers') {
                        echo json_encode($this->db->selectPumpStationsUsers($_POST['pumpid']));
                        exit();
                    }
                    

                    if ($load == 'selectuser') {
                        echo json_encode($this->db->selectUserByID($_POST['userid']));
                        exit();
                    }

                    if ($load == 'selectusers') {
                        echo json_encode($this->db->selectUsers());
                        exit();
                    }

                    if ($load == 'selectusersavailable') {
                        echo json_encode($this->db->selectUsersAvailable($_POST['pumpid']));
                        exit();
                    }


                }
                else
                {
                    require "Views/error.php";
                    exit();
                }

                    
            break;
            //END LOAD

            //ACTION
            case ($page === "action"):

                if (isset($_POST['action']))
                {
                    $action = $_POST['action'];

                    if ($action == 'login') {
                        
                        $user = $this->db->selectUser($_POST['username'], $_POST['password']);

                        if (!empty($user)) {
                            $_SESSION['userid'] = $user['userid'];
                            $_SESSION['usertype'] = $user['usertype'];
                            
                            if ($user['usertype'] == 'ADMIN') {
                                echo 1;
                            }
                            elseif ($user['usertype'] == 'USER') {
                                echo 2;
                            }
                        }
                        else
                        {
                            echo 0;
                        }

                        exit();
                    }

                }
                else
                {
                    require "Views/error.php";
                    exit();
                }

                exit();
            break;
            //END ACTION

            //SUBMIT
            case ($page === "submit"):

                if (isset($_POST['submit']))
                {
                    $submit = $_POST['submit'];

                    if ($submit == 'createarea') {
                        echo $this->db->createArea($_POST['areaname']);
                        exit();
                    }

                    if ($submit == 'createdataentry') {


                        $data = [
                            'pumpingstationuserid' => $_POST['pumpingstationuserid'],
                            'd10' => $_POST['d10'],
                            'e10' => $_POST['e10'],
                            'd11' => $_POST['d11'],
                            'd12' => $_POST['d12'],
                            'd13' => $_POST['d13'],
                            'd15' => $_POST['d15'],
                            'd16' => $_POST['d16'],
                            'd17' => $_POST['d17'],
                            'd19' => $_POST['d19'],
                            'd20' => $_POST['d20'],
                            'd21' => $_POST['d21'],
                            'd23' => $_POST['d23'],
                            'e23' => $_POST['e23'],
                            'd24' => $_POST['d24'],
                            'e24' => $_POST['e24'],
                            'd25' => $_POST['d25'],
                            'e25' => $_POST['e25'],
                            'e26' => $_POST['e26'],
                            'd27' => $_POST['d27'],
                            'd30' => $_POST['d30'],
                            'e30' => $_POST['e30'],
                            'd31' => $_POST['d31'],
                            'e31' => $_POST['e31'],
                            'd32' => $_POST['d32'],
                            'e32' => $_POST['e32'],
                            'e33' => $_POST['e33'],
                            'c34' => $_POST['c34'],
                            'd34' => $_POST['d34'],
                            'd38' => $_POST['d38'],
                            'd39' => $_POST['d39'],
                            'd40' => $_POST['d40'],
                            'd43' => $_POST['d43'],
                            'e43' => $_POST['e43'],
                            'd44' => $_POST['d44'],
                            'e44' => $_POST['e44'],
                            'd45' => $_POST['d45'],
                            'e45' => $_POST['e45'],
                            'e46' => $_POST['e46'],
                            'c47' => $_POST['c47'],
                            'd47' => $_POST['d47'],
                            'd50' => $_POST['d50'],
                            'e50' => $_POST['e50'],
                            'd51' => $_POST['d51'],
                            'e51' => $_POST['e51'],
                            'd52' => $_POST['d52'],
                            'e52' => $_POST['e52'],
                            'e53' => $_POST['e53'],
                            'c55' => $_POST['c55'],
                            'd55' => $_POST['d55'],
                            'd58' => $_POST['d58'],
                            'e58' => $_POST['e58'],
                            'd59' => $_POST['d59'],
                            'e59' => $_POST['e59'],
                            'e60' => $_POST['e60'],
                            'd61' => $_POST['d61'],
                            'e61' => $_POST['e61'],
                            'd62' => $_POST['d62'],
                            'e62' => $_POST['e62'],
                            'e63' => $_POST['e63'],
                            'e65' => $_POST['e65'],
                            'datecreated' => date('Y-m-d'),
                        ];

                        echo $this->db->createDataEntry($data);
                        exit();
                    }

                    if ($submit == 'createpumpstation') {
                        echo $this->db->createPumpStation($_POST['areaid'], $_POST['pumpstationname']);
                        exit();
                    }

                    if ($submit == 'createpumpstationuser') {
                        echo $this->db->createPumpStationUser($_POST['userid'], $_POST['pumpid']);
                        exit();
                    }
                
                    if ($submit == 'createuser') {
                        if (count($this->db->selectUsername($_POST['username'])) > 0) {
                            echo -1;
                        }
                        else
                        {
                            echo $this->db->createUser($_POST['username'], $_POST['password'], $_POST['fullname'], $_POST['usertype']);
                            exit();
                        }
                    }

                    if ($submit == 'deletearea') {
                        echo $this->db->deleteArea($_POST['deleteid']);
                        exit();
                    }

                    if ($submit == 'deletepumpstation') {
                        echo $this->db->deletePumpStation($_POST['deleteid']);
                        exit();
                    }

                    if ($submit == 'deletepumpstationuser') {
                        echo $this->db->deletePumpStationUser($_POST['deleteid']);
                        exit();
                    }

                    if ($submit == 'deleteuser') {
                        echo $this->db->deleteUser($_POST['deleteid']);
                        exit();
                    }

                    if ($submit == 'updatearea') {
                        echo $this->db->updateArea($_POST['updateid'], $_POST['areaname1']);
                        exit();
                    }

                    if ($submit == 'updatepumpstation') {
                        echo $this->db->updatePumpStation($_POST['updateid'], $_POST['areaid1'], $_POST['pumpstationname1']);
                        exit();
                    }

                    if ($submit == 'updateuser') {
                        echo $this->db->updateUser($_POST['updateid'], $_POST['password1'], $_POST['fullname1'], $_POST['usertype1']);
                        exit();
                    }

                }
                else
                {
                    require "Views/error.php";
                    exit();
                }

                exit();
            break;
            //END SUBMIT

            

            default:
                require "Views/error.php";
                exit();
            break;
        }


    }

   
}



