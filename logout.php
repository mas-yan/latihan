<?php 

//mengaktifkan session
session_start();

//jika user belum login
if (isset($_SESSION['user'])) {
	
//menghapus semua session
session_destroy();
echo "<script>
alert('anda berhasil keluar');
	document.location='index.php';
</script>";

}else{
?>
<script type="text/javascript">
	alert('anda belum login silahkan login dahulu');
	document.location='index.php';
</script>
<?php } ?>