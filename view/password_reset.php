<html>
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Reset</title> 
        <link rel="stylesheet" type="text/css" media="All" href="../css/stylesaccountrecovery.css">       
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >  
</head>
<body>
    <div class="container-fluid">
        <div class="row">
             <!---------////////////////////content \\\\\\\\\\\\\\\\\\\--------->
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">&nbsp;</div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <div id="loginbg" >   
                <div class="loginbox">  
                    <form method="post" id="changePassword">
                    <?php
                        if (isset($_GET["status"])&&($_GET["status"]=="recovery")) {
                            $string = base64_decode($_GET['code']);
                            $array = explode("=",$string);
                            $userId=$array[1];
                    ?>
                    <input type="hidden" name="userId" id="userId" value="<?php echo $userId;?>">  
                        <div class="card bg-transparent" id="boxfeder"> 
                        <h1 style="margin-left: 120px;font-family: pacifico Regular" >Reset Password</h1> 
                        <div class="row">
                        <div class="col-md-12">
                        <div id="alertmsg"></div>
                        </div>
                        </div>
                        <label for="password" style="margin-left: 80px;font-size:20px;">New Password:</label>
                         <div class="textbox">
                         <!-- <span class="fas fa-lock fa-1x" ></span> -->
                        <input type="password" placeholder="Type your new password" id="npsw" name="npsw" class="form-control" style="width: 350px;">
                         </div>
                         <label for="password" style="margin-left: 80px;font-size:20px;">Confirm Password:</label>
                         <div class="textbox">
                         <!-- <span class="fas fa-lock fa-1x" ></span> -->
                        <input type="password" placeholder="Type your confirm password" id="cpsw" name="cpsw" class="form-control" style="width: 350px;">
                         </div>
                        <input  type="button" name="submit" id="submit" value="Change">
                        </div>
                        <?php
                        } 
                        ?>         
                    </form>
                </div>       
            </div>
            <!------------//////////// end \\\\\\\\\\\\\\\\\\\\\\\\\\---------> 
            </div>
            </div>
            </div>
            <!-- ////////////////// circle\\\\\\\\\\\\\\\\\\\\\\\\\ -->
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <!-- <div class="row">&nbsp;</div> -->
            <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><svg height="200" width="200" ><circle cx="70" cy="70" r="50"   fill="Violet" /></svg></div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><svg height="150" width="150"><circle cx="100" cy="50" r="50"   fill="#80aaff" /></svg>
                <svg height="100" width="90"><circle cx="50" cy="50" r="40"   fill=" #ff99bb" /></svg>  
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><svg height="100" width="100" ><circle cx="80" cy="30" r="65"   fill=" #ffe6ff" /></svg></div>
            </div>
            <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <svg height="80" width="80"><circle cx="30" cy="30" r="20"   fill=" #ffad33" /></svg>
                <svg height="150" width="150" ><circle cx="90" cy="100" r="30"   fill="#8080ff" /></svg>  
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <svg height="100" width="100"><circle cx="50" cy="50" r="40" fill="#00ff80" /></svg>
                <svg height="150" width="150" ><circle cx="100" cy="100" r="50"   fill=" #bfff80" /></svg> 
                <svg height="150" width="150" ><circle cx="90" cy="100" r="30"   fill="#ffff4d" /></svg> 
            </div>
            </div>
            <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><svg height="80" width="80"><circle cx="30" cy="30" r="20"   fill=" #ff6666" /></svg> 
                <svg height="50" width="50"><circle cx="30" cy="40" r="10"   fill="#b3ff66" /></svg> 
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>
            </div>
            </div>
        </div>
    </div>   
</body>
<!-- including js --> 
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../js/popper.min.js"></script>   
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<script >
    $('#submit').on('click',function(){
        var userId = +$('#userId').val();
        var cpsw = $('#cpsw').val();
        var npsw = $('#npsw').val();
        if (npsw==""){
            swal({
                title:'please enter new password',
                icon: 'warning'
            }) 
        }else if (cpsw==""){
            swal({
                title: 'please enter confirm password',
                icon: 'warning'
            })
        }else{
                $.ajax({
                method:"POST",
                url: "../controller/loginController.php?status=changePassword",
                data:{cpsw:cpsw,npsw:npsw,userId:userId},
                success: function(res){
                        if(res != "error"){
                            swal("Successfully!!!", "Your password reset has been successfuly ", "success");
                            setTimeout(function(){window.location.href="login.php?>";}, 5000);
                        } 
                       
                },
                error:function(res){
                    console.log("res");
                }
                });
        }

        }); 
</script>  
</html>      
