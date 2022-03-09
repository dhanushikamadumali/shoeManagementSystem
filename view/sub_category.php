<?php
include '../model/Category_Model.php';///include category model
include '../model/Sub_Category_Model.php';//include sub category model

$catObj = new Category();//create category object
$categoryResult = $catObj->getAllCategory();//get all category detail
$categoryResultTwo = $catObj->getAllCategory();//get all category detail
$SubCatObj = new subCategory();//create sub category object
$subcatResult = $SubCatObj->getAllsubCategory(); //get all sub category detail
?> 
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sub Category Edit</title>     
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
</head>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
        <div class="container">
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!--------////////title bar\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-------->
            <div class="row">
                <div class="col-md-12">
                <nav aria-label="Breadcrumb" style="height:49px;">
                    <ol class="breadcrumb">
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">SUB CATEGORY MANAGE</h4>
                    <li class="breadcrumb-item"><a href="product.php" style="color: #000;font-size:20px;text-decoration:none;">PRODUCT MANAGE</a></li>
                    </ol>
                </nav>
                </div>
            </div>
            <div class="row"><div class="col-md-12"></div></div>
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!--------//////////////title bar end\\\\\\\\\\\\\\\\\\-------->   
            <div class="row">&nbsp;</div>
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
            <div class="row">
                <div class="col-md-12">
                <?php
                if(isset($_REQUEST["msg"])||(isset($_REQUEST["error"]))){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php if(isset($_REQUEST["msg"])){?>
                        <div class="alert alert-success"><?php echo base64_decode($_REQUEST["msg"]);?></div>
                        <?php
                        }

                        else {
                            ?><div class="alert alert-danger"><?php echo base64_decode($_REQUEST["error"]);?></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <?php
                }
                ?>
                </div>
                </div>
        <!-------/////////view sub category table\\\\\\\\\\----->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr style="color: #fff"  class="bg-primary text-center" >
                        <th scope="col">SUB CATEGORY ID</th>
                        <th scope="col">COLECTION TYPE</th>
                        <th scope="col">CATEGORY NAME</th>
                        <th scope="col">SUB CATEGORY NAME</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($scatRow=$subcatResult->fetch_assoc()){?>  
                    <tr class="text-center">
                        <td><?php echo $scatRow["sub_category_id"]; ?></td>                        
                        <td><?php echo $scatRow["collection_name"];?></td>
                        <td><?php echo $scatRow["category_name"];?></td>
                        <td><?php  echo $scatRow["sub_category_name"];?></td>
                        <td> 
                        <button class="btn btn-primary" data-toggle="modal" data-target="#editsubcategory" onclick="load_data(<?php echo $scatRow["sub_category_id"]; ?>)">
                            <i class="far fa-edit"></i>
                        </button>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!----------/////view sub category end\\\\\\\\\\\\\\\\\\\\\--------->
        <!---------//////////edit sub category modal\\\\\\\\\\\\\\\\-------->
         <div class="modal fade" id="editsubcategory"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <form id="addsubcategory">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE SUB CATEGORY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">&nbsp;</div> 
            <div class="modal-body">
                <div class="row">
                <div class="col-md-12">
                    <div id="SubCategoryAlert"></div> 
                </div> 
                </div>
            <div id="subcategory_cont"></div>
            <div class="row">&nbsp;</div>        
            </div>  
            <div class="row">
            <div class="col-md-6">&nbsp;</div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-4">
            <button type="submit" name="submit" class="btn btn-outline-primary">Update</button>
            </div>
            </div>
            <div class="row">&nbsp;</div>
            </div>
            </form>
            </div>
        </div>
        <!---------/////////edit sub category modal en\\\\\\\\\\\\\\\\-------->  
        </div> 
        </div> 
       <!--////////////// Content End\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
    </div>
    <!------////////// Flud End\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
    </div>
</body>  
<!-- including js -->
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript"src="../js/popper.min.js"></script>  
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/datatable/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() { 
        $('#example').DataTable(); // display data table
    });
    //view edit sub category modal  
    function load_data(x){
        var url="../controller/SubCategoryController.php?status=edit_sub_category";
        $.post(url,{sub_category_id:x},function(data){
            $("#subcategory_cont").html(data).show();
        });
    }
    ///update sub category
    $("#addsubcategory").on('submit', function(e){
        e.preventDefault(e);// Prevent the default behaviour
        var catid = $('#Cat_id').val(); 
        var subcatid = $('#Sub_Category_name').val();

        if($("input[type=checkbox]:checked").length < 1){
            $("#SubCategoryAlert").html("At least One collection type must be selected").addClass("alert alert-danger");
            setTimeout(function() {$("#SubCategoryAlert").removeClass('alert').empty()}, 8000);
        }else if (catid==""){
            $("#SubCategoryAlert").html('Please Select Category').addClass("alert alert-danger");
            setTimeout(function() {$("#SubCategoryAlert").removeClass('alert').empty()}, 8000);
        }else if (subcatid==""){
            $("#SubCategoryAlert").html('Please Enter Sub Category').addClass("alert alert-danger");
            setTimeout(function() {$("#SubCategoryAlert").removeClass('alert').empty()}, 8000);  
        }
        else{
            swal({
            title: "Edit Sub Category?",
            text: "Are you sure, you want to edit sub category now !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "../controller/SubCategoryController.php?status=update_sub_category",
                    type:'POST', 
                    data: new FormData(this),
                    enctype: 'multipart/form-data',
                    cache:false,
                    processData:false,
                    contentType:false,
                    dataType:'json',
                    success: function(data){
                        console.log(data);
                        if(data[0]==1){
                            $("#SubCategoryAlert").html(data[1]).removeClass('alert alert-danger').addClass("alert alert-success");
                            setTimeout(function() {window.location.href="../view/sub_category.php?>";}, 5000);
                        }
                        if(data[0]==0){
                            $("#SubCategoryAlert").html(data[1]).addClass("alert alert-danger");
                            setTimeout(function() {$("#SubCategoryAlert").removeClass('alert').empty()}, 8000);
                        }
                    },
                    error:function(data){
                        console.error(data);
                    }

                });
            } 
            }); 
        }
    });  
</script>
</html>






