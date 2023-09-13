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
													<button onClick="newLabaRugi();" class="btn btn-success form-control btn-flat" style="margin-left: 15px;">		
													<i class="fa fa-print" style="margin-right : 5px; "></i>
															Cetak
													</button>
													</div>
												</td>
											</tr>
										</table>

										<div class="row">
											<div class="col-lg-4">
												<div style="padding: 10px;background-color: #ebebeb;margin-bottom:20px; width:100%">
													<span style="font-size: 20px;;">Total Pemasukkan : <span style="color:blue;font-weight: bolder;">Rp. <?= number_format($sum['pemasukkan'], 0, ',', '.',) ?></span></span>
												</div>
											</div>
											<div class="col-lg-4">
												<div style="padding: 10px;background-color: #ebebeb;margin-bottom:20px; width:100%">
													<span style="font-size: 20px;;">Total Pengeluaran : <span style="color:red;font-weight: bolder;">Rp. <?= number_format($sum['pengeluaran'], 0, ',', '.',) ?></span></span>
												</div>
											</div>
											<div class="col-lg-4">
												<div style="padding: 10px;background-color: #ebebeb;margin-bottom:20px; width:100%">
													<span style="font-size: 20px;;">Total Laba : <span style="color:green;font-weight: bolder;">Rp. <?= number_format($sum['laba'], 0, ',', '.',) ?> </span>
													<!-- <span class="pull-right" style="color:green">(<?= number_format(($sum['pemasukkan'] / $sum['pengeluaran']) * 100, 2, ',', '.') ?>%)</span>  -->
												</span>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="col-md-12">
									<table id="exampleReport" class="table table-hover table-bordered">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Tanggal</th>
												<th scope="col">PEMASUKKAN</th>
												<th scope="col">PENGELUARAN</th>
												<th scope="col">LABA</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($hasil as $pg) : ?>
												<tr>
													<th scope="row"><?= $i; ?></th>
													<td><?= $pg['TANGGAL'] ?></td>
													<td><?= "Rp. " . number_format($pg['TOTAL'], 0, ".", "."); ?></td>
													<td><?= "Rp. " . number_format($pg['BIAYA'], 0, ".", "."); ?></td>
													<td><?= "Rp. " . number_format($pg['LABA'], 0, ".", "."); ?></td>


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