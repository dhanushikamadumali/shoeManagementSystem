<?php
include '../model/Order_Report_Model.php';///include order report model

$OrderReportObj = new orderReport();///create order report object

$status = $_REQUEST["status"];///get status 
switch ($status){
    case "getOrderReportTable"://///create case
        $SelectTime = $_POST['se'];///get select id
        if($SelectTime ==1 ){//if select id is 1
            $SevenDayResult=$OrderReportObj->getLastSevenDayAllOrderReport();///get result order report model
            ?>
            <!-- view table -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">INVOICE DATE</th>
                            <th scope="col">INVOICE TIME</th>
                            <th scope="col">INVOICE TYPE</th>
                            <th scope="col">INVOICE AMOUNT</th>
                            <th scope="col">CUSTOMER ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $SevenDayResult->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["invoice_number"]?></td>
                            <td><?php echo $row["invoice_date"]?></td>
                            <td><?php echo $row["invoice_time"]?></td>
                            <td><?php echo $row["invoice_type"]?></td>
                            <td><?php echo $row["invoice_total"]?></td>
                            <td><?php echo $row["customer_customer_id"]?></td>
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
        }
        if($SelectTime ==2 ){///if select id is 2
            ?>
            <!-- view custome date filter -->
            <form  method="post" action="../view/report_customed_order.php" enctype="multipart/form-data" >    
                <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><label style="font-weight: bold;">FROM :</label></div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input type="date" class="form-control" id="FromDate" name="FromDate"></div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><label style="font-weight: bold;">TO :</label></div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input type="date" class="form-control" id="ToDate" name="ToDate"></div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <button type="submit" id="submit" class="btn btn-primary">GET REPORT </button>
                </div> 
                </div>
            </form>
            <!-- view custome date filter -->
             <?php 
         }
         if($SelectTime ==3 ){///if select id is 3
            $twoMonthResult=$OrderReportObj->getLastTwoMAllOrderReport();///get result order report model
            ?>
            <!-- view last two month result -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">INVOICE DATE</th>
                            <th scope="col">INVOICE TIME</th>
                            <th scope="col">INVOICE TYPE</th>
                            <th scope="col">INVOICE AMOUNT</th>
                            <th scope="col">CUSTOMER ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $twoMonthResult->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["invoice_number"]?> </td>
                            <td><?php echo $row["invoice_date"]?></td>
                            <td><?php echo $row["invoice_time"]?></td>
                            <td><?php echo $row["invoice_type"]?></td>
                            <td><?php echo $row["invoice_total"]?></td>
                            <td><?php echo $row["customer_customer_id"]?></td>
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
        }
        if($SelectTime ==4 ){///if select id is 4
            $currentyearResult=$OrderReportObj->getCurrentYearAllOrderReport();///get result order report model
            ?>
            <!-- view current year result -->
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">INVOICE DATE</th>
                            <th scope="col">INVOICE TIME</th>
                            <th scope="col">INVOICE TYPE</th>
                            <th scope="col">INVOICE AMOUNT</th>
                            <th scope="col">CUSTOMER ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $currentyearResult->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["invoice_number"]?> </td>
                            <td><?php echo $row["invoice_date"]?></td>
                            <td><?php echo $row["invoice_time"]?></td>
                            <td><?php echo $row["invoice_type"]?></td>
                            <td><?php echo $row["invoice_total"]?></td>
                            <td><?php echo $row["customer_customer_id"]?></td>
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
        }
        if($SelectTime ==5 ){///if select id is 5
            $todayResult=$OrderReportObj->getTodayAllOrderReport();///get result order report model
            ?>
            <!-- view last year result -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">INVOICE DATE</th>
                            <th scope="col">INVOICE TIME</th>
                            <th scope="col">INVOICE TYPE</th>
                            <th scope="col">INVOICE AMOUNT</th>
                            <th scope="col">CUSTOMER ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row=$todayResult->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["invoice_number"]?> </td>
                            <td><?php echo $row["invoice_date"]?></td>
                            <td><?php echo $row["invoice_time"]?></td>
                            <td><?php echo $row["invoice_type"]?></td>
                            <td><?php echo $row["invoice_total"]?></td>
                            <td><?php echo $row["customer_customer_id"]?></td>
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
                <!-- view last year result -->   
            <?php
        }
    break;
    case "getAllOrderPlaceReport":///case create
        $SelectTime = $_POST['se'];///get select id
        if($SelectTime ==1 ){///if select id is 1
            $SevenDayResult=$OrderReportObj->getLastSevenDayAllOrderPlace();///get result order report model
            $row = $SevenDayResult->fetch_assoc();///result value get array
            ?> 
               <!--  view earn value -->
                <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                               TOTAL ORDER PLACE :
                               </th>
                               <th class=" w-90">
                               <?php echo $row['allorder'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_last_sevend_order.php"type="submit" id="submit" class="btn btn-primary">GET REPORT </a>
                </div> 
                </div>
                <!-- view end -->
            <?php 
        }
        if($SelectTime ==3){///if select id is 3
            $TwoMonthResult=$OrderReportObj->getLastTwoMAllOrderPlace();///get result order report model
            $row = $TwoMonthResult->fetch_assoc();///result value get array
            ?>   
                <!--view tow month earn value  -->
                <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                               TOTAL ORDER PLACE :
                               </th>
                               <th class=" w-90">
                               <?php echo $row['allorder'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_last_twom_order.php"type="submit" id="submit" class="btn btn-primary">GET REPORT </a>
                </div> 
                </div>
                <!--view end  -->
            <?php 
        }
        if($SelectTime ==4){///if select id is 4
            $currentYearResult=$OrderReportObj->getCurrentYearAllOrderPlace();///get result order report model
            $row = $currentYearResult->fetch_assoc();///result value get array
            ?>   <!--view current year earn value  -->
                <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                               TOTAL ORDER PLACE :
                               </th>
                               <th class=" w-90">
                               <?php echo $row['allorder'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_currenty_order.php"type="submit" id="submit" class="btn btn-primary">GET REPORT </a>
                </div> 
                </div>
                <!-- view end -->
            <?php 
        }
        if($SelectTime ==5){///if select id is 5
            $todayResult=$OrderReportObj->getTodayAllOrderPlace();///get result order report model
            $row = $todayResult->fetch_assoc();///result value get array
            ?>  <!--view clast year earn value  -->  
                <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                               TOTAL ORDER PLACE :
                               </th>
                               <th class=" w-90">
                               <?php echo $row['allorder'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_today_order.php"type="submit" id="submit" class="btn btn-primary">GET REPORT </a>
                </div> 
                </div>
                <!-- view end -->
            <?php 
        }
    break;
}


