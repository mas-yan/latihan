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
	if (isset($_POST['tambah'])) {
		?>
		<script type="text/javascript">
			alert('data barang berhasil di inputkan');
			document.location='staff.php';
		</script>
		<?php

		$kd = $_POST['kd'];
		$nama = $_POST['nama'];
		$jenis = $_POST['jenis'];
		$gambar = $_POST['gambar'];

		$sql = "INSERT INTO barang VALUES
		        ('','$kd','$nama','$jenis','','$gambar')";
		$qry = mysqli_query($conn,$sql);
	}else{
	?>
	<script type="text/javascript">
		alert("data buku gagal di inputkan");
		document.location="staff.php";
	</script>

	<?php
    }
}else{
?>
<script type="text/javascript">
	alert('anda belum login silahkan login dahulu');
	document.location='index.php';
</script>
<?php } ?>