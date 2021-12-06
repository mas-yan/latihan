<?php 

//mengaktifkan session
session_start();

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
		<title>halaman staff</title>
	</head>
	<body>
		<h2>selamat datang <?= $_SESSION['nama']; ?></h2>
	<p>Halo <strong><?= $_SESSION['nama']; ?>.</strong>Anda telah login sebagai <strong><?= $_SESSION['level']; ?></strong></p>
	<ul>
		<li><a href="master_barang.php">master barang</a></li>
	</ul>
	<ul>
			<li><a href="data_barang.php">data barang</a></li>
	</ul>
	<ul>
		<li><a href="barang_masuk.php">barang masuk</a></li>
	</ul>
	<a href="logout.php">keluar</a>
	</body>
	</html>
	<?php
}else{
?>
<script type="text/javascript">
	alert('anda belum login silahkan login dahulu');
	document.location='index.php';
</script>
<?php } ?>