<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $page; ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-user"></i><?= $title; ?></a></li>
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
						<div class="flash-data-editprofile" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
							<form action="<?= base_url('pengguna/editProfile/'.$pengguna->ID_USER) ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="">Nama</label>
									<input type="text" name="name" value="<?= $pengguna->NAME ?>" class="form-control">
									<div class="input-group">
										<div class="errorMessage"><?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label for="">Email</label>
									<input type="email" name="email" value="<?= $pengguna->EMAIL ?>" class="form-control">
									<div class="input-group">
										<div class="errorMessage"><?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password" class="form-control">
									<div class="input-group">
										<div class="errorMessage"><?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label for="">Status</label>
									<select name="is_active" class="form-control" id="">
										<option value="1" <?= $pengguna->IS_ACTIVE == 1 ? 'selected=selected' : '' ?>>Aktif</option>
										<option value="0" <?= $pengguna->IS_ACTIVE == 0 ? 'selected=selected' : '' ?>>Tidak Aktif</option>
									</select>

								</div>
								<div class="form-group">
									<label for="">Foto</label>
									<input type="file" name="image" class="form-control">
								</div>

								<!-- Save button bootstrap 3 -->
								<div class="form-group pull-right">
									<a href="<?= base_url('dashboard'); ?>">
										<button type="button" class="btn btn-danger btn-sm btn-flat" style="margin-right : 5px; ">
											<i class="fa fa-chevron-left" style="margin-right : 5px; "></i>Kembali
										</button>
									</a>
										<button type="submit" class="btn btn-primary btn-sm btn-flat">
											<i class="fa fa-edit" style="margin-right : 5px; "></i>Edit
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
