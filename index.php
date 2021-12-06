<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<form action="login.php" method="post" onsubmit="return validasi()">
	<h2 align="center">login</h2>
		<table align="center" cellpadding="15">
			<tr>
				<td>Username</td>
				<td><input type="text" name="user" id="user" placeholder="masukkan username anda" title="username"></input></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="pass" id="pass" placeholder="masukkan password anda" title="paassword"></input>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="masuk" value="masuk" title="login"></input>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<script type="text/javascript">
	function validasi() {
		
		var user = document.getElementById('user').value;
		var pass = document.getElementById('pass').value;

		if (user != '' && pass != '') {
			return true;
		}else{
			alert('semua bidang harus di isi');
			return false;
		}
	}
</script>