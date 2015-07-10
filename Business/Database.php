<?php

class Database{
   
    function getConnection(){    
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="root";
        $dbname="acl_test";
        $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh; 
    }
}

?>