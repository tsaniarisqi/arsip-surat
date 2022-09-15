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

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<div class="content">
						<!-- Page Heading -->
						<h1 class="h3 mb-2 text-gray-800">Lihat</h1>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.php">Arsip Surat</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page" href="detail-arsip.php">Lihat</li>
							</ol>
						</nav>
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<?php
										if (isset($_GET['id'])) {
											$id    = $_GET['id'];
										} else {
											die("Error. No ID Selected!");
										}
										include 'koneksi.php';
										$query = mysqli_query($koneksi, "SELECT * FROM arsip WHERE id='$id'");
										$result    = mysqli_fetch_array($query);

										printf("Nomor: ");
										echo $result['no_surat'];
										printf('</br>');
										printf("Kategori: ");
										echo $result['kategori'];
										printf('</br>');
										printf("Judul: ");
										echo $result['judul'];
										printf('</br>');
										printf("Waktu Pengarsipan");
										echo $result['waktu_pengarsipan'];
										printf('</br></br>');
										?>
										<iframe src="file/<?php echo $result['file_surat'] ?>" height="400" width="100%"></iframe>

										<!-- <br> -->
										<br>
										<div class="text-left d-print-none">
											<!-- <hr class="my-3"> -->
											<ul class="list-inline">
												<li class="list-inline-item mb-0">
													<a href="index.php?arsip" class="btn btn-secondary btn-icon-split">
														<span class="icon text-white-50">
															<i class="fas fa-arrow-left"></i>
														</span>
														<span class="text">Kembali</span>
													</a>
													<a href="delete-app-submission.php?id_pengajuan=<?php echo ($row['id_pengajuan']) ?>" class="btn btn-warning btn-icon-split">
														<span class="icon text-white-50">
															<i class="fas fa-arrow-circle-down"></i>
														</span>
														<span class="text">Unduh</span>
													</a>
													<a href="delete-app-submission.php?id_pengajuan=<?php echo ($row['id_pengajuan']) ?>" class="btn btn-success btn-icon-split">
														<span class="icon text-white-50">
															<i class="fas fa-edit"></i>
														</span>
														<span class="text">Edit/Ganti File</span>
													</a>
												</li>
											</ul>
										</div>
										<br>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->

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