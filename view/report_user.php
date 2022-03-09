<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Report</title>
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
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">USER REPORT</h4>
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
                <!-- <div class="row"><div class="col-md-12">&nbsp;</div></div> -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- INCOME -->
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button id="active" name="active" class="btn btn-primary">ACTIVE USER REPORT</button>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button id="dactive" name="dactive" class="btn btn-primary">DEACTIVE USER REPORT</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><div id="report"></div></div>
                    </div>
                    <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div id="select"></div></div>
                    </div>
                    <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div id="user"></div></div>
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
    $("#active").on('click',function(){///load report active button click
        $.ajax({
            url: "../controller/UserReportController.php?status=getreporttable",
            type:'POST',
            success: function(res){
                console.log(res);
                $('#select').html(res);
            },
        }); 
        $.ajax({
            url: "../controller/UserReportController.php?status=getreport",
            type:'POST',
            success: function(res){
                console.log(res);
                $('#report').html(res);    
            }
        });       
        
    });
    $("#dactive").on('click',function(){//load deactive user report deactive button click
        $.ajax({
            url: "../controller/UserReportController.php?status=getdactivereporttable",
            type:'POST',
            success: function(res){
                console.log(res);
                $('#select').html(res);
            },
        }); 
        $.ajax({
            url: "../controller/UserReportController.php?status=getdactivereport",
            type:'POST',
            success: function(res){
                console.log(res);
                $('#report').html(res);    
            }
        });       
        
    });
</script>
</html>


