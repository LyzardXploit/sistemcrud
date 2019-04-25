<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;	
	}
	return $rows;
}
function tambah($data) {
	global $conn;
	$nisn =htmlspecialchars($data["nisn"]);
	$nama = htmlspecialchars($data["nama"]);
	$tempatLahir = htmlspecialchars($data["tempatLahir"]);
	$email = htmlspecialchars($data["email"]);
	$jenisKelamin = htmlspecialchars($data["jenisKelamin"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	// upload gambar 
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}
		//query insert data
	$query = "INSERT INTO sistem_crud
			  VALUES
			  ('', '$nisn', '$nama', '$tempatLahir', '$email', '$jenisKelamin', '$jurusan', '$gambar')
			  ";  
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function upload() {
		$namaFile = $_FILES['gambar']['nama'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		// cek pakah tidak ada gambar yang di upload
		if( $error === 4) {
			echo "<script>
					alert('pilih gambar terlebih dahulu')
					</script>";
					return false;
		}
		// cek apakah yang di upload adalah gambar
		$ekstensigambarvalid = ['jpg', 'jpeg', 'png', '.JPG'];
		$ekstensigambar = explode('.', $namaFile);
		$ekstensigambar = strtolower(end($ekstensigambar));
		if( !in_array($ekstensigambar, $ekstensigambarvalid)) {
			// echo "<script>
			// 		alert('yang anda upload bukan gambar')
			// 		</script>";
			// 		return false;
		}
		// cek jika ukurannya terlalu besar
		if( $ukuranFile > 1000000) {
			echo "<script>
					alert('ukuran gambar terlalu besar')
					</script>";
					return false;
		}
		// lolos pengecekan gambar siap diupload
		move_uploaded_file($tmpName, 'img/' . $namaFile);
		return $namaFile;
}
function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}
function ubah($data) {
	global $conn;
	$id = $data["id"];
	$nisn =htmlspecialchars($data["nisn"]);
	$nama = htmlspecialchars($data["nama"]);
	$tempatLahir = htmlspecialchars($data["tempatLahir"]);
	$email = htmlspecialchars($data["email"]);
	$jenisKelamin = htmlspecialchars($data["jenisKelamin"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	// cek apakah iser pilih gambar baru / tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	$jurusan = htmlspecialchars($data["jurusan"]);
		//query insert data
	$query = "UPDATE siswa SET 
			nisn = '$nisn',
			nama = '$nama',
			tempatLahir = '$tempatLahir',
			email = '$email',
			jenisKelamin = '$jenisKelamin',
			jurusan = '$jurusan',
			gambar = '$gambar'
			WHERE id =$id
			  ";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function cari($keyword) {
	$query = "SELECT * FROM siswa 
				WHERE
				nisn LIKE '%$keyword%' OR
				nama LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%' 
				";
				return query($query);
}
