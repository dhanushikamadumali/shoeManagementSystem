$(document).ready(function(){//when the document is loaded
  
    $("#barcode").submit(function(){////when the submit the form
//        get the entered values
        var proid = $("#product_id").val();
        var name = $("#name").val();
        var qty   = $("#qty").val();
        var price   = $("#price").val();
        if( proid==""){///if product id not entered
            $("#Alert").html("Please Enter product id");
            $("#Alert").addClass("alert alert-danger");
            $("#product_id").focus();
            return false;  
        }
        else if(name==""){///if product name is not entered
            $("#Alert").html("Please Enter product name");
            $("#Alert").addClass("alert alert-danger");
            $("#name").focus();
            return false;  
        }
        else if(price==""){//if price is not entered
            $("#Alert").html("Please Enter price");
            $("#Alert").addClass("alert alert-danger");
            $("#price").focus();
            return false;
        }
        else if(qty==""){/////if qty is not entered
            $("#Alert").html("Please Enter quantity");
            $("#Alert").addClass("alert alert-danger");
            $("#qty").focus();
            return false;
        }
        else if($('input[name="SizeId"]:checked').length < 1){/////if size id length less than one
            $("#Alert").html("At least One size must be selected");
            $("#Alert").addClass("alert alert-danger");
            return false;
        }
    });

});


