<!-- Content Wrapper. Contains page content -->
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
							<?=
							$this->session->flashdata('message');
							?>
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
													<button onClick="newTransaksi();" class="btn btn-success form-control btn-flat" style="margin-left: 15px;">		
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
										<div class="box-body table-responsive no-padding">
											<table id="example1" class="table table-bordered table-striped">
											<thead class="thead-dark">
												<tr>
													<th scope="col" class="text-center">NO. TRANSAKSI</th>
													<th scope="col" class="text-center">TANGGAL</th>
													<th scope="col" class="text-center">NO. KENDARAAN</th>
													<th scope="col" class="text-center">KENDARAAN</th>
													<th scope="col">PAKET</th>
													<th scope="col" style="width: 150px" class="text-right">TOTAL HARGA</th>

												</tr>
											</thead>
											<tbody>
												<?php foreach ($hasil as $hs) : ?>
													<tr>
														<td class="text-center"><?= $hs['NO_TRANSAKSI']; ?></td>
														<td class="text-center"><?= $hs['TANGGAL']; ?></td>
														<td class="text-center"><?= $hs['NOPLAT']; ?></td>
														<td class="text-center"><?= $hs['JENIS_KENDARAAN']; ?></td>
														<td><?= $hs['JENIS_PAKET']; ?></td>
														<td class="text-right"><?= "Rp. " . number_format($hs['HARGA'], 0, ".", "."); ?></td>

													</tr>
												<?php endforeach; ?>
											</tbody>
											<tfoot>
												<tr>
													<th colspan="5" style="text-align:right">
														TOTAL :
													</th>
													<th style="text-align:right"></th>
												</tr>
											</tfoot>
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
