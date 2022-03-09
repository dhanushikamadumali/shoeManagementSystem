$(document).ready(function(){//when the document is loaded
  
    $("#submit").click(function(){////when the submit the form
    //   get the entered values
        var Receiveamount = $("#Receiveamount").val();
        var CardNo = $("#cardNo").val();
        var CardHName = $("#cardHName").val();
        var month   = $("#month").val();
        var Year   = $("#year").val();
        var seccode  = $("#seccode").val();
   
        if(Receiveamount==""){///// if the receiamount  is not entered  
            $("#Alert").html("Please Enter Receiamount");
            $("#Alert").addClass("alert alert-danger");
            $("#Receiveamount").focus();
            return false;
        }
        if(CardNo==""){//////if the card number is not entered 
            $("#Alert").html("Please Enter Card Number");
            $("#Alert").addClass("alert alert-danger");
            $("#cardNo").focus();
            return false;
        }
       
        if(CardHName==""){///if card holder number  is not entered
            $("#Alert").html("Please Enter Card Holder Number");
            $("#Alert").addClass("alert alert-danger");
            $("#cardHName").focus();
            return false;  
        }
        if(month==""){/////if month is not entered
            $("#Alert").html("Please Enter card expire month");
            $("#Alert").addClass("alert alert-danger");
            $("#month").focus();
            return false;
        }
        if(Year==""){///if year is not entered
            $("#Alert").html("Please Enter card expire year");
            $("#Alert").addClass("alert alert-danger");
            $("#year").focus();
            return false;  
        }
        if (seccode==""){///// if seccode is not entered
            $("#Alert").html("Please Enter card security code");
            $("#Alert").addClass("alert alert-danger");
            $("#seccode").focus();
            return false;
        }


});


});

      
    
