<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deliver Report</title>
    <link  rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link  rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
    <link  rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
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
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">DELIVERY REPORT</h4>
                <li class="breadcrumb-item"><a href="report.php" style="color: #000;font-size:20px;text-decoration:none;">REPORT MANAGE</a></li>
                </ol>
            </nav>
        </div>
        </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
        <!--------///////user view table\\\\\\\\\\\-------->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(isset($_GET["msg"])){
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <?php
                                $msg = $_REQUEST["msg"];
                                $msg = base64_decode($msg);
                                echo $msg;
                                ?>    
                            </div>
                        </div>
                        <?php
                        }
                        ?>    
                    </div>
                </div>
                <!-- <div class="row"><div class="col-md-12">&nbsp;</div></div> -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- INCOME -->
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <select name="selecttime" id="selecttime" class="form-control">
                                    <option  value="">SELECT DAY....</option>
                                    <option value="1">LAST 7 DAY DELIVERY</option>
                                    <option value="2">CUSTOME</option>
                                    <option value="3">LAST 2 MONTH DELIVERY</option>
                                    <option value="4">CURRENT YEAR DELIVERY</option>
                                    <option value="5">TODAY DELIVERY</option>
                                </select>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                <div id="report"></div>
                                </div> 
                                
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <div id="#select1"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div id="select"></div>
                            </div>
                        </div>
                    </div> 
                    <!-- INCOME END -->
                    </div> 
                    </div>
                </div>
                <div class="row"><div class="col-md-12">&nbsp;</div></div> 
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
<script type="text/javascript" src="../js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/datatable/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $("#selecttime").change(function(){
        var se = +$('#selecttime').val(); 
        $.ajax({
            url: "../controller/DeliveryReportController.php?status=getreporttable",
            type:'POST',
            data:{se:se},
            success: function(res){
                console.log(res);
                $('#select').html(res);
            },
        }); 
        $.ajax({
            url: "../controller/DeliveryReportController.php?status=getreport",
            type:'POST',
            data:{se:se},
            success: function(res){
                console.log(res);
                $('#report').html(res);    
            }
        });       
        
    });
</script>
</html>


