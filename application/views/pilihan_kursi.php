<?php $this->view('inc_header.php'); ?>


<h1 class="center_title"> Pilihan Kursi</h1>

<div class="container">
	<div class="" style="padding: 60px 0">
		<form action="<?= site_url('konfirmasi-bayar') ?>" method="post">
			<input type="hidden">
			<table>
				<tr>
					<th width="150">Film</th>
					<td><?= $film->judul ?></td>
				</tr>
				<tr>
					<th>Jadwal</th>
					<td><?= $this->session->tanggal_nonton." - ".$sesi->jadwal ?></td>
				</tr>
				<tr>
					<th>Tempat Duduk</th>
					<td>
						<table>
							<th>&nbsp;</th>
							<?php for ($i = 1; $i <= 5; $i++): ?>
								<td class="text-center"><?= $i ?></td>
							<?php endfor; ?>
							<!--			Baris				-->
							<?php for ($row = 'A'; $row <= 'E'; $row++): ?>
								<tr>
									<td><?= $row ?></td>
									<?php for ($col = 1; $col <= 5; $col++): ?>
										<td>
											<input
												<?php
												if($this->session->data_kursi &&
													in_array($row.$col, $this->session->data_kursi))
												{ echo "checked";}

												if (in_array($row.$col,$booked)) {echo "disabled";}
												?>
												value="<?= $row.$col ?>" name="kursi[]" type="checkbox">
										</td>
									<?php endfor; ?>
								</tr>
							<?php endfor; ?>
						</table>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>Harga tiket per lembar Rp 60.0000</td>
				</tr>
				<tr>
					<th></th>
					<td><button class="btn btn-primary">Submit</button></td>
				</tr>
			</table>
		</form>

	</div>
</div>

<?php $this->view('inc_footer.php'); ?>r
