<html>
<head>  
<?php
include '../model/MCategory_Model.php';/////include m category model
include '../model/MCollection_Model.php';//include m collection model

$colleObj = new collection();//create collection object
$catObj = new Category();//create category object
$categoryResult = $catObj->getmAllCategory();//get all m category
$categoryResultTwo = $catObj->getmAllCategory();///get all m category

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Row Material Category Edit</title>     
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
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">MATERIAL CATEGORY MANAGE</h4>
                    <li class="breadcrumb-item"><a href="row_material.php" style="color: #000;font-size:20px;text-decoration:none;">ROW MATERIAL MANAGE</a></li>
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
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-10">
                <table class="table table-bordered" id="example"> 
                <thead >
                    <tr style="color: #fff"  class="bg-primary text-center" >
                    <th>M CATEGORY ID</th>
                    <th >M CATEGORY NAME</th>
                    <th >ACTION</th>
                  </tr>
                </thead>
                <?php while ($catRow=$categoryResult->fetch_assoc()){?>  
                <tbody>
                  <tr class="text-center">
                    <th><?php echo $catRow["r_m_category_id"]; ?></th>
                    <td><?php echo $catRow["r_m_category_name"];?></td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#editcategory" onclick="load_data(<?php echo $catRow["r_m_category_id"]; ?>)">
                            <i class="far fa-edit"></i>
                        </button>
                    </td>
                  </tr>
                </tbody>
                <?php
                }
                ?>
                </table>
                      
                 </div>
            <div class="col-md-1">&nbsp;</div>
            </div>
        <!-------/////view end category table\\\\\\\\\\\\\\--------------->
        <!-------///////edit category modal\\\\\\------------------------->
        <div class="modal fade" id="editcategory"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="addcategory">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">UPDATE MATERIAL CATEGORY</h5>
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
<script type="text/javascript" src="../js/Category_Validation.js"></script>
<script>
    $(document).ready(function() {
        ///display data table
        $('#example').DataTable();
    });
    ///load edit m category detail
    function load_data(x){
        var url="../controller/MCategoryController.php?status=edit_m_category";
        $.post(url,{category_id:x},function(data){
            $("#category_cont").html(data).show();
        });
    }
    //update material category
    $("#addcategory").on('submit', function(e){
    e.preventDefault(e);// Prevent the default behaviour
    var catname = $('#Category_name').val();
   
    if (catname==""){
        $("#CategoryAlert").html('Please Select Material Category').addClass("alert alert-danger");
        setTimeout(function() {$("#CategoryAlert").removeClass('alert').empty()}, 8000);
    }else if($("input[type=checkbox]:checked").length < 1){
        $("#CategoryAlert").html("At least One type must be selected").addClass("alert alert-danger");
        setTimeout(function() {$("#CategoryAlert").removeClass('alert').empty()}, 8000);
    }
    else{
        swal({
        title: "Edit Material Category?",
        text: "Are you sure, you want to edit material category now !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "../controller/MCategoryController.php?status=update_m_category",
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
                        setTimeout(function() {window.location.href="../view/m_category.php?>";}, 5000);
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





