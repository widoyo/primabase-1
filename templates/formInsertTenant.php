<html>
	<head>
		<title>
		Insert Tenant
		</title>
	</head>
	<body>
		<h1>Insert Tenant</h1>
		<form method="POST" action="/insertTenant">
			<table>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="name"/></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><input type="text" name="addr"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="Insert"/></td>
				</tr>
			</table>
			<a href="/formTenant">Back</a>
		</form>
	</body>
</html>