<?php


class StaffData{
    
    function hosiptalDoctorData(){
        $dbConnection = new Database();
       
       $sql = "SELECT u.id,u.name,h.hosiptalname,dh.department FROM users u,hosiptal h,doctor_hosiptal dh where u.id = dh.doctorid AND h.id = dh.hosiptalid and u.profession = 'Doctor'";
            try {
                $db = $dbConnection->getConnection();
                $stmt = $db->prepare($sql);
               // print_r($stmt);
                $stmt->execute();
                $hosiptaldoctor = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                //$_SESSION['hosiptal'] = $hosiptal;
                //echo $hosiptaldoctor;
                return ($hosiptaldoctor);



            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } catch(Exception $e1) {
                echo '{"error11":{"text11":'. $e1->getMessage() .'}}'; 
            } 
        
    }
    
}

?>