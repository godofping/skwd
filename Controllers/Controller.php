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

            case ($page === "dashboard"):
                if ($_SESSION['usertype'] == 'Admin') {
                    require "Views/dashboard.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;

            case ($page === "drivers"):
                if ($_SESSION['usertype'] == 'Admin') {
                    require "Views/drivers.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;

            case ($page === "fuel-logs"):
                if ($_SESSION['usertype'] == 'Encoder') {
                    require "Views/fuel-logs.php";
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
            

            case ($page === "users"):
                if ($_SESSION['usertype'] == 'Admin') {
                    require "Views/users.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;

            case ($page === "vehicles"):
                if ($_SESSION['usertype'] == 'Admin') {
                    require "Views/vehicles.php";
                }
                else
                {
                    header("location: ?p=error");
                }
                exit();
            break;

            case ($page === "view-fuel-logs"):
                if ($_SESSION['usertype'] == 'Admin' or $_SESSION['usertype'] == 'Boss') {
                    require "Views/view-fuel-logs.php";
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
                    
                    if ($load == 'selectdashboard') {
                        echo json_encode($this->db->selectDashboard());
                        exit();
                    }

                    if ($load == 'selectdriver') {
                        echo json_encode($this->db->selectDriverByID($_POST['driverid']));
                        exit();
                    }

                    if ($load == 'selectdrivers') {
                        echo json_encode($this->db->selectDrivers());
                        exit();
                    }

                    if ($load == 'selectfuellog') {
                        echo json_encode($this->db->selectFuelLogByID($_POST['fuellogid']));
                        exit();
                    }

                    if ($load == 'selectfuellogs') {
                        echo json_encode($this->db->selectFuelLogs());
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

                    if ($load == 'selectvehicle') {
                        echo json_encode($this->db->selectVehicleByID($_POST['vehicleid']));
                        exit();
                    }

                    if ($load == 'selectvehicles') {
                        echo json_encode($this->db->selectVehicles());
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
                            
                            if ($user['usertype'] == 'Admin') {
                                echo 1;
                            }
                            elseif ($user['usertype'] == 'Boss') {
                                echo 2;
                            }
                            elseif ($user['usertype'] == 'Encoder') {
                                echo 3;
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

                    if ($submit == 'createdriver') {
                        echo $this->db->createDriver($_POST['fullname'], $_POST['contactnumber'], $_POST['address']);
                        exit();
                    }

                    if ($submit == 'createfuellog') {
                        echo $this->db->createFuelLog($_SESSION['userid'], $_POST['driverid'], $_POST['vehicleid'], $_POST['amountoffuel'], $_POST['triplocation'], $_POST['fuellogdate']);
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

                    if ($submit == 'createvehicle') {
                        echo $this->db->createVehicle($_POST['vehiclename'], $_POST['typeofvehicle'], $_POST['status']);
                        exit();
                    }

                    if ($submit == 'deletedriver') {
                        echo $this->db->deleteDriver($_POST['deleteid']);
                        exit();
                    }

                    if ($submit == 'deleteuser') {
                        echo $this->db->deleteUser($_POST['deleteid']);
                        exit();
                    }

                    if ($submit == 'deletevehicle') {
                        echo $this->db->deleteVehicle($_POST['deleteid']);
                        exit();
                    }

                    if ($submit == 'updatedriver') {
                        echo $this->db->updateDriver($_POST['updateid'], $_POST['fullname1'], $_POST['contactnumber1'], $_POST['address1']);
                        exit();
                    }

                    if ($submit == 'updatefuellog') {
                        echo $this->db->updateFuelLog($_POST['updateid'], $_SESSION['userid'], $_POST['driverid1'], $_POST['vehicleid1'], $_POST['amountoffuel1'], $_POST['triplocation1'], $_POST['fuellogdate1']);
                        exit();
                    }

                    if ($submit == 'updateuser') {
                        echo $this->db->updateUser($_POST['updateid'], $_POST['password1'], $_POST['fullname1'], $_POST['usertype1']);
                        exit();
                    }

                    if ($submit == 'updatevehicle') {
                        echo $this->db->updateVehicle($_POST['updateid'], $_POST['vehiclename1'], $_POST['typeofvehicle1'], $_POST['status1']);
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



