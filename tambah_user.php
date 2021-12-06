<?php 

//mengaktifkan session
session_start();

//jika user belum login
if (isset($_SESSION['user'])) {
	
	//jika bukan admin mengakses halaman ini
	if ($_SESSION['level'] != 'admin') {
		die('anda bukan admin');
	}

	//memanggil koneksi
	include 'koneksi.php';

	if (isset($_POST['tambah'])) {
		?>
<script type="text/javascript">
	alert('user berhasil di tambahkan');
	document.location='management.php';
</script>
<?php

	$user = $_POST['user'];
	$nama = $_POST['nama'];
	$pass = $_POST['pass'];
	$level = $_POST['level'];

	$sql = "INSERT INTO user VALUES
	        ('','$user','$nama','$pass','$level')";

	      $qry = mysqli_query($conn,$sql);
	  }
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>input user</title>
	</head>
	<body>
		<table align="center" cellspacing="5" cellpadding="10">
		<form action="" method="post" onsubmit="return validasi()">
			<tr>
				<td>Username</td>
				<td>
					<input type="text" name="user" id="user" title="username" placeholder="masukkan username anda"></input>
				</td>
			</tr>
			<tr>
				<td>password</td>
				<td>
					<input type="text" name="pass" id="pass" title="password" placeholder="masukkan password anda"></input>
				</td>
			</tr>
			<tr>
				<td>nama</td>
				<td>
					<input type="text" name="nama" id="nama" title="nama" placeholder="masukkan nama anda"></input>
				</td>
			</tr>
			<tr>
				<td>
					level
				</td>
				<td>
					<select name="level" id="level" title="level">
						<option value="admin">admin</option>
						<option value="staff">staff</option>
						<option value="admin">manager</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="tambah" value="tambah" title="input"></input>
				</td>
				<td>
					<input type="button" value="kembali" title="back" onclick="location.href='management.php'"></input>
				</td>
			</tr>
		</table>
	</body>
	</html>
	<script type="text/javascript">
		function validasi() {
			var user = document.getElementById('user').value;
			var pass = document.getElementById('pass').value;
			var nama = document.getElementById('nama').value;
			var level = document.getElementById('level').value;

			if (user != '' && pass != '' && nama != '' && level != '') {
				return true;
			}else{
				alert('semua bidang harus di isi!');
				return false;
			}
		}

	</script>
	<?php
}else{
?>
<script type="text/javascript">
	alert('anda belum login silahkan login dahulu');
	document.location='index.php';
</script>
<?php } ?>