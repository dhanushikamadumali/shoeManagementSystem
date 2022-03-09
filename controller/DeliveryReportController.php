<?php
include '../model/Delivery_Report_Model.php';///include report model

$deliveryReportObj = new deliveryReport();///create report object

$status = $_REQUEST["status"];///get status 
switch ($status){
    case "getreporttable"://///create case
       $SelectTime = $_POST['se'];///get select id
        if($SelectTime ==1 ){//if select id is 1
            $WeeklyResult=$deliveryReportObj->getWeeklyReport();///get result report model
            ?>
            <!-- view table -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">D_ID</th>
                            <th scope="col">DELIVER NAME</th>
                            <th scope="col">DELIVER DATE</th>
                            <th scope="col">CUSTOMER NAME</th>
                            <th scope="col">CUSTOMER ADDRESS</th>
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $WeeklyResult->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["delivery_id"]?> </td>
                            <td><?php echo $row["deliver_name"]?></td>
                            <td><?php echo $row["delivery_date"]?></td>
                            <td><?php echo $row["customer_fname"]?></td>
                            <td><?php echo $row["customer_adrr"]?></td>
                            <td><?php echo $row["invoice_number"]?></td>
                            <td>
                                <?php if($row["delivery_status"]=="1"){
                                    echo "Shipped";
                                    }
                                    else{
                                        echo"Delivered";
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
        }
        if($SelectTime ==2 ){///if select id is 2
            ?>
            <!-- view custome date filter -->
            <form  method="post" action="../view/report_customed_delivery.php" enctype="multipart/form-data" >    
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
            $twoMonthResult=$deliveryReportObj->getLastTwoMReport();///get result report model
            ?>
            <!-- view last two month result -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">D_ID</th>
                            <th scope="col">DELIVER NAME</th>
                            <th scope="col">DELIVER DATE</th>
                            <th scope="col">CUSTOMER NAME</th>
                            <th scope="col">CUSTOMER ADDRESS</th>
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $twoMonthResult->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["delivery_id"]?> </td>
                            <td><?php echo $row["deliver_name"]?></td>
                            <td><?php echo $row["delivery_date"]?></td>
                            <td><?php echo $row["customer_fname"]?></td>
                            <td><?php echo $row["customer_adrr"]?></td>
                            <td><?php echo $row["invoice_number"]?></td>
                            <td>
                                <?php if($row["delivery_status"]=="1"){
                                    echo "Shipped";
                                    }
                                    else{
                                        echo"Delivered";
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
        }
        if($SelectTime ==4 ){///if select id is 4
            $crrentyearResult=$deliveryReportObj->getCurrentYearReport();///get result report model
            ?>
            <!-- view current year result -->
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">D_ID</th>
                            <th scope="col">DELIVER NAME</th>
                            <th scope="col">DELIVER DATE</th>
                            <th scope="col">CUSTOMER NAME</th>
                            <th scope="col">CUSTOMER ADDRESS</th>
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $crrentyearResult->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["delivery_id"]?> </td>
                            <td><?php echo $row["deliver_name"]?></td>
                            <td><?php echo $row["delivery_date"]?></td>
                            <td><?php echo $row["customer_fname"]?></td>
                            <td><?php echo $row["customer_adrr"]?></td>
                            <td><?php echo $row["invoice_number"]?></td>
                            <td>
                                <?php if($row["delivery_status"]=="1"){
                                    echo "Shipped";
                                    }
                                    else{
                                        echo"Delivered";
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
        }
        if($SelectTime ==5 ){///if select id is 5
            $todayResult=$deliveryReportObj->getTodayReport();///get result report model
            ?>
            <!-- view last year result -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">D_ID</th>
                            <th scope="col">DELIVER NAME</th>
                            <th scope="col">DELIVER DATE</th>
                            <th scope="col">CUSTOMER NAME</th>
                            <th scope="col">CUSTOMER ADDRESS</th>
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $todayResult->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["delivery_id"]?> </td>
                            <td><?php echo $row["deliver_name"]?></td>
                            <td><?php echo $row["delivery_date"]?></td>
                            <td><?php echo $row["customer_fname"]?></td>
                            <td><?php echo $row["customer_adrr"]?></td>
                            <td><?php echo $row["invoice_number"]?></td>
                            <td>
                                <?php if($row["delivery_status"]=="1"){
                                    echo "Shipped";
                                    }
                                    else{
                                        echo"Delivered";
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
                <!-- view last year result -->   
            <?php
        }
    break;
    case "getreport":///case create
        $SelectTime = $_POST['se'];///get select id
        if($SelectTime ==1 ){///if select id is 1
            $WeeklydeliveryResult=$deliveryReportObj->getWeeklyCustomedateSuccDelivery();///get result report model
            $row =  $WeeklydeliveryResult->fetch_assoc();///result value get array
            ?> 
               <!--  view earn value -->
                <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                                ALL SUCCESS DELIVERED :
                               </th>
                               <th class=" w-90">
                               <?php echo $row['successdelivery'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_last_sevend_delivery.php"type="submit" id="submit" class="btn btn-primary">GET REPORT </a>
                </div> 
                </div>
                <!-- view end -->
            <?php 
        }
        if($SelectTime ==3){///if select id is 3
            $TwoMonthResult=$deliveryReportObj->getLastTwoMSuccDelivery();///get result report model
            $row = $TwoMonthResult->fetch_assoc();///result value get array
            ?>   
                 <!--view tow month earn value  -->
                <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                               ALL SUCCESS DELIVERED :
                               </th>
                               <th class=" w-90">
                               <?php echo $row['successdelivery'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_last_twom_delivery.php"type="submit" id="submit" class="btn btn-primary">GET REPORT </a>
                </div> 
                </div>
                 <!--view end  -->
            <?php 
        }
        if($SelectTime ==4){///if select id is 4
            $currentYearResult=$deliveryReportObj->getCurrentYearSuccDelivery();///get result report model
            $row = $currentYearResult->fetch_assoc();///result value get array
            ?>   <!--view current year earn value  -->
                <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                               ALL SUCCESS DELIVERED :
                               </th>
                               <th class=" w-90">
                               <?php echo $row['successdelivery'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_currenty_delivery.php"type="submit" id="submit" class="btn btn-primary">GET REPORT </a>
                </div> 
                </div>
                <!-- view end -->
            <?php 
        }
        if($SelectTime ==5){///if select id is 5
            $todayResult=$deliveryReportObj->getTodaySuccDelivery();///get result report model
            $row = $todayResult->fetch_assoc();///result value get array
            ?>  <!--view clast year earn value  -->  
                <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                               ALL SUCCESS DELIVERED :
                               </th>
                               <th class=" w-90">
                               <?php echo $row['successdelivery'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_today_delivery.php"type="submit" id="submit" class="btn btn-primary">GET REPORT </a>
                </div> 
                </div>
                <!-- view end -->
            <?php 
        }
    break;
}


