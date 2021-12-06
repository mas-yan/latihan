<?php 

//mengaktifkan session
session_start();

//jika user belum login
//jika user belum login
if (isset($_SESSION['user'])) {
	
	//jika bukan admin mengakses halaman ini
	if ($_SESSION['level'] != 'staff') {
		die('anda bukan staff');
	}
	?>
	
	<!DOCTYPE html>
	<html>
	<head>
		<title>input barang</title>
	</head>
	<body>
		<form action="input.php" method="post" onsubmit="return validasi()">
			<h2 align="center">master barang</h2>
			<table cellspacing="5" cellpadding="10" align="center">
				<tr>
					<td>
						kode barang
					</td>
					<td>
						<input type="text" name="kd" id="kd" title="kode barang"></input>
					</td>
				</tr>
				<tr>
					<td>
						nama barang
					</td>
					<td>
						<input type="text" name="nama" id="nama" title="nama barang"></input>
					</td>
				</tr>
				<tr>
					<td>
						jenis barang
					</td>
					<td>
						<input type="text" name="jenis" id="jenis" title="jenis barang"></input>
					</td>
				</tr>
				<tr>
					<td>
						gambar
					</td>
					<td>
						<input type="file" name="gambar" id="gambar" title="gambar"></input>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="tambah" value="submit" title="input"></input>
					</td>
					<td>
						<input type="reset" title="reset"></input>
					</td>
				</tr>
			</table>
			<a href="staff.php">kembali</a>
		</form>
	</body>
	<script type="text/javascript">
	    function validasi() {
		var kd = document.getElementById('kd').value;
		var nama = document.getElementById('nama').value;
		var jenis = document.getElementById('jenis').value;
		var gambar = document.getElementById('gambar').value;

		if (kd != '' && nama != '' && jenis != '' && gambar != '') {
			return true;
		}else{
			alert('bidang tidak boleh kosong');
			return false;
		}
	}
	</script>
	</html>
	<?php
}else{
?>
<script type="text/javascript">
	alert('anda belum login silahkan login dahulu');
	document.location='index.php';
</script>
<?php } ?>