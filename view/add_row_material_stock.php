<?php
include '../model/Supplier_Model.php';///include supplier model
include '../model/Row_Material_Model.php';///include row material model
include '../model/GRN_Model.php';///include grn model

$grnObj= new add_grn();
$SupplierObj = new supplier();///create supplier object
$RowMaterialObj = new row_material();///create row material object
$SupplierResult = $SupplierObj->getAllSupplier();//get all supplier
$RowMaterialResult = $RowMaterialObj->getAllRowMaterial();//get all row material
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add row material stock</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
</head>
<style>
.view:focus {
    outline-style: none;
}
</style>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <!---------///////////header\\\\\\\\\------------>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row">&nbsp;</div>
        <div class="row">
        <div class="col-md-12">
            <nav aria-label="Breadcrumb" style="height:49px;">
                <ol class="breadcrumb">
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">ADD TO ROW MATERIAL STOCK</h4>
                <li class="breadcrumb-item"><a href="view_r_material_stock.php" style="color: #000;font-size:20px;text-decoration:none;">VIEW STOCK</a></li>
                </ol>
            </nav>
        </div>
        </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
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
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-------- ROW MATERIAL DETAILS ---------->
                    <div class="row">&nbsp;</div>
                    <form id="addPoOrder" method='post' action="../controller/RMStockController.php?status=savestock" enctype="multipart/form-data">
                    <div class="col-md-12" >
                        <div id="RMAlert"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row"> 
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label class="control-lable" style="text-align: right;">SUPPLIER NAME :</label></div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <select id="supp_Id" name="supp_Id" class="form-control">
                                    <option value="">Select Here..</option>
                                    <?php while ($sRow = $SupplierResult->fetch_assoc()){ ?>
                                    <option value="<?php echo $sRow['supplier_id']; ?>"><?php echo $sRow['supplier_fname'];?> <?php echo $sRow['supplier_lname']; ?></option>
                                    <?php }?>
                                </select>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label class="control-lable" style="text-align: right;">ROW MATERIAL :</label></div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <select id="rMaterial_Id" name="rMaterial_Id" class="form-control">
                                    <option value="">Select Here ...</option>
                                    <?php while ($rmRow = $RowMaterialResult->fetch_assoc()){ ?>
                                    <option value="<?php echo $rmRow['r_material_id']; ?>"><?php echo $rmRow['r_material_name'];?></option>
                                    <?php }?>
                                </select>
                                </div>        
                            </div>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label class="control-lable" style="text-align: right">UNIT :</label></div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" id="unit1"><input type="text" id="Unit" name="Unit" class="form-control text-center" readonly ></div> 
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label class="control-lable" style="text-align: right">PRICE :</label></div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><div class="input-group-text" id="btnGroupAddon">RS</div></div>
                                <input type="text" id="r_material_price" name="r_material_price" class="form-control text-center" aria-describedby="btnGroupAddon" value="" onkeypress="return isNumberKey(event)" >
                            </div> 
                            </div>
                        </div>
                        <div class="row">&nbsp;</div>
                        <div class="row">&nbsp;</div>
                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label class="control-lable" style="text-align: right" >QUANTITY :</label></div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <input  type="text" name="Qty" id="Qty" class="form-control text-center" onkeypress="return isNumberKey(event)" >
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label class="control-lable" style="text-align: right"  >SUB TOTAL :</label></div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><div class="input-group-text" id="btnGroupAddon">RS</div></div>
                                <input type="text" name="subto" id="subto" class="form-control text-center" aria-describedby="btnGroupAddon" readonly value="" >
                            </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><a class="btn btn-primary" id="add" style="color:aliceblue">&nbsp;ADD</a></div> 
                            </div>
                        </div>
                            </div>
                        </div> 
                <!-- ROW MATERIAL DETAILS END -->
                <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><hr></div></div>
                <!-- store row material details -->   
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="addorderstockdeatails">
                    <table class="table table-responsive-* " id="rowmaterial1">
                        <thead style="background:#80ccff;">
                        <tr>
                        <th scope="col" class="text-center text-uppercase w-40" >material</th>
                        <th scope="col" class="text-center text-uppercase  W-20">unit</th></th>
                        <th scope="col" class="text-right text-uppercase">price</th>
                        <th scope="col" class="text-right text-uppercase ">quantity</th>
                        <th scope="col" class="text-right text-uppercase ">sub total</th>
                        <th scope="col" class="text-right text-uppercase ">action</th>
                        </tr>
                        </thead>
                        <tbody id="rowmaterial"></tbody>
                    </table>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><button type="submit" class="btn btn-success">ADD TO STOCK </button></div>
                </div>
                </form>
            </div>
        </div> 
        </div> 
       <!------///////// Content End\\\\\\\\------>
    </div>
    <!---------/////////// Flud End\\\\\\\\\\------>
    </div>
    </div> 
</body>
<!-- including js --> 
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../js/popper.min.js"></script>   
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<script type="text/javascript" src="../js/RMstock_validation.js"></script>
<script type="text/javascript">
    //only type number
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }
    //get unit by row material id
    $('#rMaterial_Id').change( function(){  
        var url = "../controller/RMStockController.php?status=getRMdetails";        
        var RMId = $('#rMaterial_Id').val();
        $.post(url,{RMId:RMId}, function(data){
            $('#unit1').html(data).show();
        });
    }); 
    ///add table
    var tableRowCount=0;
    $("#add").click(function (){
        tableRowCount++;
        var supp_id = $('#supp_Id').val();
        var qtn = $('#Qty').val();
        var price = $('#r_material_price').val();
        var rmaterial = $('#rMaterial_Id').val();
        var rmaterialname = $('#rMaterial_Id option:selected').text();
        var unit = $('#unit').val();
        var subtotal = $('#subto').val();

        if (supp_id==""){
         $("#RMAlert").html('Please Select Supplier').addClass("alert alert-danger");
         setTimeout(function () {$("#RMAlert").removeClass('alert').empty()}, 8000);
        }else if (rmaterial==""){
         $("#RMAlert").html('Please Select Row Material').addClass("alert alert-danger");
         setTimeout(function () {$("#RMAlert").removeClass('alert').empty()}, 8000);
        }else if (price==""){
         $("#RMAlert").html('Please Enter Price').addClass("alert alert-danger");
         setTimeout(function () {$("#RMAlert").removeClass('alert').empty()}, 8000);
        }else if (qtn==""){
         $("#RMAlert").html('Please Enter Quantity').addClass("alert alert-danger");
         setTimeout(function () {$("#RMAlert").removeClass('alert').empty()}, 8000);
        }
        var Row  = "<tr>";
        Row += "<td><input class='form-control-plaintext a  text-center view' type='text' style='background: #fff;'  name='rowmaterialname[]' value='"+rmaterialname+"' readonly='readonly'><input type=hidden value='"+rmaterial+"' name='rowmaterialid[]'></td>";
        Row += "<td><input class='form-control-plaintext a  text-left view' type='text' style='margin-left:20px;background: #fff;' name='unit[]' value='"+unit+"' readonly='readonly'></td>";
        Row += "<td><input class='form-control-plaintext a  text-left view' type='text' style='font:center;background: #fff;'  name='price[]' value='"+price+"'></td>";
        Row += "<td><input class='form-control-plaintext a  text-left view' type='text' style='font:center;background: #fff;' name='qty[]' value='"+qtn+"'></td>";
        Row += "<td><input class='form-control-plaintext a  text-left view' type='text' style='font:center;background: #fff;' name='subtotal[]' value='"+subtotal+"'></td>";   
        Row += "<td><a href='javascript:void(0)'><i class='far fa-trash-alt text-danger delete' onclick='remove("+rmaterial+"_"+tableRowCount+")' aria-hidden='true'></i></a></td>"                  
        Row += "</tr>";
        $('#rowmaterial').append(Row); 
    });
    //get sub total
    $("#r_material_price, #Qty").keyup(function(){
    var Qty = parseFloat($('#Qty').val());
    var price = parseFloat($('#r_material_price').val());
    if(price!="" && Qty!=""){
        subtotal = price * Qty;
       $('#subto').val(subtotal.toFixed(2));
    }
    else{
        $('#subto').val("");
    } 
    });
    //delete row in table
    // $('#rowmaterial').on("click",".delete", function(){ 
    //     $(this).parent().closest("tr").remove();
    // });
    $('#rowmaterial').on('click',".delete", function(){///active user 
        swal({
            title: "Delete Row Material?",
            text: "Are you sure you want to delete row material now !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $(this).parent().closest("tr").remove();
            } 
            });       
    });
</script>
</html>
