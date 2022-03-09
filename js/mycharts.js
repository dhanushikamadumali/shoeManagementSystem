$(document).ready(function (e) {
  ///// 1st Chart (Raw Bloods) /////
  var myChart = document.getElementById("myChart").getContext("2d");

  function Chart1_ajax() {
    TotalBlood_data2020 = [];
    AcceptBlood_data2020 = [];
    RejectBlood_data2020 = [];

    $.ajax({
      url:
        "/Blood_Donor_System/controller/Data_controller.php?status=get_RawBloodData",
      dataType: "JSON",
      type: "GET",
      success: function (res) {
        if (res[0][0] != "Error") {
          for (i = 1; i <= 12; i++) {
            TotalBlood_data2020.push(res[0][5][i]);
          }
        }

        if (res[1][0] != "Error") {
          for (i = 1; i <= 12; i++) {
            AcceptBlood_data2020.push(res[1][5][i]);
          }
        }

        if (res[2][0] != "Error") {
          for (i = 1; i <= 12; i++) {
            RejectBlood_data2020.push(res[2][5][i]);
          }
        }
      },
    });
  }

  /*setInterval(function(){
	
TotalBlood_data2020 = [];
AcceptBlood_data2020 = [];
RejectBlood_data2020 = [];	
	
$.ajax({
	url:"/Blood_Donor_System/controller/Data_controller.php?status=get_RawBloodData",
	dataType:"JSON",
	type:'GET',
	success: function(res){
		if(res[0][0] != "Error"){
			
			for(i=1;i<=12;i++){
				TotalBlood_data2020.push(res[0][5][i]);
				}
			
			}
			
		if(res[1][0] != "Error"){
			
			for(i=1;i<=12;i++){
				AcceptBlood_data2020.push(res[1][5][i]);
				}
			
			}
			
		if(res[2][0] != "Error"){
			
			for(i=1;i<=12;i++){
				RejectBlood_data2020.push(res[2][5][i]);
				}
			
			}	
			
		}
		
});	
	
},59*1000);*/

  function Chart_1() {
    var rowblood = new Chart(myChart, {
      type: "bar", // pie, line, horizontalBar, daoughnut, radar, polarArea
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        datasets: [
          {
            label: "Total Row Blood",
            data: TotalBlood_data2020, //[56,162,167,97,203,136,128,104,100,135,116,99]
            backgroundColor: "#00F",
            borderWidth: 1,
            borderColor: "rgb(0, 0, 255)",
            hoverBorderColor: "rgb(0 , 0, 255)",
          },
          {
            label: "Accepted Blood Count",
            data: AcceptBlood_data2020, //[102,148,95,125,87,166,68,72,141,170,130,108,120]
            backgroundColor: "#0C0",
            borderWidth: 1,
            borderColor: "#0C0",
            hoverBorderColor: "#0C0",
          },
          {
            label: "Rejected Blood Count",
            data: RejectBlood_data2020, //[108,118,95,135,100,106,112,119,105,105,97,120,118],
            backgroundColor: "#F00",
            borderWidth: 1,
            borderColor: "#F00",
            hoverBorderColor: "#F00",
          },
        ],
      },
      options: {
        title: {
          display: true,
          text: "Row Bloods",
          fontSize: 20,
        },
        scales: {
          xAxes: [
            {
              display: true,
              scaleLabel: {
                display: true,
                labelString: "Month",
              },
            },
          ],
          yAxes: [
            {
              display: true,
              scaleLabel: {
                display: true,
                labelString: "Bags Count",
              },
            },
          ],
        },
        responsive: true,
        maintainAspectRatio: false,
      },
    });
  }

  ///// 2nd Chart (Inventory) /////
  var myChart2 = document.getElementById("myChart2").getContext("2d");

  function Chart2_ajax() {
    AddedBlood_data2020 = [];
    IssuedBlood_data2020 = [];
    ExpiredBlood_data2020 = [];

    $.ajax({
      url:
        "/Blood_Donor_System/controller/Data_controller.php?status=get_InventoryData",
      dataType: "JSON",
      type: "GET",
      success: function (res) {
        if (res[0][0] != "Error") {
          for (i = 1; i <= 12; i++) {
            AddedBlood_data2020.push(res[0][5][i]);
          }
        }

        if (res[1][0] != "Error") {
          for (i = 1; i <= 12; i++) {
            IssuedBlood_data2020.push(res[1][5][i]);
          }
        }

        if (res[2][0] != "Error") {
          for (i = 1; i <= 12; i++) {
            ExpiredBlood_data2020.push(res[2][5][i]);
          }
        }
      },
    });
  }

  /*setInterval(function(){
	
AddedBlood_data2020 = [];
IssuedBlood_data2020 = [];
ExpiredBlood_data2020 = [];	
	
$.ajax({
	url:"/Blood_Donor_System/controller/Data_controller.php?status=get_InventoryData",
	dataType:"JSON",
	type:'GET',
	success: function(res){
		if(res[0][0] != "Error"){
			
			for(i=1;i<=12;i++){
				AddedBlood_data2020.push(res[0][5][i]);
				}
			
			}
			
		if(res[1][0] != "Error"){
			
			for(i=1;i<=12;i++){
				IssuedBlood_data2020.push(res[1][5][i]);
				}
			
			}
			
		if(res[2][0] != "Error"){
			
			for(i=1;i<=12;i++){
				ExpiredBlood_data2020.push(res[2][5][i]);
				}
				
			
			}	
			
	   }

});
	
},59*1000);*/

  function Chart_2() {
    var inventory = new Chart(myChart2, {
      type: "line",
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        datasets: [
          {
            label: "Added Blood",
            fill: false,
            data: AddedBlood_data2020, //[140,162,167,97,203,136,128,104,100,129,116,99],
            backgroundColor: "rgba(167, 45, 38)",
            borderWidth: 1,
            borderColor: "rgba(167, 45, 38)",
            hoverBorderColor: "",
          },
          {
            label: "Issued Blood",
            fill: false,
            data: IssuedBlood_data2020, //[102,148,95,125,87,166,68,72,141,280,130,108,120],
            backgroundColor: "rgba(194, 85, 238)",
            borderWidth: 1,
            borderColor: "rgba(43, 255, 56)",
            hoverBorderColor: "",
          },
          {
            label: "Expired Blood",
            fill: false,
            data: ExpiredBlood_data2020, //[13,24,18,36,20,20,34,28,41,28,30,18,20],
            backgroundColor: "rgba(105, 105, 68)",
            borderWidth: 1,
            borderColor: "rgba(105, 105, 68)",
            hoverBorderColor: "",
          },
        ],
      },
      options: {
        title: {
          display: true,
          text: "Inventory",
          fontSize: 20,
        },
        scales: {
          xAxes: [
            {
              display: true,
              scaleLabel: {
                display: true,
                labelString: "Month",
              },
            },
          ],
          yAxes: [
            {
              display: true,
              scaleLabel: {
                display: true,
                labelString: "Bags Count",
              },
            },
          ],
        },
        responsive: true,
        maintainAspectRatio: false,
      },
    });
  }

  var myChart3 = document.getElementById("myChart3").getContext("2d");

  function Chart3_ajax() {
    labels_array = [];
    data_array = [];

    $.ajax({
      url: "../controller/Data_controller.php?status=get_CurrentRawBloodData",
      type: "GET",
      dataType: "JSON",
      success: function (res) {
        for (i = 0; i < res.length; i++) {
          if (res[i][1] == null) {
            continue;
          }
          labels_array.push(res[i][0]);
          data_array.push(res[i][1]);
        }
      },
    });
  }

  function Chart_3() {
    var other = new Chart(myChart3, {
      type: "pie",
      data: {
        labels: labels_array, //['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'],
        datasets: [
          {
            label: "Added Blood",
            data: data_array, //[30,20,40,25,18,10,23,18],
            backgroundColor: [
              "#930",
              "#FC0",
              "#FF0",
              "#06F",
              "#4C0",
              "#33C",
              "#966",
              "#666",
            ],
            borderWidth: 1,
            borderColor: "",
            hoverBorderColor: "",
          },
        ],
      },
      options: {
        title: {
          display: true,
          text: "Current Raw Blood Stock",
          fontSize: 17,
        },
        responsive: true,
        maintainAspectRatio: false,
      },
    });
  }

  Chart1_ajax();
  Chart2_ajax();
  Chart3_ajax();

  setInterval(function () {
    Chart1_ajax();
    Chart2_ajax();
    Chart3_ajax();
  }, 59 * 1000);

  setTimeout(function () {
    Chart_1();
    Chart_2();
    Chart_3();
  }, 1000);

  setInterval(function () {
    Chart_1();
    Chart_2();
    Chart_3();
  }, 60 * 1000);
});
