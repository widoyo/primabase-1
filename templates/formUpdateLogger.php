<html>
	<head>
		<title>
		Update Logger
		</title>
	</head>
	<body>
		<h1>Update Logger</h1>
		<?php
			$sn = $_GET['sn'];
		?>
		<form method="POST" action="/updateLogger/<?php echo $sn ?>">
			<table>
				<tr>
					<td>SN</td>
					<td>:</td>
					<td><input type="text" name="sn" value="<?php echo $sn ?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="Update"/></td>
				</tr>
			</table>
			<a href="/formLogger">Back</a>
		</form>
	</body>
</html>