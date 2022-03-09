<?php
include '../includes/navbar.php'; //include navbar
include '../includes/fusioncharts.php';//include fusion chart
include '../model/Dashboard_Model.php';///include dashboard model
include_once '../includes/redirect.php';///include redirect

$DashboardObj = new dashboard();//////create dashboard object
$result = $DashboardObj->getCountOrderPlace();///get order place count
$row = $result->fetch_assoc();///make as an array value
$orderCount = $row['orderCount'];///get array value

$result1 = $DashboardObj->getCountAvailableStock();//get available stock count
$row1 = $result1->fetch_assoc();///make as an array value
$stockCount = $row1['stockCount'];//get array value
$result2 = $DashboardObj->getAllRevanue();//get all revanue
$row2 = $result2->fetch_assoc();///make as an array value
$allRevanue= $row2['AllRevanue'];///get array value
$result3 = $DashboardObj->getAllDelivered();//get all revanue
$row3 = $result3->fetch_assoc();///make as an array value
$allDelivered= $row3['deliveredCount'];///get array value 
?>
<script type="text/javascript" src="../fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="../fusioncharts/js/themes/fusioncharts.theme.fusion.js"></script>  
<div class="d-flex">
<div class="row">&nbsp;</div>
</div>
<!-----////////////////card\\\\\\\\\\\\\\\\\\\\\\\\\----->
<div class="d-flex">
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<div class="card">
    <div id="customerbg">
    <div class="card-body">
       <div class="d-flex">
           <p>STOCK</p>
        <i class="fas fa-chart-pie fa-3x" style="margin-left: 80px"></i>
        </div>   
        <h3>
        <?php  echo $stockCount; ?>
        </h3> 
    </div>
    </div>
</div>   
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<div class="card">
    <div id="incomebg">
    <div class="card-body">
        <div class="d-flex">
            <p>ORDER PLACE</p>
        <i class="far fa-comments fa-3x" style="margin-left: 40px"></i>
        </div>
        <h3>
        <?php  echo $orderCount; ?>
        </h3>   
    </div>
    </div>
</div>   
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<div class="card" >
    <div id="orderbg">
        <div class="card-body ">  
        <div class="d-flex">
            <p>DELIVERED</p>
        <i class="fas fa-shopping-cart fa-3x" style="margin-left: 80px"></i>
        </div>
        <h3>
        <?php  echo $allDelivered; ?>
        </h3> 
        </div>
    </div>    
</div> 
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<div class="card">
    <div id="deliverbg">
    <div class="card-body">
        <div class="d-flex">
            <p>REVENUE (Rs)</p>
        <i class="fas fa-money-check-alt fa-3x" style="margin-left: 70px"></i>
        </div>
        <h3>
        <?php  echo $allRevanue; ?>
        </h3> 
    </div>
    </div>
</div>  
</div>
</div>
<!--------////////////////top card end\\\\\\\\\\\\\\\\\\\\\--------->
<div >&nbsp;</div>
<!-----////////////////////chart\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-------->
<div class="d-flex">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div id="chart-container1"></div>
        </div>
    </div>  
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div id="chart-container2"></div>
        </div>
    </div> 
</div>
</div>
<div >&nbsp;</div>
<div class="d-flex">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div id="chart-container3"></div>
        </div>
    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div id="chart-container4"></div>
        </div>
    </div>
</div>
</div>
<div class="d-flex">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="card-body">
            <div id="chart-container5"></div>
        </div>
    </div>
</div>

</div>
<div >&nbsp;</div>
<!------//////////////////chart end\\\\\\\\\\\\\\\\\\\\\\\\\\\\------->
<!------/////////////////including js\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
<script type="text/javascript">
    $(function() {
    $.ajax({
    url: "../controller/DashboardController.php?status=barchartdata",
    type: "GET",
    success: function(data) {
			let popularityChart = new FusionCharts({
            type: 'mscolumn2d',
            renderAt: 'chart-container1',
            width: '100%',
            height: '390',
            dataFormat: 'json',
            dataSource: {
            chart: {
                theme: "fusion",
                caption: "Last Week Order Request",
                xAxisname: "Day",
                yAxisName: "Count",
                numberPrefix: " ",
                plotFillAlpha: "80",
                divLineIsDashed: "1",
                divLineDashLen: "1",
                divLineGapLen: "1",
                rotatevalues: "1",
                    },
                    categories: [
                        {
                            category: data[0]
                        }
                    ], 
                    dataset: [
                        {
                            seriesname: "Order",
                            data: data[1]
                        },
                        {
                            seriesname: "Shipped",
                            data: data[2]
                        },
                        {
                            seriesname: "Delivered",
                            data: data[3]
                        }
                        ]
                    }
                }).render();
            }
        })
    });

    $(function() {
    $.ajax({
    url: "../controller/DashboardController.php?status=linechartdata",
    type: "GET",
    success: function(data) {
			let popularityChart = new FusionCharts({
            type: 'msline',
            renderAt: 'chart-container2',
            width: '100%',
            height: '390',
            dataFormat: 'json',
            dataSource: {
                    chart: {
                        theme: "fusion",
                        caption: "Last Week Sale Revenue",
                        xAxisName: "Day",
                        yaxisname: " Revenues (Rs)",
                        showValues: "0",
                        numbersuffix: "",
                        drawCrossLine: "1",
                        crossLineAlpha: "100",
                        crossLineColor: "#cc3300"
                    },
                    categories: [
                        {
                            category: data[0]
                        }
                    ], 
                    dataset: [
                        {
                            seriesname: "Online",
                            data: data[1]
                        },
                        {
                            seriesname: "POS",
                            data: data[2]
                        }
                        
                        ]
                    }
                }).render();
            }
        })
    });

    $(function() {
    $.ajax({
    url: "../controller/DashboardController.php?status=areachart",
    type: "GET",
    success: function(data) {
        // console.log(data)
			let popularityChart = new FusionCharts({
                type: "mssplinearea", 
                renderAt :"chart-container3",
                width: "100%",
                height: "900%",
                dataFormat: "json",
                dataSource: {
                        chart: {
                        caption: "Current Year Revenue",
                        yaxisname: "Revenue(Rs)",
                        numbersuffix: "",
                        yaxismaxvalue: "2",
                        theme: "fusion"
                },
                categories: [
                        {
                            category: data[0]
                        }
                ],
                dataset: [
                        {
                            seriesname: "Online",
                            data: data[1]
                        },
                        {
                            seriesname: "POS",
                            data: data[2]
                        }
                        
                        ]
                    }
                }).render();
            },
            error:function(data){
                        console.error(data);
                    }
        })
    });
    $(function() {
    $.ajax({
    url: "../controller/DashboardController.php?status=piechart",
    type: "GET",
    success: function(data) {
       
			let popularityChart = new FusionCharts({
            type: 'pie2d',
            renderAt: 'chart-container4',
            width: '550',
            height: '380',
            dataFormat: 'json',
            dataSource: {
                chart: {
                    caption: "Average Product Category",
                    showlegend: "1",
                    showpercentvalues: "1",
                    legendposition: "bottom",
                    usedataplotcolorforlabels: "1",
                    theme: "fusion"
                },
                data: data[0],
            }
            }).render();
            },
            error:function(data){
                console.error(data);
            }
        })
    });

    FusionCharts.ready(function(){
		var chartObj = new FusionCharts({
        type: 'mscolumn2d',
        renderAt: 'chart-container5',
            width: '100%',
            height: '390',
            dataFormat: 'json',
        dataSource: {
        "chart": {
            "theme": "fusion",
            "caption": "Result of user evaluation question",
            "plotFillAlpha": "80",
            "divLineIsDashed": "1",
            "divLineDashLen": "1",
            "divLineGapLen": "1"
        },
        "categories": [{
            "category": [{
                "label": "System navigation"
            }, {
                "label": "Color combination"
            }, {
                "label": "Interface icon size"
            }, {
                "label": "Overal reaction"
            }, {
                "label": "Easy use"
            }, {
                "label": "Notification of error message"
            }, {
                "label": "Response time"
            }, {
                "label": "Character reliability"
            }]
        }],
            "dataset": [{
                "seriesname": "very good",
                "data": [{
                    "value": "4"
                }, {
                    "value": "0"
                }, {
                    "value": "4"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "4"
                }, {
                    "value": "0"
                }, {
                    "value": "3"
                }]
            }, {
                "seriesname": "good",
                "data": [{
                    "value": "0"
                }, {
                    "value": "2"
                }, {
                    "value": "1"
                }, {
                    "value": "3"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "2"
                }]
            }, {
                "seriesname": "moderate",
                "data": [{
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "2"
                }, {
                    "value": "0"
                }, {
                    "value": "2"
                }, {
                    "value": "0"
                }]
            }, {
                "seriesname": "bad",
                "data": [{
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }]
            }, {
                "seriesname": "very bad",
                "data": [{
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }, {
                    "value": "0"
                }]
            }],
               
    }
});
			chartObj.render();
		});
 </script> 
<!-----/////////////////Content End\\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
</div>
<!----/////////////////Flud End\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
</div>
</div>