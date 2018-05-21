<html>
	<head>
		<title>
		Insert Pos
		</title>
	</head>
	<body>
		<h1>Insert Pos</h1>
		<form method="POST" action="/insertPos">
			<table>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama"/></td>
				</tr>
				<tr>
					<td>Lonlat</td>
					<td>:</td>
					<td><input type="text" name="lonlat"/></td>
				</tr>
				<tr>
					<td>Desa</td>
					<td>:</td>
					<td><input type="text" name="desa"/></td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td>:</td>
					<td><input type="text" name="kec"/></td>
				</tr>
				<tr>
					<td>Kabupaten</td>
					<td>:</td>
					<td><input type="text" name="kab"/></td>
				</tr>
				<tr>
					<td>Pengamat</td>
					<td>:</td>
					<td><input type="text" name="pengamat"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="Insert"/></td>
				</tr>
			</table>
			<a href="/formPos">Back</a>
		</form>
	</body>
</html>