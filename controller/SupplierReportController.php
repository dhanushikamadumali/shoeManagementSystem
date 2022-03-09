<?php
include '../model/Supplier_Report_Model.php';///include supplier report model

$supplierReportObj = new supplierReport();///create supplier report object

$status = $_REQUEST["status"];///get status 
switch ($status){
    case "getreporttable"://///create case
            $Result=$supplierReportObj->getsupplierReport();///get result supplier report model
            ?>
            <!-- view table -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">S_ID</th>
                            <th scope="col">SUPPLIER NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">SUPPLIER ADDRESS</th>
                            <th scope="col">MOBILE NUMBER</th>
                            <th scope="col">supplier CREATE DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $Result->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["supplier_id"]?> </td>
                            <td><?php echo $row["supplier_fname"]?></td>
                            <td><?php echo $row["supplier_email"]?></td>
                            <td><?php echo $row["supplier_address"]?></td>
                            <td><?php echo $row["supplier_con2"]?></td>
                            <td><?php echo $row["supplier_create_date"]?></td>
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
     
    break;
    case "getreport":///case create
            $Result2=$supplierReportObj->getActiveSupplier();///get result supplier report model
            $row2 = $Result2->fetch_assoc();///make a result as an array value
            ?> 
               <!--  view earn value -->
                <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                                ALL SUPPLIER :
                               </th>
                               <th class=" w-70">
                               <?php echo $row2['ActiveSupplier'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_active_supplier.php"type="submit" id="submit" class="btn btn-success">GET REPORT </a>
                </div> 
                </div>
                <!-- view end -->
            <?php 
    break;
    
}


