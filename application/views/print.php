<?php $this->view('inc_header.php'); ?>

<h1 class="center_title">Cetak Tiket </h1>

<div class="container" style="padding: 180px 0">
	<div class="row">
		<div class="col-md-4">
			<div class="card" >
				<div class="card-body">
					<h5 class="card-title">Tiket Bioskop Kampus UDINUS</h5>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						Judul : Nama Film <br>
						Jadwal : Jam <br>
						Kursi : C1
					</li>
				</ul>
				<div class="card-footer text-muted">
					Tiket Bioskop kampus UDINUS <br>
					Judul - Siang - seat <br>
					Disobek oleh petugas
				</div>
			</div>
		</div>
	</div>
	<div class="text-center mt-3">
		<button class="btn btn-primary">Print</button>
	</div>
</div>

<?php $this->view('inc_footer.php'); ?>
