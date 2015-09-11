<?php
session_start();
$_SESSION['trial_number_ddy'] = $_SESSION['trial_number_ddy'] + 1;
	$capt = $_POST['capt'];
	$re = ($_SESSION['captcha_ddy'] == $capt);//strcmp($_SESSION['captcha'], $capt);
	//echo $re;
	//exit();
	if(!isset($_SESSION['captcha_ddy'])) {
		echo '-2';
		exit();
	}
	else if($re == "1" ||  $re == 1) {
		
		$_SESSION['end_time_ddy'] = round(microtime(true) * 1000);
		//echo $_SESSION['no'].'  '.$_SESSION['startTimeStep1'].' '.$_SESSION['submitTimeStep1'].' '.$_SESSION['timeDiffInSecStep1'].' '.$_SESSION['NumTrialStep1'].' '.$_SESSION['ShapeStep1'].' '.$_SESSION['start_time_ddy'].' '.$_SESSION['end_time_ddy'];
		// insert to database
		




$con = mysql_connect("localhost", "", "");
    if(!$con) {
    //DB con req failed
      die('Failed to connect the database. '.mysql_error());
    }
     mysql_select_db('unity', $con);
    $sql = "INSERT INTO data( userinfo_id, startTimeStep1, submitTimeStep1, timeDiffInSecStep1, NumTrialStep1, ShapeStep1, startTimeStep2, submitTimeStep2, timeDiffInSecStep2, NumTrialStep2, ShapeStep2, startTimeStep3, submitTimeStep3, timeDiffInSecStep3, NumTrialStep3, ShapeStep3) 
  VALUES (".$_SESSION['no'].", '".$_SESSION['startTimeStep1']."', '".$_SESSION['submitTimeStep1']."', '".$_SESSION['timeDiffInSecStep1']."',".$_SESSION['NumTrialStep1'].", '".$_SESSION['ShapeStep1']."', '".$_SESSION['start_time_2']."', 
  	'".$_SESSION['end_time_2']."','".($_SESSION['end_time_2'] - $_SESSION['start_time_2'])."', ".$_SESSION['trial_number_2'].", 'N/A', '".$_SESSION['start_time_ddy']."','".$_SESSION['end_time_ddy']."', '".($_SESSION['end_time_ddy'] - $_SESSION['start_time_ddy'])."', ".$_SESSION['trial_number_ddy'].", '".$_SESSION['model_shape_ddy']."');";
 //echo $sql;
    $res = mysql_query($sql);

       if($res) {// insert success
       		$_SESSION['pageNo'] = 5;
       	   echo 'success';
       }
       else {// insert fail
           echo 'failed';
       }






		exit();
	}
	else {
		echo '-1';
		exit();
	}	





// try {
//     $conn = new PDO('mysql:host=localhost;dbname=unity', '', '');
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
     
//     $stmt = $conn->prepare("INSERT INTO data( userinfo_id, startTimeStep1, submitTimeStep1, timeDiffInSecStep1, NumTrialStep1, ShapeStep1, startTimeStep2, submitTimeStep2, timeDiffInSecStep2, NumTrialStep2, ShapeStep2, startTimeStep3, submitTimeStep3, timeDiffInSecStep3, NumTrialStep3, ShapeStep3) 
// VALUES (
//  ?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?);");

// /*
// $_SESSION['timeDiffInSecStep1'],
// */

// $stmt->bindParam(1,  );
// $stmt->bindParam(2, );
// $stmt->bindParam(3, );
// $stmt->bindParam(4, );
// $stmt->bindParam(5, );
// $stmt->bindParam(6, );
// $stmt->bindParam(7, );
// $stmt->bindParam(8, );

// $stmt->bindParam(9, );
// $stmt->bindParam(10, );
// $stmt->bindParam(11, );
// $stmt->bindParam(12, );
// $stmt->bindParam(13, );
// $stmt->bindParam(14,  );
// $stmt->bindParam(15, );
// $stmt->bindParam(16, );

// $stmt->execute();
// } catch(PDOException $e) {
//     echo 'ERROR: ' . $e->getMessage();
// }





?>


