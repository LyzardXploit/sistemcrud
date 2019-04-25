<?php 
require 'functions.php';
// ambil data diurl
$id = $_GET["id"];
// query data siswa berdasarkan id
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];
//cek apakah tombol sudah di tekan atau belum
if( isset($_POST["submit"])){

	// cek apakah data berhasil ditambahkan atau tidak
 	if( ubah($_POST) > 0 ) {
 		echo "
				<script>
				alert('data berhasil diubah!');
				document,location.href = 'index.php';
				</script>
 			";
 	}else {
 		echo "<script>
				alert('data gagal diubah!');
				document,location.href = 'index.php';
				</script>";
 	}}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | Admin</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<link rel="stylesheet" type="text/css" href="asset/style.css">
<body>
<nav>
	<ul class="kiri">
		<li><a href="">COntrol Admin</a></li>
	</ul>
	<ul class="kanan">
		<li><a href="">logout</a></li>
		<div style="clear:both"></div>
	</ul>
</nav>
<div class="sidebar">
		<ul>
			<li><a href="home.php">Dashboard</a></li>
			<li><a href="siswa.php">Data Siswa</a></li>
		</ul>
	</div>
<div class="main">
	<div class="isimain">
		<span class="span">Form ubah Data Siswa</span>
			<form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $siswa ["id"]; ?>" >
				<input type="hidden" name="gambarLama" value="<?= $siswa ["gambar"]; ?>" >
				<input type="text" name="nisn" id="nisn" required value="<?= $siswa["nisn"]; ?>" ><br>
				<input type="text" name="nama" id="nama" required value="<?= $siswa["nama"]; ?> " ><br>
				<input type="text" name="tempatLahir" id="tempatLahir" required value="<?= $siswa["tempatLahir"]; ?> " ><br>
				<input type="text" name="email" id="emai" required value="<?= $siswa["email"]; ?> "><br>
				Laki Laki<input type="radio" name="jenisKelamin" id="jenisKelamin" value="Laki-laki">Perempuan<input type="radio" name="jenisKelamin" value="Perempuan"><br>
				<br>
				<select name="jurusan" id="jurusan">
					<option>--Pilih Jurusan--</option>
					<option value="tkj">TKJ</option>
					<option value="otkp">OTKP</option>
					<option value="akl">AKL</option>
					<option value="tkr">TKR</option>
				</select><br> 
				<input type="file" name="gambar" id="gambar" >
				<img src="img/<?= $siswa['gambar']; ?>" width="100"><br>
				 <br>
				<button type="submit" name="submit" value="simpan data!">ubah Data!</button>
			</form>
	</div>
</div>
</body>
</html> 

