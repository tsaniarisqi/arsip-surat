<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Arsip Surat</h1>
<p class="mb-0">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
<p class="mb-3">Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Arsip Surat</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nomor Surat</th>
						<th>Kategori</th>
						<th>Judul</th>
						<th>Waktu Pengarsipan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						include 'koneksi.php';
						$arsip = mysqli_query($koneksi, "SELECT * FROM arsip");
						while ($row = mysqli_fetch_array($arsip)) {
							echo "
							<td>" . $row['no_surat'] . "</td>
							<td>" . $row['kategori'] . "</td>
							<td>" . $row['judul'] . "</td>
							<td>" . $row['waktu_pengarsipan'] . "</td>";
						?>
							<td>
								<ul class="list-inline mb-0">
									<a class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal">
										<span class="icon text-white-50">
											<i class="fas fa-trash"></i>
										</span>
										<span class="text">Hapus</span>
									</a>
									<!-- Modal -->
									<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Alert</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													Apakah anda yakin ingin menghapus arsip surat ini?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
													<a href="delete-arsip.php?id=<?php echo ($row['id']) ?>">
														<button name="delete" class="btn btn-primary">Ya </button>
													</a>
												</div>
											</div>
										</div>
									</div>
									<a href="delete-app-submission.php?id_pengajuan=<?php echo ($row['id_pengajuan']) ?>" class="btn btn-warning btn-icon-split">
										<span class="icon text-white-50">
											<i class="fas fa-arrow-circle-down"></i>
										</span>
										<span class="text">Unduh</span>
									</a>
									<a href="delete-app-submission.php?id_pengajuan=<?php echo ($row['id_pengajuan']) ?>" class="btn btn-primary btn-icon-split">
										<span class="icon text-white-50">
											<i class="fas fa-eye"></i>
										</span>
										<span class="text">Lihat</span>
									</a>
								</ul>
							</td>
					</tr>
				<?php
						}
				?>

				</tbody>
			</table>
		</div>
		<a href="index.php?arsip-forms" class="btn btn-light btn-icon-split">
			<span class="icon text-white-50">
				<i class="fas fa-plus"></i>
			</span>
			<span class="text">Arsipkan Surat</span>
		</a>
	</div>
</div>