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
    
   // For saving Doctor
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
    
                    $('#mainerrormsg').html(profession+" Created Successfully !");
                   // $('#errorRBlock').css("visibility") == "visible";

            },
            error: function(jqXHR, textStatus, errorThrown){
               console.log("Error IS ......".jqXHR );
                console.log("Error IS ......".errorThrown);
                console.log("Error IS ......".textStatus);
            }
        });

        });
    
    
    
    
    
     // For saving Patient
    $('#btnSubmitPatient').click(function(){
        userName = $('#loginid').val();
        password = $('#password').val();
        cpassword  = $('#cpassword').val();        
        name = $('#name').val();
        mobile = $('#mobile').val();
        altmobile = $('#altmobile').val();
        address = $('#address').val();
        email = $('#email').val();
        department = "-";
        profession = 'Others';    
        hosiptal = "-";
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
    
                    $('#mainerrormsg').html(profession+" Created Successfully !");
                   // $('#errorRBlock').css("visibility") == "visible";

            },
            error: function(jqXHR, textStatus, errorThrown){
               $('#mainerrormsg').html(profession+" Could Not create / update user. Network Issue. Please contact Network Administrator !");
            }
        });

        });

    
    
    
     
     // For saving Hosiptal
    $('#btnSubmitHosiptal').click(function(){
        userName = $('#loginid').val();
        password = $('#password').val();
        cpassword  = $('#cpassword').val();        
        name = $('#name').val();
        mobile = $('#mobile').val();
        altmobile = $('#altmobile').val();
        address = $('#address').val();
        email = $('#email').val();
        department = "";
        profession = 'Hosiptal';    
        hosiptal = "";
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
    
                    $('#mainerrormsg').html(profession+" Created Successfully !");
                   // $('#errorRBlock').css("visibility") == "visible";

            },
            error: function(jqXHR, textStatus, errorThrown){
               console.log("Error IS ......".jqXHR );
                console.log("Error IS ......".errorThrown);
                console.log("Error IS ......".textStatus);
            }
        });

        });
    
    
    
     // For saving Lab
    $('#btnSubmitLab').click(function(){
        userName = $('#loginid').val();
        password = $('#password').val();
        cpassword  = $('#cpassword').val();        
        name = $('#name').val();
        mobile = $('#mobile').val();
        altmobile = $('#altmobile').val();
        address = $('#address').val();
        email = $('#email').val();
        department = "";
        profession = 'Lab';    
        hosiptal = "";
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
    
                    $('#mainerrormsg').html(profession+" Created Successfully !");
                   // $('#errorRBlock').css("visibility") == "visible";

            },
            error: function(jqXHR, textStatus, errorThrown){
               console.log("Error IS ......".jqXHR );
                console.log("Error IS ......".errorThrown);
                console.log("Error IS ......".textStatus);
            }
        });

        });
    
    
     
     // For saving Medical
    $('#btnSubmitMedical').click(function(){
        userName = $('#loginid').val();
        password = $('#password').val();
        cpassword  = $('#cpassword').val();        
        name = $('#name').val();
        mobile = $('#mobile').val();
        altmobile = $('#altmobile').val();
        address = $('#address').val();
        email = $('#email').val();
        department = "";
        profession = 'Medical';    
        hosiptal = "";
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
    
                    $('#mainerrormsg').html(profession+" Created Successfully !");
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
    var page = GetURLParameter('page');
    var para = "";
    //alert(GetURLParameter('page'));
    $('#doctorerrormsg').html("");
    
    if(page == "staffpatient")
        para = "Others";
    else if(page == "staffdoctor")
        para = "Doctor";
    else if(page == "staffhosiptal")
        para = "Hosiptal";
    else if(page == "stafflab")
        para = "Lab";
    else if(page == "staffmedical")
        para = "Medical";
    
    console.log(rootURL + '/professionBasedData/'+para+'/'+doctorname);
     $.ajax({
    type: 'GET',
    url: rootURL + '/professionBasedData/'+para+'/'+doctorname,
    dataType: "json",
    success: function(data){
			console.log('authentic success: ' + data)
        var list = data == null ? [] : (data.masterUsersData  instanceof Array ? data.masterUsersData  : [data.masterUsersData ]); 
         console.log(list);  console.log(list.length);
        if(list.length > 0){
         var trHTML = '';
           $.each(list, function(index, masterUsersData) {
              console.log(masterUsersData);
            
                    trHTML += '<tr><td>' + index +  '</td><td>' + masterUsersData.name   +'</td><td> <a href="#" onclick = showdata('+ masterUsersData.ID +')> Edit <a></td></tr>';
                
              
            });
             $('#doctor_NonActive_data').append(trHTML);
            $('#doctor_NonActive_data').load(); 
         } else{
              $('#mainerrormsg').html("No Records Found with this search criteria");
         }
		},
        error: function(data){
           $('#mainerrormsg').html("No Records Found with this user");
        }
	});
}
/*

{"doctorMasterData": [{"ID":"0000000004","username":"Penelope Premium","password":"hanuman","email":"Doc@doc.com","mobile":"9052343651","altmobile":"0","profession":"Doctor","address":"Hyderabad","name":"Bujji","id":"1","hosiptalname":"Sri Ram","haddress":"","status":"Y","doctorid":"4","hosiptalid":"1","department":"Nuclear"},{"ID":"0000000004","username":"Penelope Premium","password":"hanuman","email":"Doc@doc.com","mobile":"9052343651","altmobile":"0","profession":"Doctor","address":"Hyderabad","name":"Bujji","id":"2","hosiptalname":"Apollo","haddress":"","status":"Y","doctorid":"4","hosiptalid":"2","department":"Orthopedics"}]}

*/
function showdata(patientid){
    console.log(patientid);
   // alert(patientid);
    var requesturl = "";
    alert(patientid);
    var page = GetURLParameter('page');
    var para = "";
    //alert(GetURLParameter('page'));
    $('#doctorerrormsg').html("");
    
    if(page == "staffpatient")
        requesturl = rootURL + '/userMasterData/'+patientid;
    else if(page == "staffdoctor")
        requesturl = rootURL + '/doctorMasterData/'+patientid;
    else if(page == "staffhosiptal")
        requesturl = rootURL + '/userMasterData/'+patientid;
    else if(page == "stafflab")
        requesturl = rootURL + '/userMasterData/'+patientid;
    else if(page == "staffmedical")
        requesturl = rootURL + '/userMasterData/'+patientid;
    
     console.log(requesturl);
    $.ajax({
    type: 'GET',
    url: requesturl,
    dataType: "json",
    success: function(data){
			console.log('authentic success: ' + data)
            var list = data == null ? [] : (data.doctorMasterData instanceof Array ? data.doctorMasterData : [data.doctorMasterData]); 
         
    //alert(list.length);
         var trHTML = '';
           $.each(list, function(index, hosiptalDoctorData) {
              
               console.log(hosiptalDoctorData);
                
                $('#name').val(hosiptalDoctorData.name); $('#mobile').val(hosiptalDoctorData.mobile); $('#altmobile').val(hosiptalDoctorData.altmobile); $('#email').val(hosiptalDoctorData.email); $('#address').val(hosiptalDoctorData.address); $('#loginid').val(hosiptalDoctorData.username); $('#password').val(hosiptalDoctorData.password); $('#cpassword').val(hosiptalDoctorData.password); $('#specialisation').val(hosiptalDoctorData.department); $('#hosiptal').val(hosiptalDoctorData.id); $('#clinicname').val(hosiptalDoctorData.hosiptalname);
            });
             $('#doctor_hosiptal_data').append(trHTML);
            $('#doctor_hosiptal_data').load(); 
            
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



function showuserdata(patientid){
    
    alert(patientid);
    
     console.log(rootURL + '/userMasterData/'+patientid);
    $.ajax({
    type: 'GET',
    url: rootURL + '/userMasterData/'+patientid,
    dataType: "json",
    success: function(data){
			console.log('authentic success: ' + data)
            var list = data == null ? [] : (data.doctorMasterData instanceof Array ? data.doctorMasterData : [data.doctorMasterData]); 
         
    
         var trHTML = '';
           $.each(list, function(index, hosiptalDoctorData) {
              
               console.log(hosiptalDoctorData);
                
                $('#name').val(hosiptalDoctorData.name); $('#mobile').val(hosiptalDoctorData.mobile); $('#altmobile').val(hosiptalDoctorData.altmobile); $('#email').val(hosiptalDoctorData.email); $('#address').val(hosiptalDoctorData.address); $('#loginid').val(hosiptalDoctorData.username); $('#password').val(hosiptalDoctorData.password); $('#cpassword').val(hosiptalDoctorData.password);
            });
             //$('#doctor_hosiptal_data').append(trHTML);
            //$('#doctor_hosiptal_data').load(); 
		},
        error: function(data){
           console.log("Error IS ......".data);
        }
	});
    
}

function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}