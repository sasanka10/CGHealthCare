// The root URL for the RESTful services
//var rootURL = "http://localhost:8888/HealthCareSystem";
var rootURL = "http://"+$('#host').val()+"/"+$('#rootnode').val();
$(document).ready(function(){
  
  
      $("#mobile").keypress(function (e) {
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#errmsg").html("Digits Only").show().fadeOut("slow");
                   return false;
        }
       });
    
    $('#login').click(function() {
        authenticateUser($('#username').val(),$('#password').val());
        return false;
    });
   $('#registeruser').click(function() {
       var sEmail = $('#email').val();
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!filter.test(sEmail))  {
             $("#emailErrmsg").html("Invalid Email Address").show();
            return false;
        }
       registerUser($('#newuser').val(),$('#newuserpassword').val(),$('#email').val(),$('#mobile').val(),$('#profession').val(),$('#address').val(),$('#name').val());
       return false;
    });
    
      $('#register').click(function() {
        
          $('#newuser').val($('#username').val());
          $('#newuserpassword').val($('#password').val());
          var $errorList = [];
           $('#errorDisplay').html($errorList);
    });
    
    
});    

function registerformValidation(userName,password,email,mobile,profession,address,name){
    var $errorList = [];
    
    console.log(userName);
    console.log(userName.length < 1);
    
    if(userName.length < 1){
        $errorList.push("Please enter User Name.  ");
        return false;   
    }else if(password.length < 1){
        $errorList.push("Please enter Password. <br/>");
        return false;
    }else if(email.length < 1){
        $errorList.push("Please enter Email. ");
        return false;
    }else if(mobile.length < 1){
        $errorList.push("  Please enter Mobile #. ");
        return false;
    }else if(profession.length < 1){
        $errorList.push("Please Select Profession. ");
        return false;
    }else if(address.length < 1){
        $errorList.push("Please enter Address. <br/>");
        return false;
    }else if(name.length < 1){
        $errorList.push("Please enter Name. ");
        return false;
    }else {
     return true;   
    }
    $('#errorDisplay').html($errorList);
     $('#errorRBlock').css("visibility") == "visible";
    
}
function registerUser(userName,password,email,mobile,profession,address,name){
    $("#emailErrmsg").html("").show();
    var formValidation = registerformValidation(userName,password,email,mobile,profession,address,name);
    console.log(formValidation);
    if(formValidation){
var registerData = JSON.stringify( {"userName" : userName,"password" : password,"email" : email,"mobile" : mobile,"profession" : profession,"address":address,"name":name } );
            console.log("data "+registerData);
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: rootURL+'/registerUser',
            dataType: "json",
            data:  registerData,
            success: function(data, textStatus, jqXHR){
                console.log('authentic success: ' + data);
                var list = data == null ? [] : (data.user instanceof Array ? data.user : [data.user]);
                 if((list).length < 1 ){

                     $('#errorlist').html("<font color='red'><b>Sorry due to some technical Issue Unable to Register You</b></font>");
                     $('#errorblock').css("visibility") == "visible";

                  } 

               $.each(list, function(index, user) {
                  
                    $('#errorDisplay').html("User Created Successfully.Use your Mobile # as USERID. Please Login with your credentials !");
                    $('#errorRBlock').css("visibility") == "visible";
                   
                });

            },
            error: function(jqXHR, textStatus, errorThrown){
               console.log("Error IS ......".textStatus);
                console.log("Error IS ......".jqXHR);
                console.log("Error IS ......".errorThrown);
            }
        });
    }
}

function authenticateUser(userName,password) {
	console.log('userName: ' + userName);
    console.log('password: ' + password);
    if(userName.length < 1){
        $('#errorlist').html("<font color='red'><b>  Please enter User ID</b></font>");
        return false;
    }
    if(password.length < 1){
        $('#errorlist').html(" <font color='red'><b>  Please enter Password</b></font>");
        return false;
    }
    console.log(rootURL + '/authenticate/' + userName +'/'+password);
	$.ajax({
		type: 'GET',
		url: rootURL + '/authenticate/' + userName +'/'+password,
		dataType: "json",
		success: function(data){
			console.log('authentic success: ' + data);
            var list = data == null ? [] : (data.user instanceof Array ? data.user : [data.user]);
             if((list).length < 1 ){
                 
                 $('#errorlist').html("<font color='red'><b>  Invalid User Name and Password Combination </b></font>");
                 $('#errorblock').css("visibility") == "visible";
                 
              } 
           $.each(list, function(index, user) {
               
              if(user.rolename == "Patient"){
                 $(location).attr('href',rootURL+"/Web/patient/patientindex.php"); 
              } else if(user.rolename == "Staff"){
                 $(location).attr('href',rootURL+"/Web/staff/staffindex.php"); 
              } else {
                   $('#errorlist').html("<font color='red'><b>  Please Contact Admin for activating account  </b></font>");
                  $('#errorblock').css("visibility") == "visible";
              }
            });
            
		},
        error: function(data){
           $('#errorlist').html("<font color='red'><b>  Unable to login to System Please contact System Admin.</b></font>");
                 $('#errorblock').css("visibility") == "visible";
        }
	});
}


function renderDetails(data) {
        
var list = data == null ? [] : (data.user instanceof Array ? data.user : [data.user]);

	console.log(list);
	$.each(list, function(index, user) {
        console.log(user.username);
        console.log(user.rolename);
	//	$('#wineList').append('<li><a href="#" data-identity="' + wine.username + '">'+wine.rolename+'</a></li>');
	});
    
    
    
    console.log(userDetails);
	//$('#username').val(userDetails.username);
	//$('#username').val(userDetails.rolename);
           // alert(('#userId').val());
            //alert(($('#userId').val() == "Patient"));
}