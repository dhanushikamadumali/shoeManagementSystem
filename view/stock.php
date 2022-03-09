<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Product</title>    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
</head>
<style>
.product_image{
    border-radius: 4px;
    padding: 5px;
    width: 500px;
    border: 2px solid #000;
    height: 150px;
    border-color: #660044;
}
#topic{
    text-shadow:2px 2px 5px #cc6699;
    color:#660044;
    text-align: center;
    font-size: 30px;
}
</style>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------///////////header\\\\\\\\\------------>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="Breadcrumb" class="breadcrumb" style="height:49px;">
                    <h4>STOCK MANAGEMENT</h4>
                    </nav>
                </div>
            </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>  
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row">
            <div class="col-md-6">
                <div class="product_image">
                    <div class="row">&nbsp;</div>
                    <h5 id="topic">PRODUCT STOCK</h5>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">&nbsp;</div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="view_stock.php" class="btn btn" style="background-color:#cc6699;color:#fff"><i class="far fa-edit"></i>&nbsp;View</a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">&nbsp;</div>   
                    </div>
                    <div class="row">&nbsp;</div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="product_image">
                    <div class="row">&nbsp;</div>
                    <h5 id="topic">ROW MATERIAL STOCK</h5>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">&nbsp;</div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="view_r_material_stock.php" class="btn btn" style="background-color:#cc6699;color:#fff"><i class="far fa-edit"></i>&nbsp;View</a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">&nbsp;</div>  
                    </div>
                    <div class="row">&nbsp;</div>
                </div> 
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        </div>
        </div>
        <!-------///////////////add product model end \\\\\\\\\\\\\\---------->
        </div> 
        </div> 
       <!--------//////////////////// Content End\\\\\\\\\\\\\\\\\\------>
    </div>
    <!-----------/////////////////// Flud End\\\\\\\\\\\\\\\\\\\\------>
    </div>
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../js/popper.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</html>



