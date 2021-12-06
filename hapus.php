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

	//membuat function
	function hapus($id){
		global $conn;

		$qry = mysqli_query($conn,"DELETE FROM user WHERE id = $id ");
		return mysqli_affected_rows($conn);
	}

	$id = $_GET['id'];

	if (hapus($id) > 0) {
		?>
		<script type="text/javascript">
			alert('berhasil di hapus');
			document.location='management.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert('gagal di hapus');
			document.location='management.php';
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