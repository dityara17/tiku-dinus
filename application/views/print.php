<?php $this->view('inc_header.php'); ?>

<h1 class="center_title">Cetak Tiket </h1>

<div class="container" style="padding: 180px 0">

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<?php $id_identitas = "";
				foreach ($this->session->last_order['kursi'] as $kursi) : $id_identitas = $this->session->last_order['id_identitas'] ?>
					<div class="col-md-6" style="margin-bottom: 20px;">
						<div class="card">
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>Tiket Bioskop Kampus UDINUS </h4>
								</li>
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
		</div>
		<div class="col-md-4">
			<div class="contact">
				<div class="card">
					<div class="card-body">
						<h5>Informasi Order</h5>
						<p>
							Oleh : <?= $identitas->nama ?> <br>
							NIK : <?= $identitas->nik ?> <br>
							Usia : <?= $identitas->usia ?> <br>
						</p>
						<a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#exampleModal">Update</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="text-center mt-3">
		<button class="btn btn-primary">Print</button>
	</div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Pesanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('action/update') ?>" method="post">
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="nama" value="<?= $identitas->nama ?>" required class="form-control form-control-sm">
					</div>
					<div class="form-group">
						<label for="">NIK</label>
						<input type="text" name="nik" value="<?= $identitas->nik ?>" required class="form-control form-control-sm">
					</div>
					<div class="form-group">
						<label for="">Usia</label>
						<input type="text" name="usia" value="<?= $identitas->usia ?>" required class="form-control form-control-sm">
					</div>
					<input type="hidden" name="id_identitas" value="<?= $id_identitas ?>">

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary ">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


</div>


<?php $this->view('inc_footer.php'); ?>
