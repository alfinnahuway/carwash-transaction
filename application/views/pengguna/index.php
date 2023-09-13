<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $page; ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-database"></i><?= $page; ?></a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">

					<!-- general form elements -->
					<div class="card box-primary">
						<!-- form start -->
						<div class="box-body">
						<div class="flash-data-pengguna" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
							<div class="row">
								<div class="col-md-12">
									<a href="<?= base_url('pengguna/tambah'); ?>">
										<button class="btn btn-primary pull-right btn-sm btn-flat" style="margin-bottom: 10px;">
											<i class="fa fa-plus" style="margin-right: 5px;"></i>
											Tambah Data
										</button>
									</a>
								</div>
								<div class="col-md-12">
									<!-- Flash message -->


									<div class="table-wrapper">
										<table class="table table-reponsive table-bordered" id="example1">
											<thead>
												<tr>
													<th>No</th>
													<th>NAMA</th>
													<th>EMAIL</th>
													<th>ROLE</th>
													<th class="text-center">FOTO</th>
													<th class="text-center">STATUS</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($pengguna as $p) : ?>
													<tr>
														<td><?= $p->ID_USER; ?></td>
														<td><?= $p->NAME; ?></td>
														<td><?= $p->EMAIL; ?></td>
														<td><?= $p->ROLE; ?></td>
														<td class="text-center">

															<img src="<?= base_url('assets/img/profile/') . strtolower($p->IMAGE); ?>" width="40" height="40" class="img-circle" alt="User Image">
														</td>
														<td class="text-center">
															<?php if ($p->IS_ACTIVE == 1) : ?>

																<span class="label label-pill label-success">Aktif</span>
															<?php else : ?>
																
																<span class="label label-pill label-danger">Tidak Aktif</span>

															<?php endif; ?>

														</td>
														<td class="text-center">
															<a href="<?php echo base_url('/pengguna/edit/' . $p->pid) ?>" class="btn btn-warning btn-xs btn-flat">
																<i class="fa fa-edit"></i>
																Edit
															</a>
															<a href="<?php echo base_url('/pengguna/hapus/' . $p->pid) ?>" class="btn btn-danger btn-xs btn-flat tombol-hapus">
																<i class="fa fa-trash"></i>
																Hapus
															</a>
														</td>
													</tr>
												<?php endforeach; ?>

											</tbody>

										</table>

									</div>

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
