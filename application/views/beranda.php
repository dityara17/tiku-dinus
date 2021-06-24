<?php $this->view('inc_header.php'); ?>

<div id="slider" class="pt-3 pb-3">
	<div class="container-fluid content-section" id="">

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?= base_url() ?>assets/images/jeremy-downes-797056-unsplash.png" class="d-block w-100">
				</div>
				<div class="carousel-item">
					<img src="<?= base_url() ?>assets/images/julien-andrieux-332817-unsplash.png" class="d-block w-100">
				</div>
				<div class="carousel-item">
					<img src="<?= base_url() ?>assets/images/karen-zhao-643916-unsplash.png" class="d-block w-100">
				</div>
			</div>
		</div>
	</div>
</div>

<div id="content">
	<div class="container">
		<div class="section-title text-center text-md-left">
			<h4 class="mb-4">New movie</h4>
		</div>

		<div class="row content ">
			<?php foreach ($films as $film) { ?>

				<div class="col-md-3 kotak_film">
					<a href="<?= site_url() ?>/pesan_tiket?id=<?= $film->id_film ?>">
						<div class="" style="">
							<img src="<?= base_url() ?>assets/images/<?= $film->foto ?>" class="card-img-top"
								 alt="aladdin">
							<div class="title-section">
								<h3 class="card-title"><?= $film->judul ?></h3>
							</div>
						</div>
					</a>
				</div>

			<?php } ?>
		</div>
	</div>
</div>



<?php $this->view('inc_footer.php'); ?>
