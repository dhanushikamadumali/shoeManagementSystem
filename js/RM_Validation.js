$(document).ready(function(){//when the document is loaded
  
    $("#rowMaterial").submit(function(){///when the submit the form add new product
       
    var productName = $("#rmName").val();//get row material name
    var collectionid = $("#coll_Id").val();//get collection id
    var categoryid = $("#categoryId").val();//get category id
    var unitid = $("#unit_Id").val();//get unit id
    var imageid = $("#image").val();//get image name
   

    if(productName==""){//if row material name empty
        $("#ProductAlert").html("Please Enter Row Material Name");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#pName").focus();
        return false;
    }
    if(collectionid==""){//if collection empty
        $("#ProductAlert").html("Please Select collection Name");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#Coll_Id").focus();
        return false;
    }
    if(categoryid==""){//if category empty
        $("#ProductAlert").html("Please Select Category Name");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#categoryId").focus();
        return false;
    } 
    if(unitid==""){//if unit empty
        $("#ProductAlert").html("Please Select  Unit");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#categoryId").focus();
        return false;
    }
    if(imageid==""){//if image empty
        $("#ProductAlert").html("Please Upload image");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#image").focus();
        return false;
    }
    });

});


