<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $page; ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i><?= $title; ?></a></li>
			<li class="active"><?= $page; ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
					<!-- general form elements -->
					<div class="card box-primary">
						<!-- form start -->
						<div class="box-body">
							<form action="<?= base_url('paket/edit/'.$id) ?>" method="post">
							<div class="form-group">
									<label>Jenis Kendaraan</label>
									<select name='jenis_kendaraan' class='form-control'>
										<option value="">--Pilih Jenis Kendaraan</option>
										<?php foreach ($jenis_kendaraan as $item) { ?>
											<option value="<?= $item->ID_KENDARAAN ?>" <?= $item->ID_KENDARAAN == $paket->ID_KENDARAAN ? 'selected=selected' : '' ?>><?= $item->JENIS_KENDARAAN ?></option>
										<?php } ?>
									</select>
									<div class="errorMessage"><?= form_error('jenis_kendaraan', '<small class="text-danger pl-2">', '</small>'); ?></div>
								</div>
								<div class="form-group">
									<label for="">Jenis Paket</label>
									<input type="text" name="jenis_paket" value="<?= $paket->JENIS_PAKET ?>" class="form-control">
									<div class="errorMessage"><?= form_error('jenis_paket', '<small class="text-danger pl-2">', '</small>'); ?></div>
								</div>

								<div class="form-group">
									<label for="">Harga Paket</label>
									<input type="number" value="<?= $paket->HARGA_PAKET ?>" name="harga_paket" class="form-control">
									<div class="errorMessage"><?= form_error('harga_paket', '<small class="text-danger pl-2">', '</small>'); ?></div>
								</div>

								<!-- Save button bootstrap 3 -->
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Save</button>
									<button type="reset" class="btn btn-danger">Reset</button>
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
