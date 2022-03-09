<?php
if (isset($_REQUEST["status"])){//////if have value request status
    include '../model/Dashboard_Model.php';//////include user model
    $DashboardObj = new dashboard();//////create object
    $status = $_REQUEST["status"];
    switch ($status){ 
      case "barchartdata":

        $data[0] = array();
        $data[1] = array();
        $data[2] = array();
        $data[3] = array();
        $getweeklydate = $DashboardObj->getWeeklydate();
        while($dateResult = $getweeklydate->fetch_assoc()) {
          //  echo $invoicedate = $dateResult['invoice_date'];  
            $date = array();
            $order = array();
            $shipped = array(); 
            $dilivery = array();
            
            $date['label'] = $dateResult['weeklyday'];
            array_push($data[0], $date);

            $getorder = $DashboardObj->getWeeklyOrder($dateResult['invoice_date']);
            $orderResult = $getorder->fetch_assoc();

            if($orderResult['allorder']==null){
              $order['value'] = 0;

            }else{
              $order['value'] = $orderResult['allorder'];
            }
            array_push($data[1],$order);

            $getshipped = $DashboardObj->getWeeklyShipped($dateResult['invoice_date']);
            $shippedResult = $getshipped->fetch_assoc();

            if($shippedResult['shipped']==null){
              $shipped['value'] = 0;

            }else{
              $shipped['value'] = $shippedResult['shipped'];

            }
            array_push($data[2],$shipped);

            $getdelivery = $DashboardObj->getWeeklyDilivery($dateResult['invoice_date']);
            $deliveryResult = $getdelivery->fetch_assoc();

            if($deliveryResult['successdelivery']==null){
              $dilivery['value'] = 0;

            }else{
              $dilivery['value'] = $deliveryResult['successdelivery'];

            }
            array_push($data[3],$dilivery);
       
          }
        header('Content-type: application/json');
        echo json_encode($data);
        break;

      case "linechartdata":
        
          $data[0] = array();
          $data[1] = array();
          $data[2] = array();
          $getweeklydate = $DashboardObj->getWeeklydate();
          while($dateResult = $getweeklydate->fetch_assoc()) {
            //  echo $invoicedate = $dateResult['invoice_date'];
              $date = array();
              $online = array();
              $genaral = array();   
              
              $date['label'] = $dateResult['weeklyday'];
              array_push($data[0], $date);

              $getonline = $DashboardObj->getWeeklyonlineRevanue($dateResult['invoice_date']);
              $onlineResult = $getonline->fetch_assoc();

              if($onlineResult['OnlineRevanue']==null){
                $online['value'] = 0;

              }else{
                $online['value'] = $onlineResult['OnlineRevanue'];

              }
              array_push($data[1],$online);

              $getgenaral = $DashboardObj->getWeeklygenaralRevanue($dateResult['invoice_date']);
              $genaralResult = $getgenaral->fetch_assoc();

              if($genaralResult['genaralRevanue']==null){
                $genaral['value'] = 0;

              }else{
                $genaral['value'] = $genaralResult['genaralRevanue'];

              }
              array_push($data[2],$genaral);
          
            }
          header('Content-type: application/json');
          echo json_encode($data);
          break;
        
      case "areachart":
        
        $data[0] = array();
        $data[1] = array();
        $data[2] = array();
        $getmonthly = $DashboardObj->getCurrentYearMonth();
        while($dateResult = $getmonthly->fetch_assoc()) {
          //  echo $invoicedate = $dateResult['invoice_date'];
            $date = array();
            $online = array();
            $genaral = array();   
            
            $date['label'] = $dateResult['invoicedate'];
            array_push($data[0], $date);

            $getonline = $DashboardObj->getyearonlineRevanue($dateResult['invoice_date']);
            $onlineResult = $getonline->fetch_assoc();

            if($onlineResult['OnlineRevanue']==null){
              $online['value'] = 0;

            }else{
              $online['value'] = $onlineResult['OnlineRevanue'];

            }
            array_push($data[1],$online);

            $getgenaral = $DashboardObj->getyeargenaralRevanue($dateResult['invoice_date']);
            $genaralResult = $getgenaral->fetch_assoc();

            if($genaralResult['genaralRevanue']==null){
              $genaral['value'] = 0;

            }else{
              $genaral['value'] = $genaralResult['genaralRevanue'];
            }
            array_push($data[2],$genaral); 
            }
        header('Content-type: application/json');
        echo json_encode($data);
      break;
           
      case "piechart":
        
        $data[0] = array();

        $getmonthly = $DashboardObj->getCattype();
        while($dateResult = $getmonthly->fetch_assoc()) {
        
            $date = array();
          
            $date['label'] = $dateResult['category_name'];
            $date['value'] = $dateResult['countp'];
            array_push($data[0], $date);

        }
        header('Content-type: application/json');
        echo json_encode($data);
      break;
           
    }   

}
