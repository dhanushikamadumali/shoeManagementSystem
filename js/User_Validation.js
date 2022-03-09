$(document).ready(function(){//when the document is loaded
  
    $("#User").submit(function(){////when the submit the form

        var UserFname = $("#user_fname").val();//get user first name
        var UserLname = $("#user_lname").val();//get user last name
        var UserEmail = $("#user_email").val();//get user email
        var UserDob   = $("#user_dob").val();//get user date of birth
        var UserNic   = $("#user_nic").val();//get user nic
        var UserCno1  = $("#user_cno1").val();//get user contact number
        var UserCno2  = $("#user_cno2").val();//get user mobile number
        var UserRole  = $("#user_role").val();//get user role
   
        if(UserFname==""){///// if the user fname  is not entered  
            $("#UserAlert").html("Please Enter Your First Name");
            $("#UserAlert").addClass("alert alert-danger");
            $("#user_fname").focus();
           
            return false;
        }
        if(UserLname==""){//////if the user lname is not entered 
            $("#UserAlert").html("Please Enter Your Last Name");
            $("#UserAlert").addClass("alert alert-danger");
            $("#user_lname").focus();
            return false;
        }
        var patEmail=/^([a-zA-z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;////valid email pattern
        if(UserEmail==""){///if email is not entered
            $("#UserAlert").html("Please Enter Your User Email");
            $("#UserAlert").addClass("alert alert-danger");
            $("#user_email").focus();
            return false;  
        }
        if(UserEmail!==""){/////if email is not  empty
            if(!UserEmail.match(patEmail)){/////if check valid email
                $("#UserAlert").html("Invalid Email, Please Enter Valid Email");
                $("#UserAlert").addClass("alert alert-danger");
                $("#user_email").focus();
                return false;
            }
        }
        if(UserDob==""){/////if dob is not entered
            $("#UserAlert").html("Please Enter Your User Date Of Birth");
            $("#UserAlert").addClass("alert alert-danger");
            $("#user_dob").focus();
            return false;
        }
      
        var patNic = /^[0-9]{9}[vVxX]$/; ////valid  old format pattern
        var patNic1= /^[0-9]{12}$/;/////valid  new format pattern
        if(UserNic==""){///if nic is not entered
            $("#UserAlert").html("Please Enter Your User NIC Number");
            $("#UserAlert").addClass("alert alert-danger");
            $("#user_nic").focus();
            return false;  
        }
        if(UserNic!==""){/////if nic is not  empty
            if(!(UserNic.match(patNic)) && !(UserNic.match(patNic1))){////// if nic is not match patnic and patnic1
                $("#UserAlert").html("Invalid NIC,Please Enter Valid NIC Number");
                $("#UserAlert").addClass("alert alert-danger");
                $("#use_nic").focus();
                return false;
            }  
        }
        //// to check nic with dob
        if(UserDob!="" && UserNic!=""){////if the nic and dob are entered
            var dob=new Date(UserDob);///selected date
            var year=dob.getFullYear();///selected year
            var len=UserNic.length;///lenth of the nic
            if(len==10){////if the nic length is 10
                var Unic = UserNic.substring(0,2);//first two number of nic
                var Udob = year.toString().substr(2,2);/////  second two number of year
                if(Unic!=Udob){///// if not match nic and dob
                    $("#UserAlert").html("Please Check DOB and NIC Number Old Format");
                    $("#UserAlert").addClass("alert alert-danger");
                    $("#use_nic").focus();
                    $("#use_nic").select();
                    return false;
                }
            }
            if(len==12){///// if the nic length is 10
                var Unic1 = UserNic.substring(0,4);///// first four number of nic
                var Udob1 = year;///// first four number of year
                if(Unic1!=Udob1){/////  if not match nic and dob
                    $("#UserAlert").html("Please Check DOB and NIC Number New Format");
                    $("#UserAlert").addClass("alert alert-danger");
                    $("#use_nic").focus();
                    $("#use_nic").select();
                    return false;
                }
            }
        }
      
        var patCno1 = /^[0-9]{10}$/;/////  valid new format pattern con1
        if(UserCno1==""){///if contact number is not entered
            $("#UserAlert").html("Please Enter Your Contact Number");
            $("#UserAlert").addClass("alert alert-danger");
            $("#user_cno1").focus();
            return false;  
        }
        if(UserCno1!==""){/////if cno is not  empty
        if(!UserCno1.match(patCno1)){/////  if not match con1 
            $("#UserAlert").html("Please Enter Your Valid Contact Number 1");
            $("#UserAlert").addClass("alert alert-danger");
            $("#user_cno1").focus();
            return false;
        }
        }
        var patCno2mobile = /^07[0-9]{8}$/;/////  valid new format pattern con2
        if(UserCno2==""){///if mobile number is not entered
            $("#UserAlert").html("Please Enter Your Mobile Number");
            $("#UserAlert").addClass("alert alert-danger");
            $("#user_con2").focus();
            return false;  
        }
        if(UserCno2!==""){/////if cno is not  empty
        if(!UserCno2.match(patCno2mobile)){/////  if not match con2
            $("#UserAlert").html("Please Enter Your Valid Mobile Contact Number 2");
            $("#UserAlert").addClass("alert alert-danger");
            $("#user_cno2").focus();
            return false;
        }
        }
        if (UserRole==""){///// if user role is not entered
            $("#UserAlert").html("Please Select User Role");
            $("#UserAlert").addClass("alert alert-danger");
            $("#user_role").focus();
            return false;
        }
        });
});


