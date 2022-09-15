<?php

include('koneksi.php');

if (isset($_POST['simpan'])) {
	$no_surat = $_POST['no_surat'];
	$kategori = $_POST['kategori'];
	$judul = $_POST['judul'];
	if ($_FILES['file_surat']['name'] != "") {
		$ekstensi_diperbolehkan    = array('pdf');
		$nama       = $_FILES['file_surat']['name'];
		$x          = explode('.', $nama);
		$ekstensi   = strtolower(end($x));
		$ukuran     = $_FILES['file_surat']['size'];
		$file_tmp   = $_FILES['file_surat']['tmp_name'];

		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			if ($ukuran < 5242880) {
				move_uploaded_file($file_tmp, 'file/' . $nama);
				$sql = "INSERT INTO arsip (no_surat, kategori, judul, file_surat) VALUES ('$no_surat', '$kategori', '$judul', '$nama');";

				$query = mysqli_query($koneksi, $sql);
				if ($query) {
					echo '<script type="text/javascript"> alert("Data Berhasil Disimpan"); </script>';
					echo "<script>document.location='index.php?arsip'</script>";
				} else {
					echo '<script type="text/javascript"> alert("Data Gagal Disimpan"); </script>';
					echo "<script>document.location='index.php?arsip'</script>";
				}
			} else {
				echo '<script type="text/javascript"> alert("Ukuran File Terlalu Besar"); </script>';
				echo "<script>document.location='index.php?arsip'</script>";
			}
		} else {
			echo '<script type="text/javascript"> alert("Ekstensi File Tidak Diperbolehkan"); </script>';
			echo "<script>document.location='index.php?arsip'</script>";
		}
	}
} else {
	echo 'Coba lagi';
}
