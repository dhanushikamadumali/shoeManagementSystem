$(document).ready(function(){//when the document is loaded
  
    $("#product").submit(function(){///when the submit the form add new product
       // get the entered values
    var productName =$("#pName").val();//get product name
    var collectionid =$("#coll_Id").val();//get collection id
    var categoryid =$("#categoryId").val();//get category id
    var subcategoryid =$("#SubCatId").val();//get category id
    var imageid =$("#image").val();//get image name

    if(productName==""){//if product name empty
        $("#ProductAlert").html("Please Enter Product Name");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#pName").focus();
        return false;
    }
    if(collectionid==""){//if collection empty
        $("#ProductAlert").html("Please Enter collection Name");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#Coll_Id").focus();
        return false;
    }
    if(categoryid==""){//if category empty
        $("#ProductAlert").html("Please Enter Category Name");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#categoryId").focus();
        return false;
    }
    if(subcategoryid==""){//if category empty
        $("#ProductAlert").html("Please Enter Sub Category Name");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#SubCatId").focus();
        return false;
    }
    if($("input[type=checkbox]:checked").length < 1){
        $("#ProductAlert").html("At least One size must be selected");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#size").focus();
        return false;
    }
    if(imageid==""){//if category empty
        $("#ProductAlert").html("Please Upload image");
        $("#ProductAlert").addClass("alert alert-danger");
        $("#image").focus();
        return false;
    }
    });

});


