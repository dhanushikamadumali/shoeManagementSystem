<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class user{
    // get user role function
    public function getuserRoles(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM role WHERE role_status='1'";
        $result = $con->query($sql);
        return $result;   
    }
    // get module by role function
    public function getModulesByRole($RoleID){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM module m, role_has_module r WHERE m.module_id = r.module_module_id AND r.role_role_id='$RoleID'";
        $result = $con->query($sql);
        return $result;
    }
    // get module function
    public function getModuleFunction($ModuleID) {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM function WHERE module_module_id='$ModuleID '";
        $result = $con->query($sql);
        return $result;
    }
    // validate email
    public function getValidateEmail($Email){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM user WHERE user_email='$Email'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // validate nic
     public function getValidateNIC($NIC){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM user WHERE user_nic='$NIC'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // validate contact number
    public function getValidateCon1($Con1){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM user WHERE user_con1='$Con1'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // validate mobile number
     public function getValidateCon2($Con2){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM user WHERE user_con2='$Con2'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
     // validate when edit contact number
     public function getValidateEditCon1($Con1){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM user WHERE user_con1='$Con1'";
        $result = $con->query($sql);
        if($result->num_rows>1){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    //validate when edit mobile number
    public function getValidateEditCon2($Con2){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM user WHERE user_con2='$Con2'";
        $result = $con->query($sql);
        if($result->num_rows>1){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // add user function
    public function AddUser($user_fname,$user_lname,$user_email,$user_dob,$user_image,$user_con1,$user_con2,$user_gender,$user_nic,$user_role,$user_status){
       $con = $GLOBALS['con'];
       $sql1 = "SHOW TABLE STATUS LIKE 'user'";
       $result1 = $con->query($sql1)or die($con->error);
       $row = $result1->fetch_assoc();
       $next_id = $row['Auto_increment'];
       $next_id =(string) $next_id;
       $id_length = strlen($next_id);
       $id_with_prefix = str_repeat('0',(3-$id_length)).$next_id;
       $new_userId = 'U_5827'.$id_with_prefix;
       
       $sql = "INSERT INTO user
       (    user_no, 
            user_fname,
            user_lname,
            user_email,
            user_dob,
            user_image,
            user_con1,
            user_con2,
            user_gender,
            user_nic,
            role_role_id,
            user_status
            )
               VALUES( 
                       '$new_userId',
                       '$user_fname',
                       '$user_lname',
                       '$user_email',
                       '$user_dob',
                       '$user_image',
                       '$user_con1',
                       '$user_con2',
                       '$user_gender',
                       '$user_nic',
                       '$user_role',
                       '$user_status')";
       $result=$con->query($sql);
       $UserId = $con->insert_id; /////////getting the auto incremented id//////
       return $UserId;
    }
    // add login function
    function AddLogin($Login_Username,$Login_Password,$Login_Status,$User_id){
        $con = $GLOBALS["con"];
        $sql = "INSERT INTO login(login_username,login_password,login_status,user_user_id)VALUES('$Login_Username','$Login_Password',1,'$User_id')";
        $con->query($sql);
        $LoginId = $con->insert_id;
        return $LoginId;  
    }
    // add user function
    function AddUserFunction($User_Id,$Function_Id){
        $con = $GLOBALS["con"];
        $sql = "INSERT INTO user_has_function(user_user_id,function_function_id) VALUES ('$User_Id','$Function_Id')";
        $con->query($sql);
    }
    // get all user function
    function getAllUser(){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM user u,role r WHERE u.role_role_id=r.role_id";
        $result = $con->query($sql);
        return $result;
    }
    // user deactivate function
    function DeactiveUser($UserId){
        $con = $GLOBALS["con"];
        $sql = "UPDATE user u, login l SET u.user_status='0',l.login_status='0' WHERE u.user_id=l.user_user_id AND u.user_id='$UserId'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // user activate function
    function ActiveUser($UserId){
        $con = $GLOBALS["con"];
        $sql = "UPDATE user u,login l SET u.user_status='1',l.login_status='1' WHERE u.user_id=l.user_user_id AND u.user_id='$UserId'";
        $result = $con->query($sql);
    }
    // view user function
    function ViewUser($UserId){
        $con = $GLOBALS["con"];
        $sql = "SELECT *FROM user u,role r WHERE u.role_role_id=r.role_id AND u.user_id='$UserId'";
        $result = $con->query($sql);
        return $result;
    }
    // get user function
    function getUserFunction($UserId){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM user_has_function WHERE user_user_id='$UserId'";
        $result = $con->query($sql);
        return $result;
    }
    //update email validation
    function updateEmailValidation($UserId,$Email){
        $con = $GLOBALS["con"];
        $sql = "SELECT 1 FROM user WHERE user_email='$Email'AND user_id!='$UserId'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        }
        else{
            return true; 
        }  
    }
    // update user
    function updateUser($UserId,
                        $user_fname,
                        $user_lname,
                        $user_email,
                        $user_dob,
                        $user_image,
                        $user_con1,
                        $user_con2,
                        $user_gender,
                        $user_nic,
                        $user_role,
                        $user_status){
        $con = $GLOBALS["con"];
        if($user_image!="defaultImage.jpg"){
        $sql = "UPDATE user SET 
                    user_fname='$user_fname',
                    user_lname='$user_lname',
                    user_email='$user_email',
                    user_dob='$user_dob',
                    user_image='$user_image',
                    user_con1='$user_con1',
                    user_con2='$user_con2',
                    user_gender='$user_gender',
                    user_nic='$user_nic',
                    role_role_id='$user_role',
                    user_status='$user_status'
                    WHERE user_id='$UserId'";
        }
        else {
            $sql = "UPDATE user SET 
                    user_fname='$user_fname',
                    user_lname='$user_lname',
                    user_email='$user_email',
                    user_dob='$user_dob',
                    user_con1='$user_con1',
                    user_con2='$user_con2',
                    user_gender='$user_gender',
                    user_nic='$user_nic',
                    role_role_id='$user_role',
                    user_status='$user_status'
                    WHERE user_id='$UserId'";
            
        }
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // remove user function
    function removeUserFunction($UserId){
        $con = $GLOBALS["con"];
        $sql = "DELETE FROM user_has_function WHERE user_user_id='$UserId'";
        $result = $con->query($sql) or die($con->error);
    }
    // get active user count
    function getActiveUserCount(){
        $con = $GLOBALS["con"];
        $sql = "SELECT COUNT(user_id) as countactiveuser FROM user WHERE user_status='1'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $activeUserCount = $row["countactiveuser"];
        return $activeUserCount;
    }
    // get deactive user count
    function getDeactiveUserCount(){
        $con = $GLOBALS["con"];
        $sql = "SELECT COUNT(user_id) as countactiveuser FROM user WHERE user_status='0'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $deactiveUserCount = $row["countactiveuser"];
        return $deactiveUserCount;      
    }
    // get user by email
    function getUserByEmail($Email){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM user WHERE user_email='$Email' AND user_status='1'";
        $result=$con->query($sql);
        return $result;
    }
    //reset password function
    function restPassword($userId, $newPassword){
        $con=$GLOBALS['con'];
        $sql="UPDATE login SET login_password='$newPassword' WHERE 	user_user_id='$userId'";
        $result=$con->query($sql);
        return $result;
    } 
    
}
