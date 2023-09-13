<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $page; ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= base_url('transaksi/daftarPengeluaran') ?>"><i class="fa fa-exchange"></i>Pengeluaran</a></li>
			<li class="active"><?= $page; ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="box box-primary">
					<!-- general form elements -->
					<div class="card box-primary">
						<!-- form start -->
						<div class="box-body">
							<form action="<?= base_url('transaksi/daftarPengeluaranTambah') ?>" method="post">
								<div class="form-group">
									<label for="">Tanggal</label>
									<input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= set_value('tanggal'); ?>">
									<div class="errorMessage"><?= form_error('tanggal', '<small class="text-danger pl-2">', '</small>'); ?></div>
								</div>


								<div class="form-group">
									<label for="">Alasan</label>
									<textarea class="form-control" name="alasan" id="alasan"><?= set_value('alasan'); ?></textarea>
									<div class="errorMessage"><?= form_error('alasan', '<small class="text-danger pl-2">', '</small>'); ?></div>
								</div>


								<div class="form-group">
									<label for="">Biaya</label>
									<input type="number" name="biaya" id="biaya" class="form-control" value="<?= set_value('biaya'); ?>">
									<div class="errorMessage"><?= form_error('biaya', '<small class="text-danger pl-2">', '</small>'); ?></div>
								</div>
								<!-- Save button bootstrap 3 -->
								<div class="form-group pull-right">
									<a   href="<?= base_url('transaksi/daftarPengeluaran'); ?>">
										<button type="button" class="btn btn-danger btn-sm btn-flat" style="margin-right : 5px; ">
										<i class="fa fa-chevron-left" style="margin-right : 5px; "></i>Kembali
									</button>
									</a>
									<button type="submit" class="btn btn-primary btn-sm btn-flat">
										<i class="fa fa-plus" style="margin-right : 5px; "></i>Tambah
									</button>
								</div>
							</form>
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
