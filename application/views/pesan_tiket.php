<?php $this->view('inc_header.php'); ?>

<h1 class="center_title">Pemesanan Tiket </h1>

<div class="container">
	<div class="card mb-3">
		<div class="row g-0">
			<div class="col-md-2">
				<img src="<?= base_url() ?>assets/images/<?= $film->foto ?>" alt="godzilla" style="max-width: 100%">
			</div>
			<div class="col-md-10">
				<div class="card-body">
					<h5 class="card-title"><?= $film->judul ?></h5>
					<p class="card-text">
						<?= $film->sinopsis ?>
					</p>
					<p class="card-text"><small class="text-muted"><?= $film->keterangan ?></small></p>
				</div>
			</div>
		</div>
	</div>
	<form action="<?= site_url() ?>/kursi" method="post">
		<div class="row">
			<div class="col-md-2">
				<strong>Tanggal</strong>
			</div>
			<div class="col-md-4 form-group">
				<input type="text" name="tanggal_nonton" id="date_input" class="form-control-sm form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<strong>Jadwal</strong>
			</div>
			<input type="hidden" name="film_id" value="<?= $film->id_film ?>">
			<div class="col-md-4 form-group">
				<?php foreach ($jadwal as $item): ?>
					<input type="radio" class="form-control-custom" name="sesi" id="sesi-<?= $item->jadwal ?>" value="<?= $item->id_jadwal ?>">
					<label for="sesi-<?= $item->jadwal ?>"><?= $item->jadwal ?></label>
					<br>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="row" style="margin-bottom: 50px;">
			<div class="col-md-2">
				&nbsp;
			</div>
			<div class="col-md-10">
				<button type="submit"  class="btn btn-primary btn-large">Submit</button>
			</div>
		</div>
	</form>


</div>
<?php $this->view('inc_footer.php'); ?>
