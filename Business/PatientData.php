<?php 
require 'Database.php';



class PatientData{
    

    
    function getPatientDetails($patientId){
        $dbConnection = new Database();
        
            $sql = "SELECT * from users where id = :patientId";
            try {
                $db = $dbConnection->getConnection();
                $stmt = $db->prepare($sql);
                $stmt->bindParam("patientId", $patientId);
                $stmt->execute();
                $userDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                $_SESSION['userDetails'] = $userDetails;

                return json_encode($userDetails);



            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
            } 
        
    }
    
    function updateProfile($id,$profile){
         $dbConnection = new Database();
            $sql = "update users set name = :name, password = :password,email =:email, mobile = :mobile,address= :address where id =:id";
        try{
                $db = getConnection();
                $stmt = $db->prepare($sql);  
                $stmt->bindParam("name", $profile->name);
                $stmt->bindParam("password", $profile->password);
                $stmt->bindParam("email", $profile->email);
                $stmt->bindParam("mobile", $profile->mobile);
                $stmt->bindParam("address", $profile->address);
                $stmt->bindParam("id", $profile->userid);
                $stmt->execute();  
                $db = null;
                return $profile;
        } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
            } 
    }
  
    
    function getPatientList($patientName){
        
         $dbConnection = new Database();
        
            $sql = "SELECT * from users where name LIKE :patientName";
        
     //   echo $sql;
    //    echo $patientName;
            try {
                $db = $dbConnection->getConnection();
                $stmt = $db->prepare($sql);
                $stmt->bindValue("patientName", "%".$patientName."%", PDO::PARAM_STR);
                $stmt->execute();
                $userDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                //$_SESSION['userDetails'] = $userDetails;
               // echo $stmt->debugDumpParams();
                
                  //  print_r($userDetails);
                return $userDetails;



            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
            } 
    }

    function getAppointmentPatientList($patientName,$hosiptal,$appdate){
        
          $dbConnection = new Database();
        
            $sql = "SELECT * from appointment where patientName LIKE :patientName and hosiptalid = :hosiptalid and appointementdate = :appdate and status = 'N'";
        
     //   echo $sql;
    //    echo $patientName;
            try {
                $db = $dbConnection->getConnection();
                $stmt = $db->prepare($sql);
                $stmt->bindValue("patientName", "%".$patientName."%", PDO::PARAM_STR);
                $stmt->bindParam("hosiptalid", $hosiptal);
                $stmt->bindParam("appdate", $appdate);
                $stmt->execute();
                $appointmentDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                //$_SESSION['userDetails'] = $userDetails;
               // echo $stmt->debugDumpParams();
                
                  //  print_r($userDetails);
                return $appointmentDetails;



            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
            } 
    }
    
    
    
      
    function updateAppointment($appointmentId){
        
            $dbConnection = new Database();
            $sql = "update appointment set status = 'Y' where id =:id";
        try{
                $db = getConnection();
                $stmt = $db->prepare($sql);  
                $stmt->bindParam("id", $appointmentId);
                $stmt->execute();  
                $db = null;
                return $appointmentId;
        } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
            } 
        
    }
    
    
    
}


?>