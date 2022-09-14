<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Unggah</h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Arsip Surat</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page" href="arsip-forms.php">Unggah</li>
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
		<form method="POST" action="add-arsip.php">
			<div class="form-group row">
				<label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="no_surat" placeholder="Masukkan Nomor Surat" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-10">
					<select class="form-control" name="kategori">
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
					<input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="file" class="col-sm-2 col-form-label">File Surat (PDF)</label>
				<div class="col-sm-10">
					<div class="input-group mb-3">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="inputGroupFile02">
							<label class="custom-file-label" for="inputGroupFile02">Browse file</label>
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