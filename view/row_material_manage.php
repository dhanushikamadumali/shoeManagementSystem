<?php
include '../model/Row_Material_Model.php';///////include row material model

$RowMaterialObj = new row_material();////////create row material object
$RowMaterialResult = $RowMaterialObj->getAllRowMaterial();//////////get all row material
?> 
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">     
    <title>View Row Material</title>
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
        <div class="row"><div class="col-md-12">&nbsp;</div></div>      
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
    <!--------///////////title bar\\\\\\\\\\\\\\\-------->
        <div class="row">
        <div class="col-md-12">
            <nav aria-label="Breadcrumb" style="height:49px;">
                <ol class="breadcrumb">
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">VIEW ROW MATERIAL</h4>
                <li class="breadcrumb-item"><a href="view_r_material_stock.php" style="color: #000;font-size:20px;text-decoration:none;">VIEW STOCK</a></li>
                </ol>
            </nav>
        </div>
        </div>
    <!--------////////title bar end\\\\\\\\\\\\\\\-------->   
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
    <!--//////////////////alert \\\\\\\\\\\\\\\\\\\\\\ -->
    
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
    <!-- ///////////////////alert end\\\\\\\\\\\\\\\\ -->
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-12"><span>&nbsp;</span></div>
        <!--/////////// view stock table \\\\\\\\\\\\\-->
        <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr style="color: #fff"  class="bg-primary text-center" >
                        <th scope="col">ROW MATERIAL ID</th>
                        <th scope="col">ROW MATERIAL IMAGE</th>
                        <th scope="col">ROW MATERIAL NAME</th>
                        <th scope="col">ROW MATERIAL CATEGORY</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($RRow=$RowMaterialResult->fetch_assoc()){$RowmaterialId = $RRow["r_material_id"];$RowmaterialId = base64_encode($RowmaterialId)?>  
                    <tr class="text-center">
                        <td><?php echo $RRow["r_material_id"]; ?></td>
                        <td><img src="../image/row_material_image/<?php echo $RRow["r_m_image_name"];?>" style="width:50px;height:50px;margin-left: 5px" /></td>
                        <td><?php echo $RRow["r_material_name"];?></td>
                        <td><?php echo $RRow["r_m_category_name"];?></td>
                        <td>
                        <a href="../view/edit_row_material.php?row_material_id=<?php echo $RowmaterialId;?>" class="btn btn-warning" style="color:#fff"  data-toggle="tooltip" title="edit"><i class="far fa-edit"></i>&nbsp;</a>        
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <!--/////////////////view end stock table\\\\\\\\\\\\\\\\  -->
        </div> 
    </div>
    </div> 
    <!--////////////////// Content End\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
    </div>
    <!----///////////// Flud End\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
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
        $(document).ready(function() {
            // display data table
            $('#example').DataTable();
             // dispaly data togal
        $('[data-toggle="tooltip"]').tooltip();
        });
      
</script>
</html>


