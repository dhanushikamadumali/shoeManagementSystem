<?php
if (isset($_REQUEST["status"])){//////if have value request status
    include '../model/User_Model.php';//////include user model
    $UserObj = new user();//////create object
    $status = $_REQUEST["status"];
    switch ($status){
        case "getfunctions"://///for get module
            $RoleID = $_POST["role_id"];//get role id
            $ModuleResult = $UserObj->getModulesByRole($RoleID);//////pass role id to user module
            ?>
            <div class="row">
                <?php
                $Mcounter=0;
                while ($Mrow = $ModuleResult->fetch_assoc()){///make a module result as an array value
                    $Mcounter++;/////mcounter variable 
                    ?>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 20px;font-weight: bold"><?php echo $Mrow["module_name"];?></label>
                            <br/>  
                        </div>
                         <?php
                            if($Mcounter % 4==0){
                         ?>        
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                                <?php
                            }
                        ?>
                    <?php
                }
                ?>
            </div>
            <?php
        break;
        
        case "add_user":////////for add user 
            $FirstName = $_POST["user_fname"];////////get user fname
            $LastName = $_POST["user_lname"];/////////get user lname
            $Email = $_POST["user_email"];////////get user email
            $Gender = $_POST["gender"];////////get user gender
            $Dob = $_POST["user_dob"];////////get user dob
            $NIC = $_POST["user_nic"];////////get user nic
            $Con1 = $_POST["user_cno1"];////////get user con1
            $Con2 = $_POST["user_cno2"];////////get user con2
            $UserRole = $_POST["user_role"];////////get user role
           
            try{/////server side validation
                if($FirstName==""){////////if first name empty
                    throw  new Exception("FirstName Cannot Be Empty!!!");
                }
                if($LastName==""){////////if last name empty
                    throw  new Exception("lastName Cannot Be Empty!!!");
                }
                if($Email==""){////////if email empty
                    throw  new Exception("Email Cannot Be Empty!!!");
                }
                if($Dob==""){////////if dob empty
                    throw  new Exception("Dob Cannot Be Empty!!!");
                }
                if ($NIC=="") {////////if nic empty
                    throw new Exception("NIC Cannot Be Empty!!!");
                }
                if($Con1==""){////////if con1 empty
                    throw  new Exception("Contact Number1 Cannot Be Empty!!!");
                }
                if ($Con2=="") {////////if con2 empty
                    throw new Exception("Contact Number2 Cannot Be Empty");
                }
                if ($UserRole=="") {////////if user role empty
                    throw new Exception("User Role Cannot Be Empty");
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
                //////image load/////////
                if($_FILES["user_img"]["name"]!=""){//////if an image upload
                    $img=$_FILES["user_img"]["name"];//get image name
                    $img="".time()."_".$img;///change image name
                    $tmp_location=$_FILES["user_img"]["tmp_name"];////////tempory storage location
                    $permanant="../image/user_image/$img";//permanent storage location
                    move_uploaded_file($tmp_location,$permanant);////to move from tempory to permanant
                }
                else {
                    $img = "defaultImage.jpg";//////default image name
                }
                $IsValid1=$UserObj->getValidateEmail($Email);//////////validating the exixtence of the email address
                if($IsValid1===false){
                    throw new Exception("Email Address is Already Taken!!!!");
                }
                 $IsValid2=$UserObj->getValidateNIC($NIC);////validating the exixting of nic number
                if($IsValid2===false){
                    throw new Exception("NIC number is Already Taken!!!!");
                }
                $IsValid3=$UserObj->getValidateCon1($Con1);////validating the exixting of contact number1
                if($IsValid3===false){
                    throw new Exception("contact number1 is Already Taken!!!!");
                }
                $IsValid4=$UserObj->getValidateCon2($Con2);////validating the exixting of contact number2
                if($IsValid4===false){
                    throw new Exception("contact number2 is Already Taken!!!!");
                }
                
                $UserId = $UserObj->AddUser($FirstName, $LastName, $Email, $Dob, $img, $Con1, $Con2, $Gender, $NIC, $UserRole, 1);//////pass value to user module
                if($UserId>0){ /////////if user id grater than zero
                   $u_pw =  sha1($NIC);///////user password encryption
                   $loginId = $UserObj->AddLogin($Email, $u_pw, 1, $UserId);//////pass value login module

                   $msg = "Successfully Inserted User $FirstName"." "." $LastName";//////msg variable create
                   $msg = base64_encode($msg);//////msg is encode
                   ?>
                   <script>window.location = "../view/user.php?msg=<?php echo $msg;?>"</script>
                   <?php  /////riderected
                }
                
            }   catch (Exception $ex) {////////catch exeptionn
                $msg = $ex->getMessage();/////////get message value
                $msg = base64_encode($msg);
                ?>
                <script>window.location = "../view/add_user.php?msg=<?php echo $msg; ?>"</script><?php /////riderected
            }
                
        break; 
        case "deactivateUser":////////deactivateuser
           
            $UserId = $_POST["userId"];
            $userId = $UserObj->DeactiveUser($UserId);////////pass user id user module
            
        break;
        case "activateUser":////////activate user
             
            $UserId = $_POST["userId"];
            $userId = $UserObj->ActiveUser($UserId);///////pass user id user module
            
        break;
        case  "viewUser": //////for view user
            $UserId = $_REQUEST["user_id"];///////get user id
            $UserResult = $UserObj->ViewUser($UserId);///get the specific user information
            $Urow = $UserResult->fetch_assoc(); ///////// make a user result as an array value
            ?>
            <!--------- view user  -------->
            <div class="row">      
            <div class="col-md-12">
                <div class="card" >
                <div class="upper-container">
                    <div class="card-body">
                        <div class="d-flex">
                    <div class="image-container">
                        <img src="../image/user_image/<?php echo $Urow["user_image"];?>"/> 
                    </div>
                    <div class="text" style="font-weight:bold" >
                       <?php echo (strtoupper($Urow["user_fname"]));?> 
                       <?php echo (strtoupper($Urow["user_lname"])); ?>
                       <br>
                       <?php echo (strtoupper($Urow["role_name"])); ?> 
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
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">User No :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg76 ">
                                    <label ><?php echo ($Urow["user_no"]); ?></label> 
                                </div>  
                            </div> 
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">User Email :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg76 ">
                                    <label ><?php echo ($Urow["user_email"]); ?></label> 
                                </div>  
                            </div>  
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">User Gender :</lable>    
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <label ><?php echo $Gender = ($Urow["user_gender"]==1)?"Male":"female"?></lable>
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>  
                            <div class="row">
                                
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                <lable class="control-label" style="font-weight: bold;font-size:18px;">Date of Birth :</lable>
                                </div>
                                
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <label> <?php echo ($Urow["user_dob"]); ?></label>
                                </div>
                            </div>    
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">NIC number :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <label > <?php echo ($Urow["user_nic"]); ?></label>
                                </div> 
                            </div>
                            <div class="row">&nbsp;</div>    
                            <div class="row"> 
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">Contact number 01 :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <?php echo ($Urow["user_con1"]); ?>
                                </div>
                            </div>   
                            <div class="row">&nbsp;</div>
                            <div class="row"> 
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
                                    <lable class="control-label" style="font-weight: bold;font-size:18px;">Contact number 02 :</lable>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <?php echo ($Urow["user_con2"]); ?>
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
            <!---------- end view user  --------->
        <?php
        break;
        case "update_user" :///update user
        try{
            $UserId = $_POST["user_id"]; ///////get user id\\\\\\\\\
            $FirstName = $_POST["FirstName"]; /////////get user first name
            $LastName = $_POST["LastName"]; //////////get user last name
            $Email = $_POST["Email"]; //////////get user email
            $Gender = $_POST["gender"]; //////// get user gender
            $Dob = $_POST["user_dob"]; //////get user dob
            $NIC = $_POST["user_nic"]; ///////get user nic
            $Con1 = $_POST["ContactNumber"]; //////get user con1
            $Con2 = $_POST["MobileNumber"]; /////get user con2
            $UserRole =$_POST["user_role"]; /////get user role
          
            $patCno1 = "/^[0-9]{10}$/";/////  valid new format pattern con1
            $patCno2mobile = "/^07[0-9]{8}$/";/////  valid new format pattern con2

            if($FirstName==""){///if first name empty
                throw  new Exception('User first name can not be empty') ;
            }
            if($LastName==""){///if last name empty
                throw  new Exception( 'User Last name can not be empty');
            }
            if($Con1==""){///if contact number empty
                throw  new Exception( 'Contact number 1 can not be empty'); 
            }
            if($Con2==""){///if mobile number empty
                throw  new Exception( 'Contact number 2 can not be empty'); 
            }
            if($UserRole==""){///if mobile number empty
                throw  new Exception( 'User Role can not be empty'); 
            }
            if(!preg_match($patCno1,$Con1)){///if not match contact number\\\\\
                throw  new Exception('Contact number 1 not valid');
            }
            if(!preg_match($patCno2mobile,$Con2)){///if not match mobile number\\\\\
                throw  new Exception( 'Contact number 2 not valid');
            }
            $IsValid1=$UserObj->getValidateEditCon1($Con1);////validating the exixting of contact number2
            if($IsValid1===false){
                throw new Exception("contact number 1 is Already Taken!!!!");
            }
            $IsValid2=$UserObj->getValidateEditCon2($Con2);////validating the exixting of contact number2
            if($IsValid2===false){
                throw new Exception("contact number 2 is Already Taken!!!!");
            }
            $data[0]=1;
            $data[1] = 'Successfully Update User!!';///data success array
           
            if($_FILES["user_img"]["name"]!=""){//////if an image upload
                $img=$_FILES["user_img"]["name"];///get image name
                $img="".time()."_".$img;////change image name
                $tmp_location=$_FILES["user_img"]["tmp_name"];////////tempory storage location
                $permanant="../image/user_image/$img";////perment storage location
                move_uploaded_file($tmp_location,$permanant);////to move from tempory to permanant
            }
            else {
                $img = "defaultImage.jpg"; ///default image name\\\
            }
            $UserId=$UserObj->updateUser($UserId, $FirstName, $LastName, $Email, $Dob, $img, $Con1, $Con2, $Gender, $NIC, $UserRole, 1);///////pass update data to user module
            
        }   catch (Exception $ex) {////////catch exeptionn
            $data[0]=0;
            $data[1]=$ex->getMessage();
        }
        echo json_encode($data);  
            
    break;
       
    }   
    
}
