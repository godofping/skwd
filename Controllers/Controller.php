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



