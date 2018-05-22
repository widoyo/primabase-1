<html>
	<head>
		<title>
		View Periodic
		</title>
	</head>
	<body>
		<h1>View Periodic</h1>
		<table id="periodic" border="1" width="50%">
			<thead>
				<th>Pos ID</th>
				<th>Logger ID</th>
				<th>Sampling</th>
				<th>Wlevel</th>
				<th>Rain</th>
				<th>Temperature</th>
				<th>Humidity</th>
				<th>Altitude</th>
				<th>Battery</th>
				<th>Signal Quality</th>
			</thead>
		</table>
		<br/>
		<a href="/home">Home</a>
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script type="text/javascript">
			$.ajax({
				url: '/showPeriodic',
				type: "get",
				dataType: "json",
			   
				success: function(data) {
					drawTable(data);
				}
			});
			function drawTable(data) {
				for (var i = 0; i < data.length; i++) {
					drawRow(data[i]);
				}
			}
			function drawRow(rowData) {
				var row = $("<tr />")
				$("#periodic").append(row); 
				row.append($("<td>" + rowData.posid + "</td>"));
				row.append($("<td>" + rowData.loggerid + "</td>"));
				row.append($("<td>" + rowData.sampling + "</td>"));
				row.append($("<td>" + rowData.wlevel + "</td>"));
				row.append($("<td>" + rowData.rain + "</td>"));
				row.append($("<td>" + rowData.temperature + "</td>"));
				row.append($("<td>" + rowData.humidity + "</td>"));
				row.append($("<td>" + rowData.altitude + "</td>"));
				row.append($("<td>" + rowData.battery + "</td>"));
				row.append($("<td>" + rowData.signalquality + "</td>"));
			}
		</script>
	</body>
</html>