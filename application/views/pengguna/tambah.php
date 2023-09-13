<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $page; ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= base_url('pengguna'); ?>"><i class="fa fa-database"></i>Pengguna</a></li>
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
							<form action="<?= base_url('pengguna/tambah') ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="">Nama</label>
									<input type="text" name="name" class="form-control" value="<?= set_value('name'); ?>">
									<div class="input-group">
										<div class="errorMessage"><?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label for="">Email</label>
									<input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>">
									<div class="input-group">
										<div class="errorMessage"><?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>">
									<div class="input-group">
										<div class="errorMessage"><?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label>Role</label>
									<select name='role_id' class='form-control'>
										<option value="">--Pilih Role</option>
										<?php foreach ($role as $item) { ?>
											<option value="<?php echo $item->ROLE_ID; ?>"><?php echo $item->ROLE; ?></option>
										<?php } ?>
									</select>
									<div class="input-group">
										<div class="errorMessage"><?= form_error('role_id', '<small class="text-danger pl-2">', '</small>'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label for="">Status</label>
									<select name="is_active" class="form-control" id="">
										<option value="1">Aktif</option>
										<option value="0">Tidak Aktif</option>
									</select>

								</div>
								<div class="form-group">
									<label for="">Foto</label>
									<input type="file" name="image" class="form-control">
								</div>

								<!-- Save button bootstrap 3 -->
								<div class="form-group pull-right">
									<a   href="<?= base_url('pengguna'); ?>">
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
