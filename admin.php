<?php 

//mengaktifkan session
session_start();

//jika user belum login
if (isset($_SESSION['user'])) {
	
	//jika bukan admin mengakses halaman ini
	if ($_SESSION['level'] != 'admin') {
		die('anda bukan admin');
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>halaman admin</title>
	</head>
	<body>
		<h2>Selamat datang <?= $_SESSION['nama'] ?></h2>

		<p>Halo <strong><?= $_SESSION['nama'] ?></strong>. anda telah login sebagai <strong><?= $_SESSION['level'] ?></strong></p>

		<ul>
			<li><a href="management.php">management</li>
		</ul>
		<a href="logout.php" onclick="return confirm('yakin ingin keluar');">keluar</a>
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