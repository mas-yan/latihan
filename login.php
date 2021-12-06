<?php 

//mengaktifkan session
session_start();

//memanggil koneksi
include 'koneksi.php';

//menangkap data yg di masukkan
$user = $_POST['user'];
$pass = $_POST['pass'];

//mengambil data dari database
$qry = mysqli_query($conn,"SELECT * FROM user WHERE user = '$user' AND password = '$pass' ");

//cek data yg di temukan
$cek = mysqli_num_rows($qry);

//cek apakah data yg di masukkan benar
if ($cek > 0) {
	$data = mysqli_fetch_assoc($qry);
	$_SESSION['nama'] = $data['nama'];

	//jika user login sebagai admin
	if ($data['level'] == 'admin') {

		//membuat sesi user
		$_SESSION['user'] = '$user';
		$_SESSION['level'] = 'admin';
	
	//alihkan halaman admin
	header("location:admin.php");

	//jika user login sebagai staff
}elseif ($data['level'] == 'staff') {

		//membuat sesi user
		$_SESSION['user'] = '$user';
		$_SESSION['level'] = 'staff';
	
	//alihkan halaman staff
	header("location:staff.php");

	//jika user login sebagai manager
}elseif ($data['level'] == 'manager') {

		//membuat sesi user
		$_SESSION['user'] = '$user';
		$_SESSION['level'] = 'manager';
	
	//alihkan halaman manager
	header("location:manager.php");

	//jika level salah
}else{
	?>
	<script type="text/javascript">
		alert('level yg di masukkan salah');
		document.location='index.php';
	</script>
	<?php
}

	//jika data yang dimasukkan salah
}else{
	?>
	<script type="text/javascript">
		alert('data yg di masukkan salah');
		document.location='index.php';
	</script>
	<?php

}

 ?>