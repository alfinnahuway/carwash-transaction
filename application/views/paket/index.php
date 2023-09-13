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
							<div class="flash-data-paket" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
							<div class="row">
								<div class="col-md-12">
									<a href="<?= base_url('paket/tambahPaket'); ?>">
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
													<th>#</th>
													<th>KENDARAAN</th>
													<th>JENIS PAKET</th>
													<th class="text-right">HARGA PAKET</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($paket as $p) : ?>
													<tr>
														<td><?= $i; ?></td>
														<td><?= $p->JENIS_KENDARAAN; ?></td>
														<td><?= $p->JENIS_PAKET; ?></td>
														<td class="text-right"><?= "Rp. " . number_format($p->HARGA_PAKET, 0, ".", "."); ?></td>
														<td class="text-center">
															<a href="<?php echo base_url('/paket/edit/' . $p->ID_PAKET) ?>" class="btn btn-warning btn-xs btn-flat">
																<i class="fa fa-edit"></i>
																Edit
															</a>
															<a href="<?php echo base_url('/paket/hapus/' . $p->ID_PAKET) ?>" class="btn btn-danger btn-xs btn-flat tombol-hapus">
																<i class="fa fa-trash"></i>
																Hapus
															</a>
														</td>
													</tr>
													<?php $i++; ?>
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
