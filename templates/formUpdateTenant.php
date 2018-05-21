<html>
	<head>
		<title>
		Update Tenant
		</title>
	</head>
	<body>
		<h1>Update Tenant</h1>
		<?php
			$nm = $_GET['name'];
			$ad = $_GET['addr'];
		?>
		<form method="POST" action="/updateTenant/<?php echo $nm ?>">
			<table>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><input type="text" name="addr" value="<?php echo $ad ?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="Update"/></td>
				</tr>
			</table>
			<a href="/formTenant">Back</a>
		</form>
	</body>
</html>