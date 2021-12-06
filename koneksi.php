<?php 

$conn = mysqli_connect("localhost","root","","peminjaman");

if ($conn) {
	echo "";
}else{
	echo "gagl terhubung kedalam database";
}

 ?>