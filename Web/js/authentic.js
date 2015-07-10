// The root URL for the RESTful services
var rootURL = "http://localhost:8888/HealthCareSystem";
$(document).ready(function(){
   // $('#errorblock').hide();
    //$(".errorblock").css({"visibility":"hidden"});
    $('#login').click(function() {
        authenticateUser($('#username').val(),$('#password').val());
        return false;
    });
   $('#registeruser').click(function() {
       registerUser($('#newuser').val(),$('#newuserpassword').val(),$('#email').val(),$('#mobile').val(),$('#profession').val());
       return false;
    });
    
      $('#register').click(function() {
        
          $('#newuser').val($('#username').val());
          $('#newuserpassword').val($('#password').val());
          var $errorList = [];
           $('#errorDisplay').html($errorList);
    });
    
    
});    

function registerformValidation(userName,password,email,mobile,profession){
    var $errorList = [];
    
    console.log(userName);
    console.log(userName.length < 1);
    
    if(userName.length < 1)
        $errorList.push("Please enter User Name.  ");
    if(password.length < 1)
        $errorList.push("Please enter Password. <br/>");
    if(email.length < 1)
        $errorList.push("Please enter Email. ");
    if(mobile.length < 1)
        $errorList.push("  Please enter Mobile #. ");
    if(profession.length < 1)
        $errorList.push("Please Select Profession. ");
    
    $('#errorDisplay').html($errorList);
     $('#errorRBlock').css("visibility") == "visible";
    
}
function registerUser(userName,password,email,mobile,profession){
    
    if(registerformValidation(userName,password,email,mobile,profession)){

        $.ajax({
            type: 'POST',
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
                     $(location).attr('href',"http://localhost:8888/HealthCareSystem/Web/patient/patienthome.php"); 
                  }
                });

            },
            error: function(data){
               console.log("Error IS ......".data);
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
                 $(location).attr('href',"http://localhost:8888/HealthCareSystem/Web/patient/patienthome.php"); 
              }
            });
            
		},
        error: function(data){
           console.log("Error IS ......".data);
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