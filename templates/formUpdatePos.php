<html>
	<head>
		<title>
		Update Pos
		</title>
	</head>
	<body>
		<h1>Update Pos</h1>
		<?php
			$nm = $_GET['nama'];
			$ln = $_GET['lonlat'];
			$ds = $_GET['desa'];
			$kc = $_GET['kec'];
			$kb = $_GET['kab'];
			$png = $_GET['pengamat'];
		?>
		<form method="POST" action="/updatePos/<?php echo $nm ?>">
			<table>
				<tr>
					<td>Lonlat</td>
					<td>:</td>
					<td><input type="text" name="lonlat" value="<?php echo $ln ?>"/></td>
				</tr>
				<tr>
					<td>Desa</td>
					<td>:</td>
					<td><input type="text" name="desa" value="<?php echo $ds ?>"/></td>
				</tr>
				<tr>
					<td>Kec</td>
					<td>:</td>
					<td><input type="text" name="kec" value="<?php echo $kc ?>"/></td>
				</tr>
				<tr>
					<td>Kab</td>
					<td>:</td>
					<td><input type="text" name="kab" value="<?php echo $kb ?>"/></td>
				</tr>
				<tr>
					<td>Pengamat</td>
					<td>:</td>
					<td><input type="text" name="pengamat" value="<?php echo $png ?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="Update"/></td>
				</tr>
			</table>
			<a href="/formPos">Back</a>
		</form>
	</body>
</html>