<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("include/head.php") ?>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php include("include/sidebar.php"); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php include("include/header.php"); ?>
				<!-- End of Topbar -->

				<div class="container-fluid">
					<div class="content">
						<!-- Page Heading -->
						<h1 class="h3 mb-2 text-gray-800">Edit</h1>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.php">Arsip Surat</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page" href="edit-arsip.php">Edit</li>
							</ol>
						</nav>
						<div class="card mb-4 py-3 border-left-info">
							<div class="card-body">
								<p class="mb-0">Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
								<p class="mb-0">Catatan: Gunakan file berformat PDF.</p>
							</div>
						</div>

						<div class="card mb-4">
							<div class="card-body">
								<?php
								include 'koneksi.php';
								//Fungsi untuk mencegah inputan karakter yang tidak sesuai
								function input($data)
								{
									$data = trim($data);
									$data = stripslashes($data);
									$data = htmlspecialchars($data);
									return $data;
								}

								//Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id
								if (isset($_GET['id'])) {
									$id = input($_GET["id"]);

									$sql = "SELECT * FROM arsip WHERE id=$id";
									$hasil = mysqli_query($koneksi, $sql);
									$data = mysqli_fetch_assoc($hasil);
								}
								//Cek apakah ada kiriman form dari method post
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									$id = htmlspecialchars($_POST["id"]);
									$no_surat = input($_POST["no_surat"]);
									$kategori = input($_POST["kategori"]);
									$judul = input($_POST["judul"]);

									$old_file = input($_POST['old_file']);
									if ($_FILES['file_surat']['name'] != "") {
										$ekstensi_diperbolehkan = array('pdf');
										$nama = $_FILES['file_surat']['name'];
										$x = explode('.', $nama);
										$ekstensi = strtolower(end($x));
										$ukuran    = $_FILES['file_surat']['size'];
										$file_tmp = $_FILES['file_surat']['tmp_name'];
										if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
											if ($ukuran < 5242880) {
												move_uploaded_file($file_tmp, 'file/' . $nama);
											} else {
												echo '<script type="text/javascript"> alert("Ukuran File Terlalu Besar"); </script>';
												echo "<script>document.location='index.php?arsip'</script>";
											}
										} else {
											echo '<script type="text/javascript"> alert("Ekstensi File Tidak Diperbolehkan"); </script>';
											echo "<script>document.location='index.php?arsip'</script>";
										}
										$file_surat = $nama;
									} else {
										$file_surat = $old_file;
									}

									$sql = "UPDATE arsip SET
									no_surat='$no_surat', 
									kategori='$kategori', 
									judul='$judul', 
									file_surat='$file_surat',
									waktu_pengarsipan=now()
									where id=$id";

									//Mengeksekusi atau menjalankan query diatas
									$hasil = mysqli_query($koneksi, $sql);

									//Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
									if ($hasil) {
										echo '<script type="text/javascript"> alert("Berhasil Edit Data"); </script>';
										echo "<script>document.location='index.php?arsip'</script>";
									} else {
										echo '<script type="text/javascript"> alert("Gagal Upload Data"); </script>';
										echo "<script>document.location='index.php?arsip'</script>";
									}
								}
								?>
								<form method="POST" action="edit-arsip.php" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
									<div class="form-group row">
										<label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="no_surat" placeholder="Masukkan Nomor Surat" value="<?php echo $data['no_surat']; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
										<div class="col-sm-10">
											<select class="form-control" name="kategori" value="<?php echo $query['kategori']; ?>">
												<option value="Undangan">Undangan</option>
												<option value="Pengumuman">Pengumuman</option>
												<option value="Nota Dinas">Nota Dinas</option>
												<option value="Pemberitahuan">Pemberitahuan</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="judul" class="col-sm-2 col-form-label">Judul</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" value="<?php echo $data['judul']; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="file" class="col-sm-2 col-form-label">File Surat (PDF)</label>
										<div class="col-sm-10">
											<div class="form-group">
												<div class="custom-file">
													<input type="hidden" id="old_file" name="old_file" value="<?= $query['file_surat'] ?>">
													<input type="file" style="height:auto" class="form-control-file form-control height-auto" id="customFile" name="file_surat">
												</div>
											</div>
										</div>
									</div>
									<ul class="list-inline">
										<li class="list-inline-item mb-0">
											<a href="index.php?arsip">
												<button type="button" class="btn btn-secondary">Kembali</button>
											</a>
										</li>
										<li class="list-inline-item mb-0">
											<a href="index.php?arsip">
												<button type="submit" value="Simpan" name="simpan" class="btn btn-success">Simpan</button>
											</a>
										</li>
									</ul>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<?php include("include/footer.php"); ?>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="vendor/chart.js/Chart.min.js"></script>
	<script src="vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="js/demo/chart-area-demo.js"></script>
	<script src="js/demo/chart-pie-demo.js"></script>
	<script src="js/demo/datatables-demo.js"></script>

</body>

</html>