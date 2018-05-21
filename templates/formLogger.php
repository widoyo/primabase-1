<html>
	<head>
		<title>
		Form Logger
		</title>
	</head>
	<body>
		<h1>Form Logger</h1>
		<table id="logger" border="1" width="50%">
			<thead>
				<th>SN</th>
				<th>Aksi</th>
			</thead>
		</table>
		<br/>
		<a href="/formInsertLogger">Tambah Data</a><br/>
		<a href="/home">Home</a>
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script type="text/javascript">
			$.ajax({
				url: '/showLogger',
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
				$("#logger").append(row); 
				row.append($("<td>" + rowData.sn + "</td>"));
				row.append($("<td><a href='/formUpdateLogger?sn="+rowData.sn+"'>Edit</a> ||<a href='/hapusLogger/"+rowData.sn+"'>Hapus</a></td>"));
			}
		</script>
	</body>
</html>