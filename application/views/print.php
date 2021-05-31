<?php $this->view('inc_header.php'); ?>

<h1 class="center_title">Cetak Tiket </h1>

<div class="container" style="padding: 180px 0">
	<div class="contact">
		<h5>Informasi Order</h5>
		<p>
			Oleh : <?= $this->session->last_order['nama'] ?> <br>
			Telephone : <?= $this->session->last_order['phone'] ?>
		</p>
	</div>
	<div class="row">
		<?php foreach ($this->session->last_order['kursi'] as $kursi): ?>
			<div class="col-md-6" style="margin-bottom: 20px;">
				<div class="card">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><h4>Tiket Bioskop Kampus UDINUS </h4></li>
						<li class="list-group-item">
							<?= $this->session->last_order['film'] ?><br>
							Jadwal : <?= $this->session->last_order['tanggal_nonton'] ?> -
							<?= $this->session->last_order['jadwal'] ?> <br>
							Kursi : <?= $kursi ?>
						</li>
					</ul>
					<div class="card-footer text-muted">
						Tiket Bioskop Kampus UDINUS (TIKU)<br>
						<?= $this->session->last_order['film'] ?> -
						<?= $this->session->last_order['tanggal_nonton'] ?> -
						<?= $this->session->last_order['jadwal'] ?><br>
						Untuk disobek Petugas
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="text-center mt-3">
		<button class="btn btn-primary">Print</button>
	</div>
</div>

<?php $this->view('inc_footer.php'); ?>
