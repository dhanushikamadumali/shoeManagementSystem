<?php
include '../model/User_Report_Model.php';///include user report model

$userReportObj = new userReport();///create user report object

$status = $_REQUEST["status"];///get status 
switch ($status){
    case "getreporttable"://///create case
            $Result=$userReportObj->getuserReport();///get result user report model
            ?>
            <!-- view table -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">U_ID</th>
                            <th scope="col">USER NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">NIC</th>
                            <th scope="col">MOBILE NUMBER</th>
                            <th scope="col">USER CREATE DATE</th>
                            <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $Result->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["user_id"]?> </td>
                            <td><?php echo $row["user_fname"]?> <?php echo $row["user_lname"]?></td>
                            <td><?php echo $row["user_email"]?></td>
                            <td><?php echo $row["user_nic"]?></td>
                            <td><?php echo $row["user_con2"]?></td>
                            <td><?php echo $row["user_updated_date"]?></td>
                            <td>
                                <?php if($row["user_status"]=="1"){
                                    echo "Active";
                                    }
                                    else{
                                        echo"Deactivated";
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
     
    break;
    case "getreport":///case create
            $Result2=$userReportObj->getActiveUser();///get result user report model
            $row2 = $Result2->fetch_assoc();///make a result as an array value
            ?> 
               <!--  view earn value -->
                <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <table>
                        <thead>
                           <tr>
                               <th class="text-center text-uppercase w-100">
                                ACTIVE USER :
                               </th>
                               <th class=" w-70">
                               <?php echo $row2['ActiveUser'];?>
                               </th>
                           </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="report_active_user.php"type="submit" id="submit" class="btn btn-success">GET REPORT </a>
                </div> 
                </div>
                <!-- view end -->
            <?php 
    break;
    case "getdactivereporttable"://///create case
        $Result=$userReportObj->getDuserReport();///get result user report model
        ?>
        <!-- view table -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr style="color: #fff"  class="bg-primary text-center" >
                        <th scope="col">U_ID</th>
                        <th scope="col">USER NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">NIC</th>
                        <th scope="col">MOBILE NUMBER</th>
                        <th scope="col">USER CREATE DATE</th>
                        <th scope="col">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row= $Result->fetch_assoc()){?>
                        <tr class="text-center">
                        <td><?php echo $row["user_id"]?> </td>
                        <td><?php echo $row["user_fname"]?> <?php echo $row["user_lname"]?></td>
                        <td><?php echo $row["user_email"]?></td>
                        <td><?php echo $row["user_nic"]?></td>
                        <td><?php echo $row["user_con2"]?></td>
                        <td><?php echo $row["user_updated_date"]?></td>
                        <td>
                            <?php if($row["user_status"]=="1"){
                                echo "Active";
                                }
                                else{
                                    echo"Deactivated";
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
 
break;
case "getdactivereport":///case create
    $Result2=$userReportObj->getDactiveUser();///get result user report model
    $row2 = $Result2->fetch_assoc();///make a result as an array value
    ?> 
       <!--  view earn value -->
        <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <table>
                <thead>
                   <tr>
                       <th class="text-center text-uppercase w-100">
                        DEACTIVE USER :
                       </th>
                       <th class=" w-70">
                       <?php echo $row2['DActiveUser'];?>
                       </th>
                   </tr>
                </thead>
            </table>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <a href="report_deactive_user.php"type="submit" id="submit" class="btn btn-success">GET REPORT </a>
        </div> 
        </div>
        <!-- view end -->
    <?php 
break;
}


