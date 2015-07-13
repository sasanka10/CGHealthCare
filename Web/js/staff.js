var rootURL = "http://"+$('#host').val()+"/"+$('#rootnode').val();
$(document).ready(function(){
  
     getHosiptalDoctor();
    
       $("#doctorname").keypress(function (e) {
         
            $("#errmsg").html("Enter Minimum 3 Characters for Search").show().fadeOut("slow");
                  
        });
    
     $('#getDoctors').click(function() {
         
          if($('#doctorname').val() < 2){
               $('#doctorerrormsg').html("Please Enter Doctor");
               return false;
            }

         getDoctorsList($('#doctorname').val());
         
     });
 //$userDetails->userName,$userDetails->name,$userDetails->mobile,$userDetails->altmobile,$userDetails->address,$userDetails->email,$userDetails->department,$userDetails->hosiptal,$userDetails->profession   
    $('#btnSubmitDoctor').click(function(){
        userName = $('#loginid').val();
        password = $('#password').val();
        cpassword  = $('#cpassword').val();        
        name = $('#name').val();
        mobile = $('#mobile').val();
        altmobile = $('#altmobile').val();
        address = $('#address').val();
        email = $('#email').val();
        department = $('#specialisation').val();
        hosiptal = $('#hosiptal').val();
        profession = 'Doctor';    
        
    if(password != cpassword){
        $('#mainerrormsg').html("Password is not equal to Confirm Password");
               return false;
    }

         $('#mainerrormsg').html("");    
    var userDetails = JSON.stringify( {"userName" : userName,"password" : password,"name" : name,"mobile" : mobile,"altmobile" : altmobile,"address" : address,"email" : email,"department":department,"hosiptal":hosiptal,"profession":profession } );
     console.log(userDetails);   
        $.ajax({
        type: 'POST',
        contentType: 'application/json',
        url: rootURL + '/createUser',
        dataType: "json",
        data:  userDetails,
        success: function(data, textStatus, jqXHR){
                console.log('authentic success: ' + data)
                    var list = data == null ? [] : (data.userDetails  instanceof Array ? data.userDetails  : [data.userDetails ]);
    
                    $('#mainerrormsg').html("Doctor Created Successfully !");
                   // $('#errorRBlock').css("visibility") == "visible";

            },
            error: function(jqXHR, textStatus, errorThrown){
               console.log("Error IS ......".jqXHR );
                console.log("Error IS ......".errorThrown);
                console.log("Error IS ......".textStatus);
            }
        });

        });

    
});  

function getDoctorsList(doctorname){
    $('#doctorerrormsg').html("");
    var para = "Doctor";
    console.log(rootURL + '/professionBasedData/'+para+'/'+doctorname);
     $.ajax({
    type: 'GET',
    url: rootURL + '/professionBasedData/'+para+'/'+doctorname,
    dataType: "json",
    success: function(data){
			console.log('authentic success: ' + data)
        var list = data == null ? [] : (data.masterUsersData  instanceof Array ? data.masterUsersData  : [data.masterUsersData ]); 
         
    
         var trHTML = '';
           $.each(list, function(index, masterUsersData) {
              
            
                    trHTML += '<tr><td>' + index +  '</td><td>' + masterUsersData.name   +'</td><td> <a href="#" onclick = showdata('+ masterUsersData.ID +')> Edit <a></td></tr>';
                
              
            });
             $('#doctor_NonActive_data').append(trHTML);
            $('#doctor_NonActive_data').load(); 
		},
        error: function(data){
           console.log("Error IS ......".data);
        }
	});
}

function showdata(patientid){
    
    alert(patientid);
    
     console.log(rootURL + '/doctorMasterData/'+patientid);
    $.ajax({
    type: 'GET',
    url: rootURL + '/doctorMasterData/'+patientid,
    dataType: "json",
    success: function(data){
			console.log('authentic success: ' + data)
            var list = data == null ? [] : (data.doctorMasterData instanceof Array ? data.doctorMasterData : [data.doctorMasterData]); 
         
    
         var trHTML = '';
           $.each(list, function(index, hosiptalDoctorData) {
              
               console.log(hosiptalDoctorData);
               /*
                    trHTML += '<tr><td>' + index + '</td><td>' + hosiptalDoctorData.hosiptalname  + '</td><td>' + hosiptalDoctorData.name   +'</td><td>' + hosiptalDoctorData.department   + '</td></tr>';
                
                 console.log(hosiptalDoctorData.PatientName );
                 
                 */
              
            });
             //$('#doctor_hosiptal_data').append(trHTML);
            //$('#doctor_hosiptal_data').load(); 
		},
        error: function(data){
           console.log("Error IS ......".data);
        }
	});
    
}

function getHosiptalDoctor(){
    console.log(rootURL + '/hosiptalDoctorData');
    $.ajax({
    type: 'GET',
    url: rootURL + '/hosiptalDoctorData',
    dataType: "json",
    success: function(data){
			console.log('authentic success: ' + data)
            var list = data == null ? [] : (data.hosiptalDoctorData instanceof Array ? data.hosiptalDoctorData : [data.hosiptalDoctorData]); 
         
    
         var trHTML = '';
           $.each(list, function(index, hosiptalDoctorData) {
              
               
                    trHTML += '<tr><td>' + index + '</td><td>' + hosiptalDoctorData.hosiptalname  + '</td><td>' + hosiptalDoctorData.name   +'</td><td>' + hosiptalDoctorData.department   + '</td></tr>';
                
                 console.log(hosiptalDoctorData.PatientName );
              
            });
             $('#doctor_hosiptal_data').append(trHTML);
            $('#doctor_hosiptal_data').load(); 
		},
        error: function(data){
           console.log("Error IS ......".data);
        }
	});
    
}