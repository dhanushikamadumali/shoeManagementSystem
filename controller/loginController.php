<?php
include '../commons/session.php';//include session
include '../model/login_model.php';//iclude login model
include '../model/User_Model.php';//include user model

$loginObj = new Login();//create loginObj 
$UserObj = new user();//create UserObj

if(isset($_REQUEST['status'])){////get the status through the URL form action
$status = $_REQUEST["status"];
switch ($status){//////    for user  login to system
    case "login": /// ///   if status is login
        $u_name = $_POST["uname"];///// get username
        $u_pw = $_POST["pswd"];///// get user password
        $u_pw = sha1($u_pw);////// password is encription
        $result = $loginObj->validateLogin($u_name, $u_pw); ///// pass value to the login model
        if($result -> num_rows == 1){///// if num rows equal to 1
            $Urow = $result->fetch_assoc();//////result value is asign to fetch assoc
            if($Urow["user_status"]==1){ ////// if user active 
                $user_id = $Urow["user_id"];
                $RoleID = $Urow["role_role_id"];
                $FirstName = $Urow["user_fname"];
                $LastName = $Urow["user_lname"];
                $UserImage = $Urow["user_image"];
                $moduleResult = $UserObj->getModulesByRole($RoleID); ////// pass role id to the user model
                $moduleArray = array(); ////// create model array variable
                while($mRow = $moduleResult->fetch_assoc()){////// make a module result as an array value
                    array_push($moduleArray, $mRow["module_id"]);//////model id is push to model array
                }
                $_SESSION["user_module"] = $moduleArray; /////// create session moodel array
                $_SESSION["user"] = array();////create session is user
                $_SESSION["user"] = array("fname"=>$FirstName, "lname"=>$LastName, "role_id"=>$RoleID,"user_id"=>$user_id, "user_image"=>$UserImage);///insert array value----
                if($_SESSION["user"]["role_id"] == 1){
                    ?><script>window.location = "../view/dashboard.php"</script><?php /////// redirection
                }
                elseif($_SESSION["user"]["role_id"] == 1){
                    ?><script>window.location = "../view/user.php"</script><?php /////// redirection
                }
                elseif($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 3){
                    ?><script>window.location = "../view/stock.php"</script><?php /////// redirection
                }
                elseif($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 2){
                    ?><script>window.location = "../view/pos.php"</script><?php /////// redirection
                }
                elseif($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 5){
                    ?><script>window.location = "../view/report.php"</script><?php /////// redirection
                }
                elseif($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 4){
                    ?><script>window.location = "../view/dilivery.php"</script><?php /////// redirection
                }
                elseif($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 4){
                    ?><script>window.location = "../view/order.php"</script><?php /////// redirection
                }
                elseif($_SESSION["user"]["role_id"] == 1 ){
                    ?><script>window.location = "../view/customer.php"</script><?php /////// redirection
                }
                elseif($_SESSION["user"]["role_id"] == 1){
                    ?><script>window.location = "../view/supplier.php"</script><?php /////// redirection
                }
                elseif($_SESSION["user"]["role_id"] == 1 ){
                    ?><script>window.location = "../view/barcode_genarate.php"</script><?php /////// redirection
                }
            }
        else{
            $msg = "The deactivate user can't login!";//////create error msg
            $msg = base64_encode($msg);//////msg is encode
            ?><script>window.location = "../view/login.php?msg=<?php echo $msg;  ?>"</script><?php ////////redirection
            }
        }
        else {
            $msg = "Username and Password does not match, Please check username and password"; ////// create msg variable
            $msg = base64_encode($msg); ////// msg is encode
            ?><script>window.location = "../view/login.php?msg=<?php echo $msg;  ?>"</script><?php ////////redirection
        }
    break;
    case "logOut"://////// for logout
        session_destroy(); //////session end
    break;
    default:
        echo "invalid parameters"; ////echo invalid parameeters
        
    case "verifyAccount"://////for verify account
            $Email = $_POST["email"]; //////get email
            $userResult = $UserObj->getUserByEmail($Email); //////passs email to user moule
        if($userResult->num_rows>0){ ////if result num rows greater than zero
           $row = $userResult->fetch_assoc(); ///////result value as an array value
           $user_id = $row['user_id']; ///////get uder id in array value
           $string = "encrypted_id=$user_id"; //////encrypted user id is get string variable
           $string = base64_encode($string); ///string encode
           $url = "https://localhost/shoeManagementSystem/view/password_reset.php?status=recovery&code=$string"; ////////passs url
          
           include '../includes/email_include.php'; ////////include email_include file

           $mail->setFrom('mail@et.lk','H.K.ENTERPRISES(PVT) LIMITED'); //////mail set from
           $mail->addReplyTo('mail@et.lk','H.K.ENTERPRISES(PVT) LIMITED'); //////mail add reply to
           $mail->addAddress($Email); /////mail add addresss
           $mail->addAttachment(''); /////mali attachment
           $mail->Subject = 'Account Recovery Email'; //////mail subject

           $mail->isHTML(true); /////mail isHTML ture
           $body="<h1>Please use below link to reset your password</h1>" /////////set mail body
                ."<a href='$url' target='_blank'>click here</a>";
            
            $mail->Body = $body; 

            if($mail->send()){ //////if mail send
                echo 'mail sent!!'; ///////echo mail sent
            }
            else{
                echo 'not sent'; //////echo not sent
            }
       }
    break;  
    case "changePassword":////change password
            $userId = $_POST['userId'];//get user id
            $newPassword = $_POST['npsw'];///get new password
            $newPassword = sha1($newPassword);//new password encode
            $result=$UserObj->restPassword($userId, $newPassword);//pass value to user model for update
    break; 
    
    }           
}     
    
         
            
 
        
        


