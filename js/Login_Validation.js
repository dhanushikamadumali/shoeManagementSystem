$(document).ready(function(){///when the document is load
    $("#loginform").submit(function (){/////when the submit the form
        
        var username=$("#uname").val();///get the uname value
        var password=$("#pswd").val();//// get the password value
        
        if((username=="")&&(password=="")){/// if username password empty
            $("#alertmsg").html("Username and Password Cannot be Empty!!!");
            $("#alertmsg").addClass("alert alert-danger");
            return false;
        }
        var patUname=/^([a-zA-z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;////valid uname pattern
        if(username==""){/////if uname is empty
            $("#alertmsg").html("Username Cannot be Empty!!!");
            $("#alertmsg").addClass("alert alert-danger");
            $("#uname").focus();
            return false;
        }
        if(username !==""){/////if uname is not entered
            if(!username.match(patUname)){/////if check valid username
                $("#alertmsg").html("Invalid Username Please enter email");
                $("#alertmsg").addClass("alert alert-danger");
                $("#uname").focus();
                return false;
            }
        }
        if(password==""){////if password empty
                $("#alertmsg").html("Password Cannot be Empty!!!");
                $("#alertmsg").addClass("alert alert-danger");
                $("#pswd").focus();
                return false;
        }
       
        
    });

});


