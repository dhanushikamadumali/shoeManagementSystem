<?php
include '../model/Category_Model.php';/////include category model
include '../model/Sub_Category_Model.php';//include sub category model
include '../model/Collection_Model.php';//include collection model

$colleObj = new collection();//create collection object
$catObj = new Category();//create category object
$categoryResult = $catObj->getAllCategory();//get all category
$categoryResultTwo = $catObj->getAllCategory();///get all category
include '../model/Product_Model.php';///////include product model

$ProductObj = new product();////////create product object
$ProductResult = $ProductObj->getAllProduct();//////////get all product
?>
<html>
<head>  
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Category Edit</title>     
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
        <!----//////title bar\\\\\\\\\\\\\\\\\\\\\\\-------->
            <div class="row">
                <div class="col-md-12">
                <nav aria-label="Breadcrumb" style="height:49px;">
                    <ol class="breadcrumb">
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">CATEGORY MANAGE</h4>
                    <li class="breadcrumb-item"><a href="product.php" style="color: #000;font-size:20px;text-decoration:none;">PRODUCT MANAGE</a></li>
                    </ol>
                </nav>
                </div>
            </div>
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!--------///////title bar end\\\\\\\\\\\\\\-------->   
            <div class="row">&nbsp;</div>         
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
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
        <!-------////////view category table\\\\\\\\\\\\\----->
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr style="color: #fff"  class="bg-primary text-center" >
                        <th scope="col">CATEGORY_ID</th>
                        <th scope="col">CATEGORY_NAME</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($catRow=$categoryResult->fetch_assoc()){$ctId = $catRow["category_id"];$ctId = base64_encode($ctId)?>  
                    <tr class="text-center">
                    <td><?php echo $catRow["category_id"]; ?></td>
                    <td><?php echo $catRow["category_name"];?></td>                
                    <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editcategory" onclick="load_data(<?php echo $catRow["category_id"]; ?>)">
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
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
        </div>
        <!-------/////view end category table\\\\\\\\\\\\\\--------------->
        <!-------///////edit category modal\\\\\\------------------------->
        <div class="modal fade" id="editcategory"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <form id="addcategory">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">UPDATE CATEGORY</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="row">&nbsp;</div> 
            <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div id="CategoryAlert"></div> 
                </div> 
                </div>
                <div id="category_cont"></div>
            <div class="row">&nbsp;</div> 
            <div class="row">
            <div class="col-md-6">&nbsp;</div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-4">
            <button type="submit" name="submit" class="btn btn-outline-primary">Update</button>
            </div>
            </div>       
            </div>  
            </div>
            </form>
            </div>
        </div>
        <!----------///edit category modal end\\\\\\\\\\\\\\--------------->
        </div>
        </div>
        </div> 
       <!--/////////// Content End\\\\\\\\\\\\\\\\\\\\\\\\\--------------->
</div>
<!----/////////////////// Flud End\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
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
    function load_data(x){///load edit category deatail
        var url="../controller/CategoryController.php?status=edit_category";
        $.post(url,{category_id:x},function(data){
            $("#category_cont").html(data).show();
        });
    }
    //update category
    $("#addcategory").on('submit', function(e){
    e.preventDefault(e);// Prevent the default behaviour
    var catname = $('#Category_name').val();
    if (catname==""){
    $("#CategoryAlert").html('Please Select Category').addClass("alert alert-danger");
    setTimeout(function() {$("#CategoryAlert").removeClass('alert').empty()}, 8000);
    }else if($("input[type=checkbox]:checked").length < 1){
    $("#CategoryAlert").html("At least One type must be selected").addClass("alert alert-danger");
    setTimeout(function() {$("#CategoryAlert").removeClass('alert').empty()}, 8000);
    }
    else{
        swal({
        title: "Edit Category?",
        text: "Are you sure, you want to edit category now !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "../controller/CategoryController.php?status=update_category",
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
                        $("#CategoryAlert").html(data[1]).removeClass('alert alert-danger').addClass("alert alert-success");
                        setTimeout(function() {window.location.href="../view/category.php?>";}, 5000);
                    }
                    if(data[0]==0){
                        $("#CategoryAlert").html(data[1]).addClass("alert alert-danger");
                        setTimeout(function() {$("#CategoryAlert").removeClass('alert').empty()}, 8000);
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





