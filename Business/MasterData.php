<?php 

class MasterData{
    
    function getHosiptalData(){
        $dbConnection = new Database();
       
       $sql = "SELECT * from hosiptal where status = 'Y' ";
            try {
                $db = $dbConnection->getConnection();
                $stmt = $db->prepare($sql);
               // print_r($stmt);
                $stmt->execute();
                $hosiptal = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                $_SESSION['hosiptal'] = $hosiptal;

                return ($hosiptal);



            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
            } 
        
    }
  
    
    function getDoctorData(){
    $dbConnection = new Database();

       $sql = "SELECT * from users where profession = 'Doctor' ";
            try {
                $db = $dbConnection->getConnection();
                $stmt = $db->prepare($sql);
               // print_r($stmt);
                $stmt->execute();
                $doctor = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                $_SESSION['doctor'] = $doctor;

                return ($doctor);



            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
            } 
        
    }
    
        
    function masterUsersData($profession,$name){
     try {
        $dbConnection = new Database();
        $sql = "SELECT * from users where profession = :profession";
         //echo $sql;  
                $db = $dbConnection->getConnection();
                $stmt = $db->prepare($sql);
                $stmt->bindParam("profession", $profession);
                //$stmt->bindParam("name", "%".$name."%");
                $stmt->execute();
                $masterUsersData = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                return ($masterUsersData);



            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error1111":{"text1111":'. $e1->getMessage() .'}}'; 
            } 
        
    }
}
?>  