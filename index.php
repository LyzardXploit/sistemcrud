<?php
require 'functions.php';
$siswa = query("SELECT * FROM siswa ORDER BY id ");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
$siswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Halaman Admin</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav>
<ul class="kiri">
<li><a href="">ADMIN</a></li>
</ul>
<ul class="kanan">
</ul><div style="clear:both"></div>
</nav>
<div class="sidebar">
<ul>
<li><a href="home.php">Dashboard</a></li>
<li><a href="index.php">Data Siswa</a></li>
</ul>
</div>
<style type="text/css">
td,th{border:1px solid #ccc;padding:10px;}
table{border-collapse:collapse;}
</style>
<div class="main">
<div class="isimain">
<table>
<a href="tambah.php"><input type="submit" value="Tambah Data Siswa"></a> <br>
<div class="cari">
<form action="" method="post">
<input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword pencarian.." autocomplete="off">
<button type="submit" name="cari">cari!</button>
</form>
</div>
	<tr>
		<th>No</th>
		<th>Nisn</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Email</th>
		<th>Jurusan</th>
		<th>Gambar</th>
		<th>Action</th>
	</tr>
	<?php $i = 1; ?>
<?php foreach ($siswa as $row) : ?>
<tr>
<td><?= $i; ?></td>
<td><?= $row["nisn"];?></td>
<td><?= $row["nama"];?></td>
<td><?= $row["tempatLahir"];?></td>
<td><?= $row["email"];?></td>
<td><?= $row["jurusan"];?></td>
<td><img src="img/<?= $row["gambar"]; ?>" width="50" height="50"></td>
<td>
<a href="edit.php?id=<?= $row["id"]; ?>">edit</a> |
<a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin');">hapus</a>
</td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
</body>
</html>
