
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Aplikasi Bioskop</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a href="<?= site_url() ?>">
		<img src="<?=base_url()?>assets/images/tiku.png" class="d-inline-block align-top" alt=""/>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active"  href="<?=site_url()?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=site_url()?>tentang">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=site_url('cetak_tiket')?>">History</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
