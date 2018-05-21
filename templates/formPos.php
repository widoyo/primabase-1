<html>
	<head>
		<title>
		Form Pos
		</title>
	</head>
	<body>
		<h1>Form Pos</h1>
		<table id="pos" border="1" width="50%">
			<thead>
				<th>Nama</th>
				<th>Lonlat</th>
				<th>Desa</th>
				<th>Kecamatan</th>
				<th>Kabupaten</th>
				<th>Pengamat</th>
				<th>Aksi</th>
			</thead>
		</table>
		<br/>
		<a href="/formInsertPos">Tambah Data</a><br/>
		<a href="/home">Home</a>
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script type="text/javascript">
			$.ajax({
				url: '/showPos',
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
				$("#pos").append(row); 
				row.append($("<td>" + rowData.nama + "</td>"));
				row.append($("<td>" + rowData.lonlat + "</td>"));
				row.append($("<td>" + rowData.desa + "</td>"));
				row.append($("<td>" + rowData.kec + "</td>"));
				row.append($("<td>" + rowData.kab + "</td>"));
				row.append($("<td>" + rowData.pengamat + "</td>"));
				row.append($("<td><a href='/formUpdatePos?nama="+rowData.nama+"&lonlat="+rowData.lonlat+"&desa="+rowData.desa+"&kec="+rowData.kec+"&kab="+rowData.kab+"&pengamat="+rowData.pengamat+"'>Edit</a> ||<a href='/hapusPos/"+rowData.nama+"'>Hapus</a></td>"));
			}
		</script>
	</body>
</html>