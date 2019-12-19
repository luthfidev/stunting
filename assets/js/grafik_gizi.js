$(document).ready(function() {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	$.ajax({
		url : "http://localhost/stunting/api/api_grafik.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var score = {
                label : [],
				giziA : [],
				giziB : []
			};

			var len = data.length;

			for (var i = 0; i < len; i++) {
                
				if (data[i].keterangan == "baik") {
					score.giziA.push(data[i].score);
				}
				else if (data[i].keterangan == "buruk") {
					score.giziB.push(data[i].score);
				}
			}

			//get canvas
			var ctx = $("#chartcanvas");

			var data = {
				labels : ["match1", "match2"],
				datasets : [
					{
						label : "TeamA score",
						data : score.giziA,
						backgroundColor : "blue",
						borderColor : "lightblue",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "TeamB score",
						data : score.giziB,
						backgroundColor : "green",
						borderColor : "lightgreen",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					}
				]
			};

			var options = {
				title : {
					display : true,
					position : "top",
					text : "Line Graph",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				}
			};

			var chart = new Chart( ctx, {
				type : "line",
				data : data,
				options : options
			} );

		},
		error : function(data) {
			console.log(data);
		}
	});

});