<!DOCTYPE html>
<html>
<head>
	<title>Input Data</title>
</head>
<body>
	
	<form action="" method="post">
		Nim<br>
		<input type="text" name="nim"><br>
		Nama<br>
		<input type="text" name="nama"><br>
		Alamat<br>
		<input type="text" name="alamat"><br>
		Progdi<br>
		<input type="text" name="progdi"><br>
		<br>
		<input type="submit" name="submit" value="Save"><br>
	</form>
<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
	$nim  	= $_POST['nim'];
	$nama  	=$_POST['nama'];
	$alamat = $_POST['alamat'];
	$progdi = $_POST['progdi'];
	
	$result = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim,nama,alamat,progdi) VALUES('$nim','$nama','$alamat','$progdi')");
	$pesan= "";
	if ($result) {
		$pesan = "Data Saved";
		header("Location:client.php?id=$nim");
	}else{
		$pesan ="Data Failed";
	}

	$response= array('pesan'=>$pesan , 'data'=>$_POST);
}
?>
</body>
</html>
