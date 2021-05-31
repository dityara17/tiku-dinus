<?php $this->view('inc_header.php'); ?>

<h1 class="center_title">Pemesanan Tiket </h1>

<div class="container" style="padding: 180px 0">
	<form action="<?= site_url('action/bayar') ?>" method="post">
		<div class="row">
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<div class="card-body">
						<h5 class="card-title"><?= $film->judul ?></h5>
						Jadwal : <?= date('d F Y', strtotime($this->session->tanggal_nonton)) ?> - <?= $sesi->jadwal ?>
					</div>
					<ul class="list-group list-group-flush">
						<?php foreach ($this->session->data_kursi as $kursi): ?>
							<li class="list-group-item">
								<?= $kursi ?>
								<a href="<?= site_url() ?>/action/hapus_kursi?kursi=<?= $kursi ?>"
								   class="btn btn-warning">Hapus</a>
							</li>
						<?php endforeach; ?>
					</ul>
					<div class="card-body">
						<ul class="list-group list-group-flush list-unstyled">
							<li style="padding: 8px 0"><a href="<?= site_url('kursi') ?>" class="btn btn-success">Edit</a></li>
							<li><a href="<?= site_url('action/hapus_semua') ?>" class="btn btn-danger">Hapus semua</a></li>
							<li>Total: Rp. <?= number_format($total) ?></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h5>Informasi Data Pribadi</h5>
						</div>
						<div class="form-group">
							<label for="">Nama</label>
							<input type="text" name="nama" required class="form-control form-control-sm">
						</div>
						<div class="form-group">
							<label for="">Telephone</label>
							<input type="text" name="phone" required class="form-control form-control-sm">
						</div>
						<button type="submit" class="btn btn-primary">Bayar</button>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>

<?php $this->view('inc_footer.php'); ?>
