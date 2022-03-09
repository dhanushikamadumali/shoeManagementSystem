$(document).ready(function(){//when the document is loaded
    
    $("#AddCustomer").submit(function(){////when the submit the form
        var CussFname = $("#cus_fname").val();
        var CussLname = $("#cus_lname").val();
        var CussEmail = $("#cus_email").val();
        var CussNic   = $("#cus_nic").val();
        var CussCno1  = $("#cuss_cno1").val();
        var CussCno2  = $("#cuss_cno2").val();
        var CussAddress  = $("#cus_address").val();
        
        if(CussFname==""){///// if the cuss fname  is not entered  
            $("#CustomerAlert").html("Please Enter Your First Name");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cus_fname").focus();
            return false;
        }
        
        if(CussLname==""){//////if the cuss lname is not entered 
            $("#CustomerAlert").html("Please Enter Your last Name");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cus_lname").focus();
            return false;
        }
        var patEmail=/^([a-zA-z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;////valid email pattern
        if(CussEmail==""){///if email is not entered
            $("#CustomerAlert").html("Please Enter Your email");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cus_email").focus();
            return false;  
        }
        if(CussEmail!==""){/////if email is not  empty
        if(!CussEmail.match(patEmail)){////if check valid email
            $("#CustomerAlert").html("Invalid Email");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cus_email").focus();
            return false;
        }
        }
        var patNic = /^[0-9]{9}[vVxX]$/; ////valid  old format pattern
        var patNic1= /^[0-9]{12}$/;/////valid  new format pattern
        if(CussNic==""){///if nic is not entered
            $("#CustomerAlert").html("Please Enter Your nic number");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cus_nic").focus();
            return false;  
        }
        if(CussNic!==""){/////if nic is not empty
            if(!(CussNic.match(patNic)) && !(CussNic.match(patNic1))){////// if nic is not match patnic and patnic1
                $("#CustomerAlert").html("Invalid NIC,Please enter valid nic number");
                $("#CustomerAlert").addClass("alert alert-danger");
                $("#cus_nic").focus();
                return false;
            }  
        }
        var patCno1 = /^[0-9]{10}$/;
        if(CussCno1==""){///if contact number is not entered
            $("#CustomerAlert").html("Please Enter Your  contact number");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cus_cno1").focus();
            return false;  
        }
        if(CussCno1!==""){/////if cno is not  empty
        if(!CussCno1.match(patCno1)){
            $("#CustomerAlert").html("Please Enter your valid Contact Number 1");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cus_cno1").focus();
            return false;
        }
        }
        var patCno2mobile = /^07[0-9]{8}$/;
        if(CussCno2==""){///if contact number is not entered
            $("#CustomerAlert").html("Please Enter Your  Mobile number");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cus_cno2").focus();
            return false;  
        }
        if(CussCno2!==""){/////if cno is not  empty
        if(!CussCno2.match(patCno2mobile)){
            $("#CustomerAlert").html("Please Enter your valid Mobile Number");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cus_cno2").focus();
            return false;
        }
        }
        if (CussAddress ==""){
            $("#CustomerAlert").html("Please select Your Address");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cus_address").focus();
            return false;
        }  
    });
});





