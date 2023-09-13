<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $page; ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
		<li><a href="<?= base_url('transaksi') ?>"><i class="fa fa-exchange"></i>Pencucian</a></li>
			<li class="active"><?= $page; ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3">
				<div class="box box-primary">

					<!-- general form elements -->
					<div class="card box-primary">
						<!-- form start -->
						<div class="box-body">
							<div class="row">
								<div class="col-lg-12">
									<form name="form2" id="form2" action="<?= base_url('transaksi/editTransaksi/'.$transaksi['NO_TRANSAKSI']); ?>" method="post">
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="nota">Nomor Transaksi</label>
													<input type="text" class="form-control" id="nota" name="nota" value="<?= $transaksi['NO_TRANSAKSI']; ?>" readonly>
												</div>

												<div class="form-group">
													<label for="kedaraan">Jenis Kendaraan</label>
													<select name="kendaraan" id="kendaraan" class="pkt form-control">
														<option value="">Pilih Kendaraan</option>

														<?php foreach ($sub as $sb) : ?>
															<option value="<?= $sb['ID_KENDARAAN']; ?>" <?= $sb['ID_KENDARAAN'] == $transaksi['ID_KENDARAAN'] ? 'selected=selected' : '' ?>><?= $sb['JENIS_KENDARAAN']; ?></option>
														<?php endforeach; ?>
													</select>
													<div class="input-group">
														<div class="errorMessage"><?= form_error('kendaraan', '<small class="text-danger pl-2">', '</small>'); ?></div>
													</div>
												</div>

												<div class="form-group">
													<label for="paket">Paket</label>
													<select name="paket" id="paket" class="paket form-control" onchange="get_values()">
														<option value="">Pilih Kendaraan</option>
													</select>
													<div class="input-group">
														<div class="errorMessage"><?= form_error('paket', '<small class="text-danger pl-2">', '</small>'); ?></div>
													</div>
												</div>
												<div class="form-group">
													<label for="noplat">Nomor Kendaraan</label>

													<input type="text" id="noplat" class="form-control" name="noplat" placeholder="No. Polisi" value="<?= $transaksi['NOPLAT']; ?>" onkeydown="otomatis()" onkeyup="kapital()" maxlength="10">
													<div class="input-group">
														<div class="errorMessage"><?= form_error('noplat', '<small class="text-danger pl-2">', '</small>'); ?></div>
													</div>
												</div>


												<div class="form-group">
													<label for="harga">Total</label>
													<input type="number" class="harga form-control" id="harga" name="harga" onkeyup="cetak()" placeholder="Harga" value="<?= $transaksi['HARGA']; ?>">
													<div class="input-group">
														<div class="errorMessage"><?= form_error('harga', '<small class="text-danger pl-2">', '</small>'); ?></div>
													</div>
												</div>
												<div class="form-group pull-right">
														<a   href="<?= base_url('transaksi'); ?>">
														<button type="button" class="btn btn-danger btn-sm btn-flat" style="margin-right : 5px; ">
														<i class="fa fa-chevron-left" style="margin-right : 5px; "></i>Kembali
														</button>
														</a>
													<button type="submit" class="btn btn-primary btn-sm btn-flat">
													<i class="fa fa-edit" style="margin-right : 5px; "></i>
														Edit
													</button>
												</div>
											</div>

										</div>
									</form>


								</div>
							</div>
						</div>

					</div>
					<!-- /.card-body -->

				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
