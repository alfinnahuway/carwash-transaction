<!-- Content Wrapper. Contains page content -->

<style>
	.label-pill {
		padding-right: .6em;
		padding-left: .6em;
		border-radius: 10rem;
	}
</style>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $page; ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-book"></i><?= $title; ?></a></li>
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
							<?= $this->session->flashdata('message'); ?>
							<div class="row">	
								<div class="col-md-12">
										<form action="">
										<table>
											<tr>
												<td style="width : 63%">
												<label for="exampleInputEmail1">Tanggal Awal</label>
												</td>
												<td>
												<label for="exampleInputEmail1">Tanggal Akhir</label>
												</td>
												<td>
												</td>
												<td>
												</td>
											</tr>
										</table>
										<table>
											<tr>
												<td>
													<div class="form-group">
														
														<input type="date" class="form-control" id="tgl_awal" value="<?= $tgl_awal; ?>" name="tgl_awal" placeholder="Tanggal Awal">
													</div>
												</td>
												<td>
													<div class="form-group">
														
														<input type="date" class="form-control" id="tgl_akhir" value="<?= $tgl_akhir; ?>" name="tgl_akhir" placeholder="Tanggal Akhir">
													</div>
												</td>
												<td>
													<div class="form-group">
														<button type="submit" class="btn btn-primary form-control btn-flat" style="margin-left: 10px;">
														<i class="fa fa-file-text" style="margin-right : 5px; "></i>
														Submit</button>
													</div>
												</td>
												<td>
													<div class="form-group">
													<button onClick="newPengeluaran();" class="btn btn-success form-control btn-flat" style="margin-left: 15px;">		
													<i class="fa fa-print" style="margin-right : 5px; "></i>
															Cetak
													</button>
													</div>
												</td>
											</tr>
										</table>
											</form>
									</div>
									<div class="col-md-12">

										<div style="padding: 10px;background-color: #ebebeb;margin-bottom:20px; width:100%">
											<h1>Total Pengeluaran : Rp. <?= number_format($sum['BIAYA'],0,',','.',) ?></h1>
										</div>
									</div>
								<div class="col-md-12">
									<table id="exampleReport" class="table table-hover table-bordered">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Tanggal</th>
												<th scope="col">Alasan</th>
												<th scope="col">Biaya</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($hasil as $pg) : ?>
												<tr>
													<th scope="row"><?= $i; ?></th>
													<td><?= $pg['TANGGAL'] ?></td>
													<td><?= $pg['ALASAN'] ?></td>
													<td><?= "Rp. " . number_format($pg['BIAYA'], 0, ".", "."); ?></td>

												</tr>
												<?php $i++ ?>
											<?php endforeach; ?>
										</tbody>
									</table>
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
