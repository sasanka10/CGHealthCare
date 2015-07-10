<?php

require 'Slim/Slim.php';
$app = new Slim();

error_reporting(E_ALL); 

ini_set("log_errors", true);
ini_set("error_log", "/Applications/MAMP/htdocs/HealthCareSystem/RestAPI/errorlog.log");


$app->get('/authenticate/:username/:password', 'authenticateUser');

$app->run();

$app->get("/", function () {
    echo "<h1>Hello Slim World</h1>";
});

function authenticateUser($username,$password) {
    $sql = "SELECT * FROM users WHERE username = :username and password = :password";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("username", $username);
        $stmt->bindParam("password", $password);
		$stmt->execute();
		$userDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
        logToFile("/Applications/MAMP/htdocs/HealthCareSystem/RestAPI/errorlog.log",("Hello User Details are ".$userDetails));
		$db = null;
		//echo '{"user": ' . json_encode($userDetails) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        throw new Exception('Uncaught Exception'.$e->getMessage() );
	} catch(Exception $e1) {
		echo '{"error1":{"text1":'. $e1->getMessage() .'}}'; 
        throw new Exception('Uncaught Exception'.$e1->getMessage() );
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