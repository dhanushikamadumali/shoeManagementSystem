<?php
include '../model/Stock_Report_Model.php';///include order report model

$StockReportObj = new stockReport();///create order report object

$status = $_REQUEST["status"];///get status 
switch ($status){
    case "getStockReportTable"://///create case
            $Result=$StockReportObj->getStockReport();///get result order report model
            ?>
            <!-- view table -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">STOCK ID</th>
                            <th scope="col">PRODUCT ID</th>
                            <th scope="col">PRODUCT NAME</th>
                            <th scope="col">SIZE</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">STOCK DATE</th>
                            <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $Result->fetch_assoc()){?>
                            <tr class="text-center">
                            <td ><?php echo $row["productstock_id"]?> </td>
                            <td ><?php echo $row["product_product_id"]?> </td>
                            <td><?php echo $row["product_name"]?> </td>
                            <td><?php echo $row["size"]?> </td>
                            <td><?php echo $row["a_quantity"]?> </td>
                            <td><?php echo $row["stockdate"]?></td>
                            <td>
                                <?php if($row["status"]=="1"){
                                    echo "In stock";
                                    }
                                    else{
                                        echo"Out of stock";
                                    }
                                ?>
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
                <!-- including js -->
               <script  type="text/javascript">
                    $(document).ready(function() {
                        $('#example').DataTable();
                    });
               </script> 
                <!--view table end  -->
            <?php
        // }
       
    
    break;
    case "getAvailableStockReport":///case create
            $Result=$StockReportObj->getAvailableStock();///get result order report model
            $row = $Result->fetch_assoc();///result value get array
            ?> 
               <!--  view avilable stock -->
                <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                               AVAILABLE STOCK :
                               </th>
                               <th class=" w-90">
                               <?php echo $row['availableq'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_available_stock.php"type="submit" id="submit" class="btn btn-success">GET REPORT </a>
                </div> 
                </div>
                <!-- view end -->
            <?php 
        // }
        
    break; 
    case "getoutofStockReportTable"://///create case
        $Result=$StockReportObj->getoutofStockReport();///get result order report model
        ?>
        <!-- view table -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr style="color: #fff"  class="bg-primary text-center" >
                        <th scope="col">STOCK ID</th>
                        <th scope="col">PRODUCT ID</th>
                        <th scope="col">PRODUCT NAME</th>
                        <th scope="col">SIZE</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">STOCK DATE</th>
                        <th scope="col">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row= $Result->fetch_assoc()){?>
                        <tr class="text-center">
                        <td ><?php echo $row["productstock_id"]?> </td>
                        <td ><?php echo $row["product_product_id"]?> </td>
                        <td><?php echo $row["product_name"]?> </td>
                        <td><?php echo $row["size"]?> </td>
                        <td><?php echo $row["a_quantity"]?> </td>
                        <td><?php echo $row["stockdate"]?></td>
                        <td>
                            <?php if($row["status"]=="1"){
                                echo "In stock";
                                }
                                else{
                                    echo"Out of stock";
                                }
                            ?>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
            <!-- including js -->
           <script  type="text/javascript">
                $(document).ready(function() {
                    $('#example').DataTable();
                });
           </script> 
            <!--view table end  -->
        <?php
    // }
   

break;
case "getoutofStockReport":///case create
        $Result=$StockReportObj->getoutofStock();///get result order report model
        $row = $Result->fetch_assoc();///result value get array
        ?> 
           <!--  view avilable stock -->
            <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <a href="report_outof_stock.php"type="submit" id="submit" class="btn btn-success">GET REPORT </a>
            </div> 
            </div>
            <!-- view end -->
        <?php 
    // }
    
break; 
case "getReorderStockReportTable"://///create case
    $Result=$StockReportObj->getReorderStockReport();///get result order report model
    
    ?>
    <!-- view table -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-bordered" id="example">
                <thead>
                    <tr style="color: #fff"  class="bg-primary text-center" >
                    <th scope="col">STOCK ID</th>
                    <th scope="col">PRODUCT ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">SIZE</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">STOCK DATE</th>
                    <th scope="col">REORDER</th>
                    <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row= $Result->fetch_assoc()){
                       if($row['reorder']>=$row["a_quantity"]) {
                        
                    ?>
                    <tr class="text-center">
                    <td ><?php echo $row["productstock_id"]?> </td>
                    <td ><?php echo $row["product_product_id"]?> </td>
                    <td><?php echo $row["product_name"]?> </td>
                    <td><?php echo $row["size"]?> </td>
                    <td><?php echo $row["a_quantity"]?> </td>
                    <td><?php echo $row["stockdate"]?></td>
                    <td><?php echo $row["reorder"]?></td>
                    <td>
                        <?php if($row["status"]=="1"){
                            echo "In stock";
                            }
                            else{
                                echo"Out of stock";
                            }
                        ?>
                    </td>
                    </tr>
                    <?php
                    }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
        <!-- including js -->
       <script  type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            });
       </script> 
        <!--view table end  -->
    <?php
// }


break;
case "getAvailableProductStock"://///create case
    // $productid = $_POST['proid'];
    // $Result=$StockReportObj->getProductStockReport($productid);///get result order report model
    ?>
    <!-- view table -->
    <!-- <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-bordered" id="example">
                <thead>
                    <tr style="color: #fff"  class="bg-primary text-center" >
                    <th scope="col">STOCK ID</th>
                    <th scope="col">PRODUCT ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">SIZE</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">STOCK DATE</th>
                    <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row= $Result->fetch_assoc()){
                        if($row['a_quantity'] < 110) {
                    ?>
                    <tr class="text-center">
                    <td ><?php echo $row["productstock_id"]?> </td>
                    <td ><?php echo $row["product_product_id"]?> </td>
                    <td><?php echo $row["product_name"]?> </td>
                    <td><?php echo $row["size"]?> </td>
                    <td><?php echo $row["a_quantity"]?> </td>
                    <td><?php echo $row["stockdate"]?></td>
                    <td>
                        <?php if($row["status"]=="1"){
                            echo "In stock";
                            }
                            else{
                                echo"Out of stock";
                            }
                        ?>
                    </td>
                    </tr>
                    <?php
                    }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> -->
        <!-- including js -->
       <!-- <script  type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            });
       </script>  -->
        <!--view table end  -->
    <?php
// }
break;
case "getAvailableProductStockReport":///case create
    // $productid = $_POST['proid'];
    // $Result=$StockReportObj->getAvailableProductStock($productid);///get result order report model
    // $row = $Result->fetch_assoc();///result value get array
    ?> 
       <!--  view avilable stock -->
        <!-- <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <table>
                <thead>
                   <tr>
                       <th class="text-center text-uppercase w-100">
                       AVAILABLE STOCK :
                       </th>
                       <th class=" w-90">
                       <?php echo $row['availableq'];?>
                       </th>
                   </tr>
                </thead>
            </table>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <a href="report_available_stock.php" type="submit" id="submit" class="btn btn-success">GET REPORT </a>
        </div> 
        </div> -->
        <!-- view end -->
    <?php 
// }

break; 
case "getCusStockReportTable"://///create case
    // $cusFromdate = $_POST['cusFromdate'];
    // $cusTodate = $_POST['cusTodate'];
    // $Result=$StockReportObj->getCusProductStockReport($cusFromdate,$cusTodate);///get result order report model
    ?>
    <!-- view table -->
    <!-- <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-bordered" id="example">
                <thead>
                    <tr style="color: #fff"  class="bg-primary text-center" >
                    <th scope="col">STOCK ID</th>
                    <th scope="col">PRODUCT ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">SIZE</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">STOCK DATE</th>
                    <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row= $Result->fetch_assoc()){?>
                    <tr class="text-center">
                    <td ><?php echo $row["productstock_id"]?> </td>
                    <td ><?php echo $row["product_product_id"]?> </td>
                    <td><?php echo $row["product_name"]?> </td>
                    <td><?php echo $row["size"]?> </td>
                    <td><?php echo $row["a_quantity"]?> </td>
                    <td><?php echo $row["stockdate"]?></td>
                    <td>
                        <?php if($row["status"]=="1"){
                            echo "In stock";
                            }
                            else{
                                echo"Out of stock";
                            }
                        ?>
                    </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> -->
        <!-- including js -->
       <!-- <script  type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            });
       </script>  -->
        <!--view table end  -->
    <?php
// }
break;
case "getAvailableCusStockReport":///case create
    // $cusFromdate = $_POST['cusFromdate'];
    // $cusTodate = $_POST['cusTodate']; 
    // $Result=$StockReportObj->getCusAvailableProductStock($cusFromdate,$cusTodate);///get result order report model
    // $row = $Result->fetch_assoc();///result value get array
    ?> 
       <!--  view avilable stock -->
        <!-- <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <table>
                <thead>
                   <tr>
                       <th class="text-center text-uppercase w-100">
                       AVAILABLE STOCK :
                       </th>
                       <th class=" w-90">
                       <?php echo $row['availableq'];?>
                       </th>
                   </tr>
                </thead>
            </table>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <button type="submit" id="submit" class="btn btn-success">GET REPORT </button>
        </div> 
        </div> -->
        <!-- view end -->
    <?php 
// }

break; 
}


