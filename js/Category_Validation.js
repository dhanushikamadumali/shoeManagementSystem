$(document).ready(function(){//when the document is loaded

    $("#addcollection").submit(function(){//////when the submit the form add new colection
        var CollName = $("#Collection_name").val(); // get the collection name

        if(CollName==""){//if collection name empty
            $("#CollectionAlert").html("Please Enter Collection Name");
            $("#CollectionAlert").addClass("alert alert-danger");
            $("#Collection_name").focus();
            return false;
        }
    });

    $("#addcategory").submit(function(){/////when the submit the form add category
        var CateName = $("#Category_name").val();  // get the category name
        var  selectCount = 0;
        
        $(".chkbx").each(function (index){
            if ($(this).is(":checked")){
                selectCount++;
            }
        });
        if (selectCount == 0){
            $("#CategoryAlert").html("At least one collection must be selected!!!");
            $("#CategoryAlert").addClass("alert alert-danger");
            $("#type").focus();
            return false;
        }
        if(CateName==""){//if category name empty
            $("#CategoryAlert").html("Please Enter Category Name");
            $("#CategoryAlert").addClass("alert alert-danger");
            $("#Category_name").focus();
            return false;
        }
       
    });

    $("#addsubcategory").submit(function(){/// ///when the submit the form add sub category
        var SubCatName = $("#Sub_Category_name").val();// get the sub category name
        var CatName = $("#Cat_id").val();///get category id
        var  selectCount = 0;
        
        $(".chkbx").each(function (index){
            if ($(this).is(":checked")){
                selectCount++;
            }
        });
        if (selectCount == 0){
            $("#SubCategoryAlert").html("At least one collection must be selected!!!");
            $("#SubCategoryAlert").addClass("alert alert-danger");
            $("#type").focus();
            return false;
        }        
        if(CatName==""){//if category name empty
            $("#SubCategoryAlert").html("Please Select Category Name");
            $("#SubCategoryAlert").addClass("alert alert-danger");
            $("#Cat_id").focus();
            return false;
        }
        if(SubCatName==""){//if sub category name empty
            $("#SubCategoryAlert").html("Please Enter Sub Category Name");
            $("#SubCategoryAlert").addClass("alert alert-danger");
            $("#Sub_Category_name").focus();
            return false;
        }
       
        
    });

});



