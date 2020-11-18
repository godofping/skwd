<?php 
	
	include('connection.php');

	if (isset($_GET['from']) and $_GET['from'] == 'logout') {
	
	session_destroy();
	header("Location: index.php");

}

	if(isset($_POST['from']) and $_POST['from'] == 'login')
	{

		$username = $_POST['username'];
		$password = $_POST['password'];
			
		if ($username != "" && $password != ""){

			$stmt = $connection->prepare("select * from adminaccount_tbl where BINARY username = ? and password = ? ");
			$stmt->bind_param("ss", $username, $password);
			$stmt->execute();
			$result = $stmt->get_result();
			$count = $result->num_rows;
			$stmt -> close();

		    if($count > 0){
		    	$row = $result->fetch_assoc();
				$_SESSION['adminID'] = $row['adminID'];
		    	echo 1;
		    	exit();
		    }
		    else
		    {

		        $stmt = $connection->prepare("select * from useraccount_tbl where BINARY username = ? and password = ? ");
				$stmt->bind_param("ss", $username, $password);
				$stmt->execute();
				$result = $stmt->get_result();
				$count = $result->num_rows;
				$stmt -> close();

				if($count > 0){
			    	$row = $result->fetch_assoc();
					$_SESSION['userID'] = $row['userID'];
			    	echo 2;
			    	exit();
				} else {
					echo 3;
					exit();
				}

		    }
		}

	}

	if(isset($_POST['from']) and $_POST['from'] == 'checkuareaname')
	{

		$areaName = $_POST['areaName'];
		
			
	if ($areaName != ""){

		$stmt = $connection->prepare("select * from area_table where areaName = ?");
		$stmt->bind_param("s", $areaName);
		$stmt->execute();
		$result = $stmt->get_result();
		$count = $result->num_rows;
		$stmt -> close();

		    if($count > 0){
		    	$row = $result->fetch_assoc();
		        echo 1;
		    }else{
		        echo 0;
		    }

		}

	}

	if(isset($_POST['from']) and $_POST['from'] == 'checkusername')
	{

		$username = $_POST['username'];
	
		if ($username != ""){

			$stmt = $connection->prepare("select * from useraccount_tbl where username = ?");
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$count = $result->num_rows;
			$stmt -> close();

		    if($count > 0){
		    	$row = $result->fetch_assoc();
		        echo 1;
		    }else{
		        echo 0;
		    }

		}

	}

	if(isset($_POST['from']) and $_POST['from'] == 'add-user')
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$pumpID = $_POST['pumpID'];

		$stmt = $connection->prepare("insert into useraccount_tbl (username,password,fullname, pumpID) values (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $username, $password, $fullname, $pumpID);
		$stmt->execute();
		$stmt -> close();

		header("Location: users.php");
	}

	if(isset($_POST['from']) and $_POST['from'] == 'edit-user-account')
	{

		$userID = $_POST['userID'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$pumpID = $_POST['pumpID'];

		$stmt = $connection->prepare("update useraccount_tbl set username = ?, password = ?, fullname = ?, pumpID = ? where userID = ? ");
		$stmt->bind_param("sssss",$username, $password,$fullname,$pumpID,$userID);
		$stmt->execute();
		$stmt -> close();
		
		 header("Location: users.php");
	}

	if(isset($_POST['from']) and $_POST['from'] == 'delete-user-account')
	{

		$userID = $_POST['userID'];

		$stmt = $connection->prepare("delete from useraccount_tbl where userID = ?");
		$stmt->bind_param("s", $userID);
		$stmt->execute();
		$result = $stmt->get_result();
		$count = $result->num_rows;
		$stmt -> close();
			
		    header("Location: users.php");

	}

	if(isset($_POST['from']) and $_POST['from'] == 'add-area')
	{

		$areaName = $_POST['areaName'];

		$stmt = $connection->prepare("insert into area_table (areaName) values (?)");
		$stmt->bind_param("s", $areaName);
		$stmt->execute();
		$stmt -> close();

		header("Location: add-area.php");
	}

	if(isset($_POST['from']) and $_POST['from'] == 'edit-areaName')
	{

		$areaName = $_POST['areaName'];
		$areaID = $_POST['areaID'];

		$stmt = $connection->prepare("update area_table set areaName = ? where areaid = ? ");
		$stmt->bind_param("ss", $areaName, $areaID);
		$stmt->execute();
		$stmt -> close();
		
		header("Location: add-area.php");
	}

	if(isset($_POST['from']) and $_POST['from'] == 'delete-areaName')
	{

		$areaID = $_POST['areaID'];

		$stmt = $connection->prepare("delete from area_table where areaID = ?");
		$stmt->bind_param("s", $areaID);
		$stmt->execute();
		$result = $stmt->get_result();
		$count = $result->num_rows;
		$stmt -> close();
			
		    header("Location: add-area.php");

	}

	if(isset($_POST['from']) and $_POST['from'] == 'checkupumpname')
	{

		$pumpname = $_POST['pumpname'];
	
		if ($pumpname != ""){

			$stmt = $connection->prepare("select * from pumping_table where pumpname = ?");
			$stmt->bind_param("s", $pumpname);
			$stmt->execute();
			$result = $stmt->get_result();
			$count = $result->num_rows;
			$stmt -> close();

		    if($count > 0){
		    	$row = $result->fetch_assoc();
		        echo 1;
		    }else{
		        echo 0;
		    }

		}

	}

	if(isset($_POST['from']) and $_POST['from'] == 'add-pumping-station')
	{

		$pumpname = $_POST['pumpname'];
		$areaID = $_POST['areaID'];

		$stmt = $connection->prepare("insert into pumping_table (areaid, pumpname) values (?, ?)");
		$stmt->bind_param("ss",$areaID, $pumpname);
		$stmt->execute();
		$stmt -> close();

		 header("Location: pump-station.php");
	}

	if(isset($_POST['from']) and $_POST['from'] == 'edit-pumping-station')
	{

		$pumpname = $_POST['pumpname'];
		$areaID = $_POST['areaID'];
		$pumpID = $_POST['pumpID'];

		$stmt = $connection->prepare("update pumping_table set areaid = ?, pumpname = ? where pumpID = ? ");
		$stmt->bind_param("sss",$areaID, $pumpname,$pumpID);
		$stmt->execute();
		$stmt -> close();
		
		header("Location: pump-station.php");
	}

	if(isset($_POST['from']) and $_POST['from'] == 'delete-pump-station')
	{

		$pumpID = $_POST['pumpID'];

			$stmt = $connection->prepare("delete from pumping_table where pumpID = ?");
			$stmt->bind_param("s", $pumpID);
			$stmt->execute();
			$result = $stmt->get_result();
			$count = $result->num_rows;
			$stmt -> close();
			
		     header("Location: pump-station.php");

	}

	if(isset($_POST['from']) and $_POST['from'] == 'add-user-inputDATA')
	{

		$userID = $_SESSION['userID'];
		$capacity = $_POST['capacity'];
		$hourmeter = $_POST['hourmeter'];
		$submersiblepump = $_POST['submersiblepump'];
		$hourmeter2 = $_POST['hourmeter2'];
		$boosterpump = $_POST['boosterpump'];
		$flowmeter = $_POST['flowmeter'];
		$discharge = $_POST['discharge'];

		$fhr = $_POST['fhr'];
		$fmins = $_POST['fmins'];
		$fsec = $_POST['fsec'];
		$bhr = $_POST['bhr'];
		$bmins = $_POST['bmins'];
		$bsec = $_POST['bsec'];
		$present2 = $_POST['present2'];
		$previous2 = $_POST['previous2'];
		$fhr2 = $_POST['fhr2'];
		$fmins2 = $_POST['fmins2'];
		$fsec2 = $_POST['fsec2'];
		$bhr2 = $_POST['bhr2'];
		$bmins2 = $_POST['bmins2'];
		$bsec2 = $_POST['bsec2'];
		$lhr = $_POST['lhr'];
		$lmin = $_POST['lmin'];
		$whr = $_POST['whr'];
		$wmin = $_POST['wmin'];
		$flushout = $_POST['flushout'];
		$h2oused = $_POST['h2oused'];
		$flushout2 = $_POST['flushout2'];
		$h2oused2 = $_POST['h2oused2'];
		$datecreated = date("Y-m-d");


		$stmt = $connection->prepare("insert into user_data_table (userID, capacity, hourmeter, submersiblepump, hourmeter2, boosterpump, flowmeter, discharge, fhr, fmins, fsec, bhr, bmins, bsec, present2, previous2, fhr2, fmins2, fsec2, bhr2, bmins2, bsec2, lhr, lmin, whr, wmin, flushout, h2oused, flushout2, h2oused2, datecreated) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssssssssssssssssssssssssss",$userID, $capacity, $hourmeter, $submersiblepump, $hourmeter2, $boosterpump, $flowmeter, $discharge , $fhr, $fmins, $fsec, $bhr, $bmins, $bsec, $present2, $previous2, $fhr2, $fmins2, $fsec2, $bhr2, $bmins2, $bsec2, $lhr, $lmin, $whr, $wmin, $flushout, $h2oused, $flushout2, $h2oused2, $datecreated);
		$stmt->execute();
		$stmt -> close();

		header("Location: user-pump.php");
	}


 ?>