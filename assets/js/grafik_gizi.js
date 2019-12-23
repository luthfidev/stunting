$(document).ready(function(){
	$.ajax({
		url : "http://localhost/stunting/api/api_grafik.php",
		type : "GET",
		success : function(data){
			console.log(data);
			
			var tgl = [];
			var baiks = [];
			var buruks = [];

			for (var i in data) {
				tgl.push(data[i].tanggal);
				baiks.push(data[i].baik);
				buruks.push(data[i].buruk);
			}

			var chartdata = {
				labels: tgl,
				datasets: [
					{
						label: "baik",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: baiks
					},
					{
						label: "buruk",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: buruks
					}
				]
			};

			var ctx = $("#chartcanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});

		},
		error : function(data){

		}
	});
});