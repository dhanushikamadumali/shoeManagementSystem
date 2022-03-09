<?php
include '../model/Collection_Model.php';///include collection model

$colleObj = new collection();///create collection object

$status = $_REQUEST["status"];
switch ($status){
  case "add_collection":///for add collection
       
        try{
            $CollName = $_POST["Collection_name"];//get collection name
            if ($CollName ==""){//if not collection name
                throw new Exception("collection name can't be empty ");
            }
            $Collsts = $colleObj->addCollection($CollName,1);///pass collection name to module
            $msg= "successfully inserted collection " .$CollName;/////msg variable create
            $msg = base64_encode($msg);////maesage encode
            ?>
            <!-- riderected -->
            <script>window.location ="../view/product.php?msg=<?php echo $msg ;?>"</script>
            <?php
            
        } catch (Exception $ex) {////////catch exeptionn
            $error =$ex->getMessage();/////////get message value
            $error = base64_encode($error);////message encode
            ?>
            <!-- riderected -->
            <script>window.location ="../view/product.php?error=<?php echo $error ;?>"</script>
            <?php
            }
        break;
        
        
       
}


