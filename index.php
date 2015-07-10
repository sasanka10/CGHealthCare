<?php
session_start();
require 'Business/PatientData.php';
require 'Slim/Slim.php';


$app = new Slim();

error_reporting(E_ALL); 

ini_set("log_errors", true);
ini_set("error_log", "/Applications/MAMP/htdocs/HealthCareSystem/RestAPI/errorlog.log");


$app->get('/authenticate/:username/:password', 'authenticateUser');
$app->get('/','initialMessage');
$app->post('/registerUser', 'registerUser');
$app->put('/updateprofile/:id','updateProfile');
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
    $sql = "SELECT u.username as username,r.roleName as rolename,u.id as userid FROM users u,user_roles ur,roles r WHERE u.ID = ur.userID and r.ID = u.id and  u.username = :username and u.password = :password";
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
  $sql = "INSERT INTO users (username, password, email, mobile, profession,address) VALUES (:userName, :password, :email, :mobile, :profession,:address)";
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("userName", $user->userName);
		$stmt->bindParam("password", $user->password);
		$stmt->bindParam("email", $user->email);
		$stmt->bindParam("mobile", $user->mobile);
		$stmt->bindParam("profession", $user->profession);
        $stmt->bindParam("address", $user->address);
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
        echo json_encode($profile);
        
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