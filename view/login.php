<html>
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>  
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!------////////////////login box\\\\\\\\\\\\\\\\\\\\\\\\----->
            <div id="content">             
                <div id="image" >  
                <div class="inner-image">
                    <div class="carousel-item drk active">
                    <img src="../image/bg1.png" style="width:100%">
                        <div class="carousel-caption" id="bgtext">
                            <h1 style="font-family: pacifico Regular">Hello there!</h1>
                            <p style="font-size: 25px;">It's a brand new day, like brand new shoes giving you that spring in your steps, so don't hesitate, launch in to the outdoors and explore all the possibilities awaiting you</p>       
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!--------- ///////////////////end \\\\\\\\\\\\\\\\\\\\\---------->
            <!---------////////////////////content \\\\\\\\\\\\\\\\\\\--------->
            <div id="loginbg" >   
                <div class="loginbox">  
                    <form method="post" id="loginform" action="../controller/loginController.php?status=login">
                        <div class="card bg-transparent" id="boxfeder">
                        <h1 style="margin-left: 120px;font-family: pacifico Regular" >Welcome</h1>
                        <!--validation on form side--> 
                        <div class="row">
                        <div class="col-md-12">
                        <div id="alertmsg" ></div>
                        </div>
                        </div>
                        <!--validation on sever side-->
                            <?php
                            if(isset($_GET["msg"])) {
                            $msg=  base64_decode($_GET["msg"]);
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger" >
                                    <h6> <?php echo $msg; ?> </h6>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        <label for="username" style="margin-left: 50px">Username:</label>
                        <div class="textbox "> 
                            <span class="fas fa-user fa-1x" ></span>
                            <input class="bord" type="email"  placeholder="Type your username" id="uname" name="uname"> 
                        </div>
                        <label for="password" style="margin-left: 50px">Password:</label>
                         <div class="textbox">
                            <span class="fas fa-lock fa-1x" ></span>
                            <input type="password" placeholder="Type your password" id="pswd" name="pswd">
                         </div>
                        <input  type="submit" name="submit" value="Login">
                        <span><a href="account_recover.php" id="rpsw" style="text-decoration:none;color:blue;margin-left:50px;padding-bottom:50px;">Forgot My Password</a></span>
                        </div>          
                    </form>
                </div>       
            </div>
            <!------------//////////// end \\\\\\\\\\\\\\\\\\\\\\\\\\--------->
       </div>   
    </div>
</body>
<!-- including js --> 
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../js/popper.min.js"></script>   
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<script type="text/javascript" src="../js/Login_Validation.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".textbox").click(function(){
          $("span").addClass("input.focus");
        });
    });
</script>    
</html>      
