<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $page; ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-database"></i>Paket Cucian</a></li>
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
							<form action="<?= base_url('paket/tambahPaket')?>" method="post">

							<div class="form-group">
									<label>Jenis Kendaraan</label>
									<select name="jenis_kendaraan" id="jenis_kendaraan"  class='form-control'>
										<option value="">--Pilih Jenis Kendaraan</option>
										<?php foreach ($jenis_kendaraan as $item) { ?>
											<option value="<?php echo $item->ID_KENDARAAN; ?>"><?php echo $item->JENIS_KENDARAAN; ?></option>
										<?php } ?>
									</select>
									<div class="errorMessage"><?= form_error('jenis_kendaraan', '<small class="text-danger pl-2">', '</small>'); ?></div>
								</div>

								<div class="form-group">
									<label for="">Jenis Paket</label>
									<input type="text" name="jenis_paket" id="jenis_paket" class="form-control">
									<div class="errorMessage"><?= form_error('jenis_paket', '<small class="text-danger pl-2">', '</small>'); ?></div>
								</div>
								
								<div class="form-group">
									<label for="">Harga Paket</label>
									<input type="number" name="harga_paket" id="harga_paket" class="form-control">
									<div class="errorMessage"><?= form_error('harga_paket', '<small class="text-danger pl-2">', '</small>'); ?></div>
								</div>
								
								<!-- Save button bootstrap 3 -->
								<div class="form-group pull-right">
									<a   href="<?= base_url('paket'); ?>">
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
