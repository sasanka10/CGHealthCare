<?php 

class DoctorData{
    
    function getAppointmentDetails($hosiptal,$doctor,$appdate){
        $dbConnection = new Database();
       
       $sql = "SELECT * from appointment where DoctorId =:doctor and HosiptalId = :hosiptal and AppointementDate  = :appdate ";
            try {
                $db = $dbConnection->getConnection();
                $stmt = $db->prepare($sql);
                $stmt->bindParam("doctor", $doctor);
                $stmt->bindParam("hosiptal", $hosiptal);
                $stmt->bindParam("appdate", $appdate);
               // print_r($stmt);
                $stmt->execute();
                $appoiontmentDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                $_SESSION['appoiontmentDetails'] = $appoiontmentDetails;

                return ($appoiontmentDetails);



            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
            } 
        
    }
    
    
    function createAppointment($hosiptal,$doctor,$appdate,$pid,$slot,$status,$pname){
     
         $dbConnection = new Database();
        try{
          echo  $hosiptal;
            echo  $appdate;
        $sql = "INSERT INTO appointment(DoctorId, AppointementDate, AppointmentTime,status,PatientId,HosiptalId,PatientName) VALUES (:doctor,:appdate,:slot,:status,:pid,:hosiptal,:pname)";    
        
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("doctor", $doctor);
		$stmt->bindParam("appdate", $appdate);
		$stmt->bindParam("slot", $slot);
		$stmt->bindParam("status",$status);
		$stmt->bindParam("pid", $pid);
        $stmt->bindParam("hosiptal", $hosiptal);
        $stmt->bindParam("pname", $pname);
		$stmt->execute();
        //echo "Last Insert Id".$db->lastInsertId();
		$appointment = $db->lastInsertId();
		$db = null;
            
		return $appointment; 
	 } catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	} catch(Exception $e1) {
		echo '{"error1111":{"text1111":'. $e1->getMessage() .'}}'; 
	}
        
    }
  
}
?>    