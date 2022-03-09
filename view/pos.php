<?php 
include '../commons/session.php'; ////include session
include '../model/Category_Model.php';///include category model
include '../model/Pos_Model.php';//////include pos model
include '../model/Invoice_Model.php';

$CatObj = new Category();////create cat object
$CatResult = $CatObj->getAllCategory();/////get cat result
$posObj = new pos();////create pos object
$productResult = $posObj->getAllProduct();//////get product result
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H.K.ENTERPRISES / POS </title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
</head>
<style>
    .productName{
        font-weight: bold;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 14px;
        max-height: 14px;
    }
    .input:focus{
        outline: none;
    }
</style>
<body>
    <div class="container-fluid">
        <form id="myform" method="post">
        <!-- top row -->
        <div class="row p-2">
            <!-- data togglr -->
            <?php if($_SESSION["user"]["role_id"] == 1){ ?>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <a href="dashboard.php" class="btn btn-warning text-light" data-toggle="tooltip" title="dashboard"><i class="fas fa-tachometer-alt"></i></a>
            </div>
            <?php
            }
            ?>
            <!-- datatoglr end -->
            <!-- date -->
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 " id="datetime" style="font-size:20px;"></div>
            <!-- date end -->
            <!-- customer search -->
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <input class="form-control" list="browsers" placeholder="Customer search...." value="Working customer" id="customerId" name="customerId"> 
                <!-- <datalist id="browsers">
                    <option  value="Working Customer">
                    <option  value="Walk-In customer">
                </datalist>  -->
            </div>
            <!-- customer search end -->
            <!-- add customer -->
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <!-- <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> ADD</a> -->
            </div>
            <!-- add customer end -->
            <!-- search category  -->
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <select name="catId" id="catId" class="form-control">
                    <option  value="">select category...</option>
                    <?php while($catrow=$CatResult->fetch_assoc()){?>
                    <option value="<?php echo $catrow['category_id'];?>"><?php echo $catrow['category_name']?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- search category end -->
            <!-- search sub category -->
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <select name="subCatId" id="subCatId" class="form-control">
                    <option  value="">select sub category...</option>
                </select>
            </div>
            <!-- search sub category end -->
        </div>
        <!-- top row end -->
        <!-- content -->
        <div class="row">            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 p-0">
                <div class="card">
                    <!-- view product detail -->
                    <div class="card-header pt-0 pb-0">
                    <table class="table table-responsive-* mb-0">
                        <thead style="background: #e066ff;">
                        <tr>
                            <th>Product name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                            <th>Action</th>
                            <th>Size</th>
                        </tr>
                        </thead>
                    </table>
                    </div>
                    <div class="card-body"  style="height:65vh; position:inherit; overflow-y:scroll">
                    <table class="table table-responsive-*">
                        <tbody id="productCart">
                        </tbody>
                    </table>
                    </div>
                    <!-- view table end -->
                    <!-- payment table -->
                    <div class="card-footer pb-0 pt-0">
                        <table class="table table-light mb-0">
                            <tfoot>
                                <tr style="background:#e066ff">
                                <th >&nbsp;</th>
                                <th >&nbsp;</th>
                                <th >&nbsp;</th>
                                <th >&nbsp;</th>
                                <th >&nbsp;</th>
                                <th >&nbsp;</th>
                                <th >Total:</th>
                                <th ><input style="color:#000;font-weight: bold" class="form-control" type="text" name="Total" id="Total" value="0.00" readonly="readonly"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer pb-0 pt-0">
                        <table class="table table-light mb-0">
                            <tfoot>
                                <tr>
                                <th> Discount:<input class="form-control" type="text" name="discount" id="discount" value="00" min="0" maxlength="3"></th>
                                <th> All Total:<input class="form-control" type="text" name="alltotal" id="alltotal" value="0.00" readonly="readonly"></thAll>
                                <th><a href="" class="btn btn-primary" data-toggle="modal" data-target="#cash">cash</a></th>
                                <th><a href="" class="btn btn-info" data-toggle="modal" data-target="#card">card</a></th> 
                                <th><a href="payment.php" class="btn btn-info">submit</a></th> 
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- payment table end -->
                </div>
            </div>    
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 p-0">
            <div class="card">
                <!-- product image view -->
                    <div class="card-body" style="height:92vh; position:inherit; overflow-y:scroll">                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                            <div id="productContent">
                                <div class="row">
                                    <?php
                                    $Count=0;
                                    while($row=$productResult->fetch_assoc()){
                                        $productId=$row['product_id'];
                                        $productImg =$posObj->getAllImg1($productId);
                                        $imgRow=$productImg->fetch_assoc();
                                        $Count++; 
                                    ?>                            
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <a type="button" class="text-decoration-none text-muted product" onclick="product(<?php echo $row['product_id'];?>,<?php echo $row['size_id'] ?>,)" id="<?php echo $row["product_id"];?>">
                                            <div>
                                                <div class="card shadow" >
                                                    <img class="card-img-top" src="../image/product_image/<?php echo $imgRow['product_img_name'];?>" alt="" style="height:100px; width:60%; margin-left:28px">
                                                    <div class="card-body">
                                                        <small class="productName"><?php echo $row['product_name'];?>&nbsp;</small><br>
                                                        <small class="productName">size: &nbsp;<?php echo $row['size'] ?></small>
                                                        <!-- <input type="hidden" id="size" name="size[]" value="<?php echo $row['size_id'] ?>">  -->
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php if ($Count%4==0) {?>                            
                                </div>
                                <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
                                <div class="row"> 
                                    <?php } } ?>                   
                                </div>
                            </div>                            
                        </div>                                            
                    </div>
                    <!-- product image view end -->
                </div>
            </div>             
        </div>
        <!-- content end -->
         <!-- card modal -->
         <div class="modal fade" id="cash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">CASH PAYMENT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <!-- <div class="col-md-12">
                            <div id="Alert"></div>
                        </div>   -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label >Pay Amount :</label>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="addon-wrapping">RS.</span>
                                        </div>
                                        <input type="text" class="form-control" id="payamount" name="payamount" readonly="readonly">
                                    </div>  
                                    </div>
                                </div>
                                <div class="row">&nbsp;</div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label >Received Amount :</label>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="addon-wrapping">RS.</span>
                                        </div>
                                        <input type="text" class="form-control" id="Receiveamount" name="Receiveamount">
                                    </div>  
                                    </div>
                                </div>
                                <div class="row">&nbsp;</div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label >Balance :</label>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="addon-wrapping">RS.</span>
                                        </div>
                                        <input type="text" class="form-control" id="Balanceamount" name="Balanceamount" readonly>
                                    </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="submit"><i class="fas fa-print"></i>&nbsp;Print</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- cash modal end -->
            <!-- card modal -->
            <div class="modal fade" id="card" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">CARD PAYMENT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div id="Alert"></div>
                        </div>           
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label >Card Number :</label>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <input type="text" class="form-control" id="cardNo" name="catdNo" > 
                                    </div>
                                </div>
                                <div class="row">&nbsp;</div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label >Card Holder Name :</label>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <input type="text" class="form-control" id="cardHName" name="cardHName">
                                    </div>
                                </div>
                                <div class="row">&nbsp;</div>
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label >Month :</label>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <input type="text" class="form-control" id="month" name="month" >
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label >Year :</label>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <input type="text" class="form-control" id="year" name="year" >
                                    </div>
                                </div>
                                <div class="row">&nbsp;</div>
                                
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>Security Code :</label>  
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" id="seccode" name="seccode" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"  id="submit1"><i class="fas fa-print"></i>&nbsp;Print</button>
                    </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>
<!-- including js -->
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../js/popper.min.js"></script>   
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<script type="text/javascript" src="../js/pos_validation.js"></script>
<script>
    $(document).ready(function(){
        // dispaly date
        $('#datetime').html( new Date().toDateString());
        // dispaly data togal
        $('[data-toggle="tooltip"]').tooltip();
        // get subcategory by category id
        $("#catId").change(function(){
            // alert(x);
            var url = '../controller/PosController.php?status=getSubCategory';
            var x = $('#catId').val();            
            $.post(url,{catId:x}, function(data){
                $('#subCatId').html(data).show();
            });
        });
        // chosing category and sub category id
        $('#catId,#subCatId').change( function(){        
        var url = "../controller/PosController.php?status=getProduct";        
        var catId = $('#catId').val();
        var subCatId = $('#subCatId').val();
        $('#subCatId').val('');
            $.post(url,{catId:catId, subCatId:subCatId}, function(data){
                $('#productContent').html(data).show();
            });
        }); 
    });
        // view select product to details
        var tableRowCount=0;
        function product(e,a) {
            tableRowCount++;
            var url ="../controller/PosController.php?status=getproductDetails";
            var ProductId = e;
            var sizeId = a;
            var productTotal= +$('#Total').val();

            $.ajax({
                method:"POST",
                data:{ProductId:ProductId, sizeId:sizeId, tableRowCount:tableRowCount},
                url:url,
                dataType:"json",
                success:function(data){
                    // console.log(data);
                    var Row  = "<tr>";
                    Row +="<td><input class='form-control' type='text' id='productName' name='productname[]' value='"+data.product_name+"'></td>";
                    Row +="<td>"+
                    "<div class='input-group'><div class='input-group-prepend'>" +
                    "<button class='input-group-text plus a' type='button' onclick='pluse("+data.product_id+"_"+tableRowCount+")' value='"+data.product_id+"_"+tableRowCount+"'>"+
                    "<i class='fas fa-plus'></i>"+
                    "</button>"+
                    "</div>"+
                    "<div class='custom-file'>"+
                    "<input type='text' id='qty_"+data.product_id+""+tableRowCount+"' name='qty[]' value='1' class='form-control qty a'>"+
                    "</div>"+
                    "<div class='input-group-prepend'>"+
                    "<button type='button' class='input-group-text minus a' onclick='minus("+data.product_id+"_"+tableRowCount+")' Value='"+data.product_id+"_"+tableRowCount+"'>"+
                    "<i class='fas fa-minus'></i>"+
                    "</button>"+
                    "</div>"+
                    "</div>"+
                    "</td>";
                    Row += "<td><input class='form-control' type='text' id='price_"+data.product_id+""+tableRowCount+"' name='price[]' value='"+data.Mprice+"' readonly='readonly'></td>";
                    Row += "<td><input class='form-control subTotal a' type='text' id='subTotal_"+data.product_id+""+tableRowCount+"' name='subtotal[]' value='"+data.Mprice+"' readonly='readonly'></td>";
                    Row += "<td><a href='javascript:void(0)'><i class='far fa-trash-alt text-danger delete' aria-hidden='true'></i></a></td>"
                    Row +="<td><input class='form-control' type='hidden' id='productId' name='productId[]' value='"+data.product_id+"'></td>";
                    Row +="<td><input class='form-control' type='text' id='size_'  value='"+data.size+"'><td><input  type='hidden' id='size_' name='size[]' value='"+data.size_id+"'>";
                  
                    $('#productCart').append(Row);
                    var nproductTotal = productTotal + parseInt(data.Mprice);
                    $('#Total').val(nproductTotal.toFixed(2));
                    $('#alltotal').val(nproductTotal.toFixed(2));
                    $('#payamount').val(nproductTotal.toFixed(2));

                },
                error:function(data){
                    console.log(data);
                }
            });
        }
 
        // increase product quantity
        function pluse (y) { 
            // product quntity equal to x
            var x = +$('#qty_'+y).val();
            var productPrice = parseFloat($('#price_'+y).val());
            var productTotal = parseFloat($('#Total').val());
            x = x + 1;
            var SubTotal = x * productPrice;
            $('#qty_'+y).val(x);
            $('#subTotal_'+y).val(SubTotal.toFixed(2));
            productTotal = productPrice + productTotal;
            $('#Total').val(productTotal.toFixed(2));
            $('#alltotal').val(productTotal.toFixed(2));
            $('#payamount').val(productTotal.toFixed(2)); 
        }

        // decrease product quantity
        function minus (y) {
            var x = +$('#qty_'+y).val();
            var productPrice = parseFloat($('#price_'+y).val());
            var productTotal = parseFloat($('#Total').val());
            if(x>1){
            var newQunty = x-1;
            var newSubTotal = newQunty * productPrice;
            $('#qty_'+y).val(newQunty);
            $('#subTotal_'+y).val(newSubTotal.toFixed(2));
            productTotal = productTotal - productPrice;
            $('#Total').val(productTotal.toFixed(2));
            $('#alltotal').val(productTotal.toFixed(2));
            $('#payamount').val(productTotal.toFixed(2));
 
            }
        }

        // discount calculate
        $('#discount').keyup(function(){
            
            var discount = parseFloat($('#discount').val());
            var productTotal = parseFloat($('#Total').val());
            if(discount != null){
                var DisResult = (productTotal * discount)/100;
                DisResult= productTotal - DisResult;
                $('#alltotal').val(DisResult.toFixed(2));
                $('#payamount').val(DisResult.toFixed(2))
            }else{
                $('#discount').val(0);
                $('#alltotal').val(productTotal);
                $('#payamount').val(productTotal);
            }
        });
        /// shipping amount
        // $('#shipping').keyup(function (){
        // var shipping =  parseFloat($('#shipping').val());
        // var allTotal =  parseFloat($('#alltotal').val());
        // if (shipping != null){
        //     var shipResult =  shipping;
        //     // alert(shipResult);
        //     $('#alltotal').val(shipResult.toFixed(2))
        //     $('#payamount').val(shipResult.toFixed(2))
        // }else{
        //     $('#alltotal').val(productTotal);
        //     $('#payamount').val(productTotal);
        // }
        // });
        // cash received amount
        $('#Receiveamount').keyup(function(){
            var ReceiveAmount = parseFloat($('#Receiveamount').val());
            var payamount = parseFloat($('#payamount').val());
            if(ReceiveAmount >= payamount){
                var balance = ReceiveAmount - payamount;
                $('#Balanceamount').val(balance.toFixed(2));
            }else{
                $('#Balanceamount').val("");
            } 

        });

        // //delete product
        $('#productCart').on("click",".delete", function(){ 
            var subTotal = +$(this).parents().closest("tr").find(".subTotal").val();
            var productTotal = +$('#Total').val();
            
            swal({
                title: "Delete Product?",
                text: "Are you sure you want to delete product now !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) { 
                    $(this).parent().closest("tr").remove()
                } 
                productTotal = productTotal - subTotal;
                $('#Total').val(productTotal.toFixed(2));
                $('#alltotal').val(productTotal.toFixed(2));
                $('#payamount').val(productTotal.toFixed(2));
                });   
        });
        // submit card payment 
        $('#submit').on('click',function(){
            var x = $('#customerId').val();
            var productTotal = $('#Total').val();
            var Receiveamount = $('#Receiveamount').val();
            if (x==""){
                swal({
                    title:'pleace select customer name',
                    icon: 'warning'
                }) 
            }else if (productTotal==0){
                swal({
                    title: 'product item can\'t empty',
                    icon: 'warning'
                })
            }else if (Receiveamount=="") {
                swal({
                    title: 'Recive Amount can\'t empty',
                    icon: 'warning'
                })
            }else{
                    $.ajax({
                    url: "../controller/InvoiceController.php?status=addInvoice",
                    type:'POST',
                    data:$('#myform').serialize(),
                    success: function(res){
                            if(res != "error"){
                                swal("Payment Has Been Successfully!! ", "", "success");
                                setTimeout(function(){ window.location.href="invoice.php?invoiceId="+res;  }, 5000);
                            } 
                            // window.location.href="invoice.php?invoiceId="+res;
                            // console.log(res);
                    },
                    });
            }

        }); 
        $('#submit1').on('click',function(){
            var x = $('#customerId').val();
            var productTotal = $('#Total').val();
            var cardNo = $('#cardNo').val();
            var cardHName = $('#cardHName').val();
            var month = $('#month').val();
            var year =$('#year').val();
            var seccode = $('#seccode').val();
            if (x==""){
                swal({
                    title:'pleace select customer name',
                    icon: 'warning'
                }) 
            }else if (productTotal==0){
                swal({
                    title: 'product item can\'t empty',
                    icon: 'warning'
                })
            }else if (cardNo==0){
                swal({
                    title: 'Card number can\'t empty',
                    icon: 'warning'
                })
            }else if (cardHName==0){
                swal({
                    title: 'Card hold number can\'t empty',
                    icon: 'warning'
                })
            }else if (month==0){
                swal({
                    title: 'Expiration month can\'t empty',
                    icon: 'warning'
                })
            }else if (year==0){
                swal({
                    title: 'Expiration year can\'t empty',
                    icon: 'warning'
                })
            }else if (seccode==0){
                swal({
                    title: 'Card security code can\'t empty',
                    icon: 'warning'
                })
            }else{
                    $.ajax({
                    url: "../controller/InvoiceController.php?status=addInvoice",
                    type:'POST',
                    data:$('#myform').serialize(),
                    success: function(res){
                            // if(res != "error"){
                            //     swal("Payment Has Been Successfully!!", "", "success");
                            //     setTimeout(function(){window.location.reload();  }, 1500);
                            // } 
                            // window.location.href="invoice_card.php?invoiceId="+res;
                            // console.log(res);
                            if(res != "error"){
                                swal("Payment Has Been Successfully!! ", "", "success");
                                setTimeout(function(){ window.location.href="invoice_card.php?invoiceId="+res;  }, 5000);
                            } 
                    },
                    });
            }

        }); 
</script>
</html>