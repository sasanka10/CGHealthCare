<?php
session_start();
require 'Business/PatientData.php';
require 'Business/DoctorData.php';
require 'Business/StaffData.php';
require 'Business/MasterData.php';
require 'Slim/Slim.php';


$app = new Slim();

error_reporting(E_ALL); 

ini_set("log_errors", true);
ini_set("error_log", "/Applications/MAMP/htdocs/HealthCareSystem/RestAPI/errorlog.log");


$app->get('/authenticate/:username/:password', 'authenticateUser');
$app->get('/','initialMessage');
$app->post('/registerUser', 'registerUser');
$app->put('/updateprofile/:id','updateProfile');
$app->get('/appointmentsList/:hosiptal/:doctor/:appdate', 'appointmentsList');
$app->post('/createAppointment', 'createAppointment');
$app->get('/hosiptalDoctorData', 'hosiptalDoctorData');
$app->get('/professionBasedData/:profession/:name', 'professionBasedData');
$app->get('/doctorMasterData/:doctorId', 'doctorMasterData');
$app->post('/createUser', 'createUser');
$app->run();


function initialMessage(){
    try{
    //echo "<h1>Hello Slim World</h1>";
        header('Location: login.php');
    }  catch(Exception $e1) {
		echo '{"error1":{"text1":'. $e1->getMessage() .'}}'; 
	}
}

function authenticateUser($username,$password) {
    $sql = "SELECT u.username as username,u.profession as rolename,u.id as userid FROM users u WHERE  u.username = :username and u.password = :password";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("username", $username);
        $stmt->bindParam("password", $password);
		$stmt->execute();
		$userDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
       // logToFile("/Applications/MAMP/htdocs/HealthCareSystem/RestAPI/errorlog.log",("Hello User Details are ".$userDetails));
		$db = null;
        $dt = $userDetails[0];
		$_SESSION['userid'] = $dt->userid;
        
        echo '{"user": ' . json_encode($userDetails) . '}';
        
        
        
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	} catch(Exception $e1) {
		echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
	}
    
}

function registerUser(){
    try {
            $request = Slim::getInstance()->request();
            $user = json_decode($request->getBody());
  $sql = "INSERT INTO users (username, password, email, mobile, profession,address,name) VALUES (:userName, :password, :email, :mobile, :profession,:address,:name)";
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("userName", $user->userName);
		$stmt->bindParam("password", $user->password);
		$stmt->bindParam("email", $user->email);
		$stmt->bindParam("mobile", $user->mobile);
		$stmt->bindParam("profession", $user->profession);
        $stmt->bindParam("address", $user->address);
         $stmt->bindParam("name", $user->name);
		$stmt->execute();
        //echo "Last Insert Id".$db->lastInsertId();
		$user->id = $db->lastInsertId();
		$db = null;
		echo json_encode($user); 
	 } catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	} catch(Exception $e1) {
		echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
	}

}


function updateProfile($id){
    $pd = new PatientData();
    try{
        $request = Slim::getInstance()->request();
        $body = $request->getBody();
        $profile = json_decode($body);
        $profile = $pd->updateProfile($id,$profile);
        json_encode($profile);
        
    }  catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	} catch(Exception $e1) {
		echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
	}
    
}


function appointmentsList($hosiptal,$doctor,$appdate){
    $dd = new DoctorData();
    try{
           $appointmentDetails = $dd->getAppointmentDetails($hosiptal,$doctor,$appdate); 
           echo '{"appointmentDetails": ' .json_encode($appointmentDetails) . '}';
       }  catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	} catch(Exception $e1) {
		echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
	}   
    
}

function createAppointment($hosiptal,$doctor,$appdate,$slot,$pid,$status,$pname){
    $dd = new DoctorData();
    try{
           $request = Slim::getInstance()->request();
            $appointmentDetails = json_decode($request->getBody());
           $appointmentDetails = $dd->createAppointment($appointmentDetails->hosiptal,$appointmentDetails->doctor,$appointmentDetails->appdate,$appointmentDetails->slot,$appointmentDetails->pid,$appointmentDetails->status,$appointmentDetails->pname); 
           echo '{"appointmentDetails": ' . json_encode($appointmentDetails) . '}';
       }  catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	} catch(Exception $e1) {
		echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
	}   
    
}

function hosiptalDoctorData(){
    
        $sd = new StaffData();
    try{
            $hosiptalDoctorData = $sd->hosiptalDoctorData();
           echo '{"hosiptalDoctorData": ' . json_encode($hosiptalDoctorData) . '}';
       
    
    }  catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	} catch(Exception $e1) {
		echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
	}  
    
}

function professionBasedData($profession,$name){
    
   try{
       
           $md = new MasterData();
            $masterUsersData = $md->masterUsersData($profession,$name);
           echo '{"masterUsersData": ' . json_encode($masterUsersData) . '}';
       
    
    }  catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	} catch(Exception $e1) {
		echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
	}  
    
}


function doctorMasterData($doctorId){
    
   try{
       
           $ddd = new DoctorData();
            $doctorMasterData = $ddd->doctorMasterData($doctorId);
       
       //echo "Hello".$doctorMasterData;
           echo '{"doctorMasterData": ' . json_encode($doctorMasterData) . '}';
       
    
    }  catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	} catch(Exception $e1) {
		echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
	}  
    
}


function createUser(){
    
     $dd = new DoctorData();
    try{
           $request = Slim::getInstance()->request();
            $userDetails = json_decode($request->getBody());
  
        
           $userDetails = $dd->createDoctorData($userDetails->userName,$userDetails->password,$userDetails->name,$userDetails->mobile,$userDetails->altmobile,$userDetails->address,$userDetails->email,$userDetails->department,$userDetails->hosiptal,$userDetails->profession); 
        
           echo '{"userDetails": ' . json_encode($userDetails) . '}';
       }  catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	} catch(Exception $e1) {
		echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
	}   
    
}

 function logToFile($filename, $msg)
   { 
   // open file
   $fd = fopen($filename, "a");
   // append date/time to message
   $str = "[" . date("Y/m/d h:i:s", mktime()) . "] " . $msg; 
   // write string
   fwrite($fd, $str . "\n");
   // close file
   fclose($fd);
   }


function getConnection() {
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="root";
	$dbname="acl_test";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}
?>