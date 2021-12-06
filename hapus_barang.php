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

	function hapus($id){
		global $conn;

		mysqli_query($conn,"DELETE FROM barang WHERE id = $id ");
		return mysqli_affected_rows($conn);
	}

	$id = $_GET['id'];

	if (hapus($id) > 0) {
		?>
<script type="text/javascript">
	alert('data berhasil di hapus');
	document.location='data_barang.php';
</script>
<?php
}else{
	?>
<script type="text/javascript">
	alert('data berhasil di hapus');
	document.location='data_barang.php';
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