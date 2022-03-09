<?php
if(isset($_REQUEST["status"])){
    include '../model/Supplier_Model.php';///include supplier model
    $SupplierObj = new supplier();//create supplierobject
    $status = $_REQUEST["status"];
    switch ($status){
        case "add_supplier"://case create add supplier
            $FirstName = $_POST["supp_fname"];///get supplier fname
            $LastName = $_POST["supp_lname"];///get supplier lname
            $Email = $_POST["supp_email"];///get supplier email
            $Gender = $_POST["gender"];///get supplier gender
            $Con1 = $_POST["supp_cno1"];///get supplier con1
            $Con2 = $_POST["supp_cno2"];///get supplier con2
            $Address = $_POST["supp_address"];///get supplier address
           
            try{
               if($FirstName==""){///if first name empty
                    throw  new Exception("FirstName Cannot Be Empty!!!");
                }
                if($LastName==""){///if last name empty
                    throw  new Exception("LastName Cannot Be Empty!!!");
                }
                if($Email==""){///if email empty
                    throw  new Exception("Email Cannot Be Empty!!!");
                }
                if($Con1==""){///if contact number 1 empty
                    throw  new Exception("Contact Number1 Cannot Be Empty!!!");
                }
                if($Con2=="") {///if contact number 2 empty
                    throw new Exception("Contact Number2 Cannot Be Empty");
                }
                if ($Address=="") {///if address empty
                    throw new Exception("Address Cannot Be Empty");
                }
                $patemail="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";/////valid pattern email\\\\\\
                $patCno1 = "/^[0-9]{10}$/";/////  valid new format pattern con1
                $patCno2mobile = "/^07[0-9]{8}$/";/////  valid new format pattern con2
                if(!preg_match($patemail, $Email)){////if not match email
                    throw  new Exception("Email is Invalid");
                }
                if(!preg_match($patCno1, $Con1) ){///if not match nic\\\\\
                    throw  new Exception("Please Enter your valid Contact Number 1");
                }
                if(!preg_match($patCno2mobile, $Con2) ){///if not match nic\\\\\
                    throw  new Exception("Please Enter Your valid mobile number");
                }
               ///////image load
               if($_FILES["supp_img"]["name"]!=""){///////if an image upload
                  $Img=$_FILES["supp_img"]["name"];///image name
                  $Img="".time()."_".$Img;//change image name
                  $tmp_location=$_FILES["supp_img"]["tmp_name"];////////tempory storage location
                  $permanant="../image/supplier_image/$Img";//permanent storage location
                  move_uploaded_file($tmp_location,$permanant); ///to move from tempory to permanant
               }
               else {
                   $Img = "defaultImage.jpg";//////default image name
               }
                $IsValid1=$SupplierObj->getValidateEmail($Email);
                if($IsValid1==false){
                   throw new Exception("Email Address is Alread Taken!!!");//////////validating the exixtence of the email address
                }
                $IsValid2=$SupplierObj->getValidateCon1($Con1);
                if($IsValid2===false){
                    throw new Exception("Contact number1 is Already Taken!!!!");////validating the exixting of contact number1
                }
                $IsValid3=$SupplierObj->getValidateCon2($Con2);
                if($IsValid3===false){
                    throw new Exception("Contact number2 is Already Taken!!!!");////validating the exixting of contact number2
                }
               $SuppId = $SupplierObj->AddSupplier($FirstName, $LastName, $Email, $Address, $Con1, $Con2, $Img, $Gender );//////pass value to supplier module
               
               $msg = "Successfully Inserted Supplier $FirstName"." "." $LastName";/////msg variable create
               $msg = base64_encode($msg);/////masg is encode
               ?>
               <!-- riderected -->
               <script>window.location = "../view/supplier.php?msg=<?php echo $msg;?>"</script>
               <?php 
           } catch (Exception $ex) {////////catch exeptionn
               $msg = $ex->getMessage();/////////get message value
               $msg = base64_encode($msg);
               ?>
               <!--riderected -->
               <script>window.location = "../view/add_supplier.php?msg=<?php echo $msg;?>"</script>
               <?php 
           }
        break;
        
        case "viewSupplier"://////for view supplier
            $SuppId = $_POST["supplier_id"];///////get supplier id
            $SupplierResult = $SupplierObj->ViewSupplier($SuppId);///get the specific supplier information
            $SuppRow = $SupplierResult->fetch_assoc();///////// make a supplier result as an array value
            ?>
            <!-- view supplier -->
            <div class="row">      
            <div class="col-md-12">
                <div class="card" >
                <div class="upper-container">
                    <div class="card-body">
                        <div class="d-flex">
                    <div class="image-container">
                        <img src="../image/supplier_image/<?php echo$SuppRow["supplier_image"];?>"/> 
                    </div>
                    <div class="text" style="font-weight:bold" >
                       <?php echo (strtoupper($SuppRow["supplier_fname"]));?> 
                       <?php echo (strtoupper($SuppRow["supplier_lname"])); ?>
                    </div>
                    </div>
                </div>     
                </div>
                </div>
            </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;"> Email :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg76 ">
                                    <label ><?php echo ($SuppRow["supplier_email"]); ?></label> 
                                </div>  
                            </div>  
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;"> Gender :</lable>    
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <label ><?php echo $Gender = ($SuppRow["supplier_gender"]==1)?"Male":"female"?></lable>
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>  
                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                <lable class="control-label" style="font-weight: bold;font-size:18px;">Contact number 01 :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <label> <?php echo ($SuppRow["supplier_con1"]); ?></label>
                                </div>
                            </div>    
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">Contact number 01 :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <label > <?php echo ($SuppRow["supplier_con2"]); ?></label>
                                </div> 
                            </div>
                            <div class="row">&nbsp;</div>    
                            <div class="row"> 
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">Address :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <?php echo ($SuppRow["supplier_address"]); ?>
                                </div>
                            </div>   
                            <div class="row">&nbsp;</div>
                        </div>
                    </div>       
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>
            </div>  
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>    
            </div>
            <!-- end supplier -->
        <?php
        break;
    
        case "edit_supplier":////////for update supplier\\\\\\\\\\\
            try{
                $SuppId = $_POST["supp_id"];///////get supplier id\\\\\\\\\
                $FirstName = $_POST["supp_fname"];/////////get supplier first name
                $LastName = $_POST["supp_lname"]; //////////get supplier last name
                $Email = $_POST["supp_email"];//////////get supplier email
                $Gender = $_POST["gender"];//////// get supplier gender
                $Con1 = $_POST["supp_cno1"]; //////get supplier con1
                $Con2 = $_POST["supp_cno2"];/////get supplier con2
                $Address = $_POST["supp_addr"];/////get supplier address

                $patCno1 = "/^[0-9]{10}$/";/////  valid new format pattern con1
                $patCno2mobile = "/^07[0-9]{8}$/";/////  valid new format pattern con2
    
                if($FirstName==""){////if supplier first name empty
                throw  new Exception("FirstName Cannot Be Empty!!!");
                }
                if($LastName==""){////if supplier last name empty
                    throw  new Exception("lastName Cannot Be Empty!!!");
                }
                if($Con1==""){///if contact number 1 empty
                    throw  new Exception("Contact Number1 Cannot Be Empty!!!");
                }
                if ($Con2=="") {////if contact number 2 empty
                    throw new Exception("Contact Number2 Cannot Be Empty");
                }
                if ($Address=="") {////if address empty
                    throw new Exception("Address Cannot Be Empty");
                }
                $patCno1 = "/^[0-9]{10}$/";/////  valid new format pattern con1
                $patCno2mobile = "/^07[0-9]{8}$/";/////  valid new format pattern con2
                if(!preg_match($patCno1, $Con1) ){///if not match nic
                    throw  new Exception("Please Enter your valid Contact Number 1");
                }
                if(!preg_match($patCno2mobile, $Con2) ){///if not match nic
                    throw  new Exception("Please Enter Your valid mobile number");
                }
                $IsValid2=$SupplierObj->getValidateEditCon1($Con1);
                if($IsValid2===false){
                    throw new Exception("Contact number1 is Already Taken!!!!");////validating the exixting of contact number1
                }
                $IsValid3=$SupplierObj->getValidateEditCon2($Con2);
                if($IsValid3===false){
                    throw new Exception("Contact number2 is Already Taken!!!!");////validating the exixting of contact number2
                }
                $data[0]=1;
                $data[1] = 'successfully Update Supplier!!';///data success array
               
                if($_FILES["supp_img"]["name"]!=""){//////if an image upload
                    $img=$_FILES["supp_img"]["name"];//get image name
                    $img="".time()."_".$img;///change image name
                    $tmp_location=$_FILES["supp_img"]["tmp_name"];////////tempory storage location
                    $permanant="../image/supplier_image/$img";////perment storage location
                    move_uploaded_file($tmp_location,$permanant);////to move from tempory to permanant
                }
                else {
                    $img = "defaultImage.jpg";///default image name\\\
                }
                $SupplierObj->updateSupplier($SuppId, $FirstName, $LastName, $Email, $Address, $Con1, $Con2, $img, $Gender);/////pass update data to supplier module

            }   catch (Exception $ex) {////////catch exeptionn
                $data[0]=0;
                $data[1]=$ex->getMessage();
            }
            echo json_encode($data); 

    }
}


