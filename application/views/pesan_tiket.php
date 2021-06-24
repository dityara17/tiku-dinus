<?php $this->view('inc_header.php'); ?>


<div class="hero" style="background: #e7e7e7">

	<div class="container box">
		<div class="row">
			<div class="col-md-3">
				<div class="image">
					<img src="<?= base_url() ?>assets/images/<?= $film->foto ?>" alt="godzilla" style="max-width: 100%">
				</div>
			</div>
			<div class="col-md-9 d-flex align-items-center">
				<div class="box-content">
					<h5 class="card-title"><?= $film->judul ?></h5>
					<p>
						<?= $film->keterangan ?>
					</p>
					<p class="card-text">
						<?= $film->sinopsis ?>
					</p>
					<a href="#" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">Book ticket</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Book a ticket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url() ?>/kursi" method="post">
					<div class="row">
						<div class="col-md-2">
							<strong>Tanggal</strong>
						</div>
						<div class="col-md-10 form-group">
							<input type="text" name="tanggal_nonton" id="date_input" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<strong>Jadwal</strong>
						</div>
						<input type="hidden" name="film_id" value="<?= $film->id_film ?>">
						<div class="col-md-4 form-group">
							<?php foreach ($jadwal as $item): ?>
								<input type="radio" class="form-control-custom" name="sesi" id="sesi-<?= $item->jadwal ?>"
									   value="<?= $item->id_jadwal ?>">
								<label for="sesi-<?= $item->jadwal ?>"><?= $item->jadwal ?></label>
								<br>
							<?php endforeach; ?>
						</div>
					</div>
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
