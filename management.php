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

	//mengambil data dari database
	$qry = mysqli_query($conn,"SELECT * FROM user");
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>management</title>
	</head>
	<body>
		<h3 align="center">Info User</h3>
		<a href="tambah_user.php">tambah users</a>
		<table align="center" border="1" cellpadding="15" cellspacing="0">
		<thead>
			<tr>
				<th>nama</th>
				<th>user</th>
				<th>level</th>
				<th>action</th>
			</tr>
			</thead>
			<tbody>
				<?php
				while ($row = mysqli_fetch_assoc($qry)):?>
				 <tr>
				 	<td><?= $row['nama']; ?></td>
				 	<td><?= $row['user']; ?></td>
				 	<td><?= $row['level']; ?></td>
				 	<td><a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin ingin menghapus');" >hapus</a></td>
				 </tr>
				<?php endwhile ?>
			</tbody>
		</table>
		<a href="admin.php">kembali</a>
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