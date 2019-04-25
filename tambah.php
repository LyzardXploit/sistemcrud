<?php 
require 'functions.php';
//cek apakah tombol sudah di tekan atau belum
if( isset($_POST["submit"])){
// var_dump($_POST); die;
	// cek apakah data berhasil ditambahkan atau tidak
 	if( tambah($_POST) > 0 ) {
 		echo "
				<script>
				alert('data berhasil ditambahkan!');
				document,location.href = 'index.php';
				</script>
 			";
 	}else {
 		echo "<script>
				alert('data gagal ditambahkan!');
				document,location.href = 'index.php';
				</script>";
 	}
	}
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
		<li><a href="">Control Admin</a></li>
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
		<span class="span">Form Input Data Siswa</span>
			<form action="" method="POST" enctype="multipart/form-data">
				<input type="text" name="nisn" id="nisn" placeholder="Masukan NISN"><br>
				<input type="text" name="nama" id="nama" placeholder="Nama Lengkap"><br>
				<input type="text" name="tempatLahir" id="tempatLahir" placeholder="Tempat Lahir"><br>
				<input type="text" name="email" id="email" placeholder="email"><br>
				<select name="jurusan" id="jurusan">
					<option>--Pilih Jurusan--</option>
					<option value="tkj">TKJ</option>
					<option value="otkp">OTKP</option>
					<option value="akl">AKL</option>
					<option value="tkr">TKR</option>
				</select><br>
				<input type="file" name="gambar" id="gambar"> 
				<br>
				<br>
				<button type="submit" name="submit" value="simpan data!">Tambah Data!</button>
			</form>
	</div>
</div>
</body>
</html>
