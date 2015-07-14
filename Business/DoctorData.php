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
    
    
 function  createDoctorData($userName,$password,$name,$mobile,$altmobile,$address,$email,$department,$hosiptal,$profession){
     try{  
     //echo "User Name".$userName;
        $id = $this->createUser($userName,$password,$name,$mobile,$altmobile,$address,$email,$profession);
       // echo "IDDD".$id;
        if($profession == "Doctor")     
            $hosId = $this->createHosiptalRelation($department,$hosiptal,$id);
         return $id;
       } catch(PDOException $e) {
                error_log($e->getMessage(), 3, '/var/tmp/php.log');
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error113":{"text131":'. $e1->getMessage() .'}}'; 
            }  
    }
    
    function createHosiptalRelation($department,$hosiptal,$id){
        
        try{
           // echo "id".$id;echo "department".$department;echo "hosiptal".$hosiptal;
            $sql = "INSERT INTO DOCTOR_HOSIPTAL (doctorid,hosiptalid,department) VALUES(:doctor_id,:hosiptal_id,:department)";
             $db = getConnection();
                $stmt = $db->prepare($sql);  
                $stmt->bindParam("doctor_id", $id);
                $stmt->bindParam("hosiptal_id", $hosiptal);
                $stmt->bindParam("department", $department);
                $stmt->execute();
                //echo "Last Insert Id".$db->lastInsertId();
               // $doctorHosiptal->id = $db->lastInsertId();
            
               return $db->lastInsertId();
        } catch(PDOException $e) {
                error_log($e->getMessage(), 3, '/var/tmp/php.log');
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error121":{"text121":'. $e1->getMessage() .'}}'; 
            }
        
    }
    
    function createUser($userName,$password,$name,$mobile,$altmobile,$address,$email,$profession){
         try {
                //echo "Hello";  
          $sql = "INSERT INTO users (username, password, email, mobile,altmobile, profession,address,name) VALUES (:userName, :password, :email, :mobile,:altmobile, :profession,:address,:name)";
                $db = getConnection();
                $stmt = $db->prepare($sql);  
                $stmt->bindParam("userName", $userName);
                $stmt->bindParam("password", $password);
                $stmt->bindParam("email", $email);
                $stmt->bindParam("mobile", $mobile);
                $stmt->bindParam("altmobile", $altmobile);
                $stmt->bindParam("profession",$profession);
                $stmt->bindParam("address", $address);
                 $stmt->bindParam("name", $name);
                $stmt->execute();
               // echo "Last Insert Id".$db->lastInsertId();
             
                return   $db->lastInsertId();
             } catch(PDOException $e) {
                error_log($e->getMessage(), 3, '/var/tmp/php.log');
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error113":{"text131":'. $e1->getMessage() .'}}'; 
            }
        
    }
    function doctorMasterData($doctorId){
        $dbConnection = new Database();
       // echo "Doctor Id".$doctorId."         ";
            try{
             $sql = "select * from users u, hosiptal h, doctor_hosiptal dh where u.id = dh. doctorid and h.id = dh.hosiptalid and u.ID = :doctorId";    
//echo $sql;
            $db = getConnection();
            $stmt = $db->prepare($sql);  
            $stmt->bindParam("doctorId", $doctorId);
            $stmt->execute();
           // $doctorMasterData = $stmt->lastInsertId();
            $doctorMasterData = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            return $doctorMasterData; 
         } catch(PDOException $e) {
            error_log($e->getMessage(), 3, '/var/tmp/php.log');
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        } catch(Exception $e1) {
            echo '{"error1111":{"text1111":'. $e1->getMessage() .'}}'; 
        }
    }
    
    
function userMasterData($userId){
$dbConnection = new Database();
 //echo "Doctor Id".$userId."         ";
            try{
             $sql = "select * from users u where u.ID = :userId";    
//echo $sql;
            $db = getConnection();
            $stmt = $db->prepare($sql);  
            $stmt->bindParam("userId", $userId);
            $stmt->execute();
           // $doctorMasterData = $stmt->lastInsertId();
            $doctorMasterData = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            return $doctorMasterData; 
         } catch(PDOException $e) {
            error_log($e->getMessage(), 3, '/var/tmp/php.log');
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        } catch(Exception $e1) {
            echo '{"error1111":{"text1111":'. $e1->getMessage() .'}}'; 
        }
    }
  
}
?>    