$(document).ready(function(){//when the document is loaded
  
    $("#addPoOrder").submit(function(){///when the submit the form add new product
         // get the entered values
        var supplierid =$("#supp_Id").val();
        var rowmaterialid =$("#rMaterialId").val(); 
        var price =$("#r_material_price").val();
        var qty =$("#Qty").val();
        var rowCount = $('#rowmaterial1 tr').length;
     
        if(supplierid ==""){//if supplier empty
            $("#RMAlert").html("Please Select Supplier Name");
            $("#RMAlert").addClass("alert alert-danger");
            $("#supp_Id").focus();
            return false;
        }
        if(rowmaterialid ==""){//if row material empty
            $("#RMAlert").html("Please Select Row Material");
            $("#RMAlert").addClass("alert alert-danger");
            $("#rMaterial_Id").focus();
            return false;
        } 
        if(price==""){//if price empty
            $("#RMAlert").html("Please Enter Price");
            $("#RMAlert").addClass("alert alert-danger");
            $("#r_material_price").focus();
            return false;
        }
        if(qty==""){//if category empty
            $("#RMAlert").html("Please Enter Quantity");
            $("#RMAlert").addClass("alert alert-danger");
            $("#Qty").focus();
            return false;
        }
        if(rowCount<=1){//if table row count less than or equal one
            $("#RMAlert").html("Table Is Empty Please Click Add Button");
            $("#RMAlert").addClass("alert alert-danger");
            $("#rowmaterial1").focus();
            return false;
        }
    });
  
});
  
  
  