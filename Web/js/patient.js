var rootURL = "http://"+$('#host').val()+"/"+$('#rootnode').val();
$(document).ready(function(){
  
  
      $("#mobile").keypress(function (e) {
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#errmsg").html("Digits Only").show().fadeOut("slow");
                   return false;
        }
       });

   $('#updateprofile').click(function() {
       var sEmail = $('#email').val();
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!filter.test(sEmail))  {
             $("#emailErrmsg").html("Invalid Email Address").show();
            return false;
        }
       updateProfile($('#userid').val(),$('#newuserpassword').val(),$('#email').val(),$('#mobile').val(),$('#name').val(),$('#address').val());
       return false;
    });

    
    
});  



function registerformValidation(userid,password,email,mobile,name,address){
    var $errorList = [];
    
    console.log(userid);
    console.log(userid.length < 1);
    
   if(password.length < 1){
        $errorList.push("Please enter Password. <br/>");
        return false;
    }else if(email.length < 1){
        $errorList.push("Please enter Email. ");
        return false;
    }else if(mobile.length < 1){
        $errorList.push("  Please enter Mobile #. ");
        return false;
    }else if(name.length < 1){
        $errorList.push("Please enter Name. ");
        return false;
    }else if(address.length < 1){
        $errorList.push("Please enter Address. ");
        return false;
    }else {
     return true;   
    }
    $('#errorDisplay').html($errorList);
     $('#errorRBlock').css("visibility") == "visible";
    
}
function updateProfile(userid,password,email,mobile,name,address){
    $("#emailErrmsg").html("").show();
    var formValidation = registerformValidation(userid,password,email,mobile,name,address);
    
    if(formValidation){
var registerData = JSON.stringify( {"userid" : userid,"password" : password,"email" : email,"mobile" : mobile,"name" : name,"address":address } );
        
            console.log("data "+registerData);
       
        $.ajax({
            type: 'PUT',
            contentType: 'application/json',
            url: rootURL+'/updateprofile/'+userid,
            dataType: "json",
            data:  registerData,
            success: function(data, textStatus, jqXHR){
                console.log('Update Profile success: ' + data);
                var list = data == null ? [] : (data.user instanceof Array ? data.user : [data.user]);
                 if((list).length < 1 ){

                     $('#errorlist').html("<font color='red'><b>Sorry due to some technical Issue Unable to Update You</b></font>");
                     $('#errorblock').css("visibility") == "visible";

                  } 

               $.each(list, function(index, user) {
                  
                    $('#errorDisplay').html("Profile Updated Successfully.");
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
