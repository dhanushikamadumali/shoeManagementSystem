<?php
if(isset($_REQUEST["status"])){//////if have value request status
    include '../model/Customer_Model.php';//////include customer model
    $CustomerObj = new customer();//////create object
    $status = $_REQUEST["status"];
    switch ($status){
        case "add_customer"://////for add customer 
            $FirstName = $_POST["cus_fname"];//////get customer fname
            $LastName = $_POST["cus_lname"];/////////get customer lname
            $Email = $_POST["cus_email"];///////get customer email
            $Gender = $_POST["gender"];///////get customer gender
            $NIC = $_POST["cus_nic"];//////get customer nic
            $Con1 = $_POST["cuss_cno1"];///////get customer con1
            $Con2 = $_POST["cuss_cno2"];///////get customer con2
            $Address = $_POST["cus_address"];///////get address
           
           try{////server side validation
                if($FirstName==""){///////if first name empty
                    throw  new Exception("FirstName Cannot Be Empty!!!");
                }
                if($LastName==""){//////if last name empty
                    throw  new Exception("lastName Cannot Be Empty!!!");
                }
                if($Email==""){///////if email empty
                    throw  new Exception("Email Cannot Be Empty!!!");
                }
                if ($NIC=="") {///////if nic empty
                    throw new Exception("NIC Cannot Be Empty!!!");
                }
                if($Con1==""){//////if con1 empty
                    throw  new Exception("Contact Number1 Cannot Be Empty!!!");
                }
                if ($Con2=="") {////////if con2 empty
                    throw new Exception("Contact Number2 Cannot Be Empty!!!");
                }
                if ($Address=="") {////////if address empty
                    throw new Exception("Address Cannot Be Empty!!!");
                }
                $patemail="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";/////valid pattern email\\\\\\
                $patnic="/^[0-9]{9}[vVxX]$/";////valid pattern nic
                $patNic1= "/^[0-9]{12}$/";/////valid  new format pattern
                $patCno1 = "/^[0-9]{10}$/";/////  valid new format pattern con1
                $patCno2mobile = "/^07[0-9]{8}$/";/////  valid new format pattern con2
                if(!preg_match($patemail, $Email)){////if not match email
                    throw  new Exception("Email is Invalid");
                }
                if(!preg_match($patnic, $NIC) && !preg_match($patNic1,$NIC) ){///if not match nic\\\\\
                    throw  new Exception("Invalid NIC,Please enter valid nic number");
                }
                if(!preg_match($patCno1, $Con1) ){///if not match nic\\\\\
                    throw  new Exception("Please Enter your valid Contact Number 1");
                }
                if(!preg_match($patCno2mobile, $Con2) ){///if not match nic\\\\\
                    throw  new Exception("Please Enter Your valid mobile number");
                }
               ///////image load\\\\\\\\\\\\
               if($_FILES["cus_img"]["name"]!=""){///////////if an image upload//////////
                  $img = $_FILES["cus_img"]["name"];//get image name
                  $img = "".time()."_".$img;//change image name
                  $tmp_location = $_FILES["cus_img"]["tmp_name"];////////tempory storage location
                  $permanant = "../image/customer_image/$img";//permanent storage location
                  move_uploaded_file($tmp_location, $permanant); ///to move from tempory to permanant 
                   
               }
               else {
                   $img = "defaultImage.jpg";////default image name
               }
                $IsValid1=$CustomerObj->getValidateEmail($Email);////////validating the exixtence of the email address
                if($IsValid1===false){
                    throw new Exception("Email Adress is Already Taken!!!!");
                }
                $IsValid2=$CustomerObj->getValidateNIC($NIC);///validating the exixting of nic number
                if($IsValid2===false){
                    throw new Exception("NIC number is Already Taken!!!!");
                }
                $IsValid3=$CustomerObj->getValidateCon1($Con1);///validating the exixting of contact number1
                if($IsValid3===false){
                    throw new Exception("Contact number1 is Already Taken!!!!");
                }
                $IsValid4=$CustomerObj->getValidateCon2($Con2);///validating the exixting of contact number2
                if($IsValid4===false){
                    throw new Exception("Contact number2 is Already Taken!!!!");
                }
                $CusId = $CustomerObj->AddCustomer($FirstName, $LastName, $Email, $NIC, $Address, $Con1, $Con2, $img, $Gender,0 );/////pass value to customer module
                if($CusId>0){/////////if customer id grater than zero
                   $CusPw = sha1($NIC);//////customer password encryption
                   $LoginId = $CustomerObj->AddLogin($Email, $CusPw, $CusId);/////pass value login module

               }
               $msg = "Successfully Inserted  $FirstName"." "." $LastName";////msg variable create
               $msg = base64_encode($msg);/////msg is encode
               ?>
               <!-- /////riderected -->
               <script>window.location = "../view/customer.php?msg=<?php echo $msg;?>"</script>
               <?php 
            } catch (Exception $ex) {///////catch exeptionn
               $msg = $ex->getMessage();////////get message value
               $msg = base64_encode($msg);
               ?>
               <!-- ////riderected -->
               <script>window.location = "../view/add_customer.php?msg=<?php echo $msg;?>"</script>
               <?php 

           }
        break;
        case "viewCustomer"://///for view customer
            $CusId = $_POST["customer_id"];/////get customer id
            $CustomerResult = $CustomerObj->ViewCustomer($CusId);//get the specific customer information
            $CusRow = $CustomerResult->fetch_assoc();/////// make a customer result as an array value
            ?> <!--------- view customer -------->
            <div class="row">      
            <div class="col-md-12">
                <div class="card" >
                <div class="upper-container">
                    <div class="card-body">
                        <div class="d-flex">
                    <div class="image-container">
                        <img src="../image/customer_image/<?php echo $CusRow["customer_image"];?>"/> 
                    </div>
                    <div class="text" style="font-weight:bold" >
                       <?php echo (strtoupper($CusRow["customer_fname"]));?> 
                       <?php echo (strtoupper($CusRow["customer_lname"])); ?>
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
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">Email :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg76 ">
                                    <label ><?php echo ($CusRow["customer_email"]); ?></label> 
                                </div>  
                            </div>  
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">Gender :</lable>    
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <label ><?php echo $Gender = ($CusRow["customer_gender"]==1)?"Male":"female"?></lable>
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>  
                            <div class="row">
                                
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                <lable class="control-label" style="font-weight: bold;font-size:18px;">NIC number :</lable>
                                </div>
                                
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <label> <?php echo ($CusRow["customer_nic"]); ?></label>
                                </div>
                            </div>    
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">Contact number 01  :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <label > <?php echo ($CusRow["customer_con1"]); ?></label>
                                </div> 
                            </div>
                            <div class="row">&nbsp;</div>    
                            <div class="row"> 
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">Contact number 02 :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <?php echo ($CusRow["customer_con2"]); ?>
                                </div>
                            </div>   
                            <div class="row">&nbsp;</div>
                            <div class="row"> 
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">Address :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <?php echo ($CusRow["customer_address"]); ?>
                                </div>
                            </div>  
                        </div>
                    </div>       
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>
            </div>  
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>    
            </div>
            <!---------- end view customer  --------->
            <?php 
        break;
		
		
    }
}
