<?php 

//mengaktifkan session
session_start();

//jika user belum login
if (isset($_SESSION['user'])) {
	
	//jika bukan admin mengakses halaman ini
	if ($_SESSION['level'] != 'staff') {
		die('anda bukan staff');
	}
	include 'koneksi.php';
	$qry = mysqli_query($conn,"SELECT * FROM barang");
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>lihat data barang</title>
	</head>
	<body>
		<h2 align="center">data barang</h2>
		<p align="center"><strong>total : <?= mysqli_num_rows($qry) ?></strong></p>
		<table align="center" border="1" cellpadding="10" cellspacing="0">
			<thead>
				<tr>
					<th>image</th>
					<th>kode barang</th>
					<th>nama barang</th>
					<th>jenis barang</th>
					<th>kuantitas</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				while ($row = mysqli_fetch_assoc($qry)):?>
				<tr>
					<td><img src="img/<?= $row["gambar"]; ?>" width="80" height="60"></td>
					<td><?= $row['kode_barang']; ?></td>
					<td><?= $row['nama_barang']; ?></td>
					<td><?= $row['jenis_barang']; ?></td>
					<td><?= $row['kuantitas']; ?></td>
					<td><a href="hapus_barang.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin ingin menghapus?')" >hapus</a> | <a href="edit_barang.php?id=<?= $row['id']; ?>">edit</a></td>
				</tr>
			<?php endwhile ?>
			</tbody>
		</table>
		<a href="staff.php">kembali</a>
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