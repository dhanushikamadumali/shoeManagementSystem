<?php
include '../model/GRN_Model.php';///include user report model
$grnObj = new add_grn();///create user report object

$grnId = $_REQUEST['grn_id'];////request grn id
$grnId = base64_decode($grnId);///supplier id decode
$grnResult = $grnObj->getgrn($grnId);///get grn details by grn id
$row1=$grnResult->fetch_assoc();////make a result as an array value
$stockResult = $grnObj->getGrnRowMaterialOrderDetails($grnId);///get stock result by grn id
$row2=$stockResult->fetch_assoc();////make a result as an array value
$totalAmount = $grnObj->gettotalAmount($grnId);///get total amount by grn id
$AmountRow=$totalAmount->fetch_assoc();///make a result as an array
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Pay Bill</title>
    <link  rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link  rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
    <link  rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">    
</head>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------///////////header\\\\\\\\\------------>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Breadcrumb" style="height:49px;">
                    <ol class="breadcrumb">
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">PAY BILL</h4>
                    <li class="breadcrumb-item"><a href="payment.php" style="color: #000;font-size:20px;text-decoration:none;">PAYMENT MANAGE</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
        <!--------///////user view table\\\\\\\\\\\-------->
        <div class="row">
            <div class="col-md-12">
         <!-------//////////add payment //////////------> 
        <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div id="paybillAlert"></div></div>
        </div>
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <div class="row">&nbsp; </div>
                    <form id="myform">
                        <div class="card"> 
                        <div class="card-body"  style="height:60vh;">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <input type="hidden" class="form-control" name="grnid" readonly="readonly" value="<?php echo $grnId ?>">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label style="text-align: right;">GRN NO :</label></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <input type="text" class="form-control" name="grnno" readonly="readonly" value="<?php echo $row1["grn_no"] ?>">
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label style="text-align: right;">SUPPLIER :</label></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <input type="text" class="form-control" name="sname" readonly="readonly" value="<?php echo $row1["supplier_fname"] ?> <?php echo $row1["supplier_lname"] ?>">
                                        </div>
                                    </div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label style="text-align: right;">TOTAL PRICE :</label></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><input type="text" class="form-control" name="tamount" id="tamount" readonly="readonly" value="<?php echo $AmountRow["Amount"] ?>"></div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label style="text-align: right;">PAY AMOUNT :</label></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><input type="text" name="pay" id="pay" class="form-control" value=""></div>
                                    </div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label style="text-align: right;">PAYMNET TYPE :</label></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <select class="form-control" id="type" name="type" > 
                                            <option value="">SELECT TYPE....</option>
                                            <option value="Cash">CASH</option>
                                            <option value="Card">CARD</option>
                                        </select> 
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><label style="text-align: right;">COMMENT :</label></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><textarea class="form-control" rows="3" id="comment" name="text"></textarea></div>
                                    </div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">&nbsp;</div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <button type="button" id="submit" class="btn btn-primary">PAID</button>
                                        </div>   
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </form>
                    </div>   
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
                    </div> 
                 </div>   
             </div>
         </div>
         <!-------///////////add payment end///////////------>
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
<script type="text/javascript" src="../js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/datatable/dataTables.bootstrap4.min.js"></script>
<script>
     
    $('#submit').on('click',function(){// submit payment bill 
            
        var payamount = $('#pay').val();
        var type = $('#type').val();

        if (payamount==""){
        $("#paybillAlert").html('Please Enter Payamount').addClass("alert alert-danger");
        setTimeout(function() {$("#paybillAlert").removeClass('alert').empty()}, 8000);
        }else if (type==""){
        $("#paybillAlert").html('Please Enter Payment Type').addClass("alert alert-danger");
        setTimeout(function() {$("#paybillAlertt").removeClass('alert').empty()}, 8000);  
        }else{
            $.ajax({
            url: "../controller/PaymentController.php?status=add_payment",
            type:'POST',
            data:$('#myform').serialize(),
            success: function(res){
                if(res != "error"){
                $("#paybillAlert").html('Payment Successfully!!').removeClass('alert alert-danger').addClass("alert alert-success");
                setTimeout(function() { window.location.href="get_paybill.php?payId="+res;}, 5000); 
                } 
            },
            error:function(data){
                console.error(data);
            }
            });
        }

    });  
</script>
</html>


