<?php

include('koneksi.php');

if(isset($_POST['simpan'])){
	$no_surat = $_POST['no_surat'];
	$kategori = $_POST['kategori'];
	$judul = $_POST['judul'];

	$sql = "INSERT INTO arsip (no_surat, kategori, judul) VALUES ('$no_surat', '$kategori', '$judul');"; 
	
	$query = mysqli_multi_query($koneksi, $sql);

	if($query){
		echo '<script type="text/javascript"> alert("Data Berhasil Disimpan"); </script>';
		echo "<script>document.location='index.php?arsip'</script>";
	}else{
		echo '<script type="text/javascript"> alert("Data Gagal Disimpan"); </script>';
		echo "<script>document.location='index.php?arsip'</script>";
	}
}else{
	echo 'Coba lagi';
}
?>