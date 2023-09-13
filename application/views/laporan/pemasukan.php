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
													<button onClick="newPemasukan();" class="btn btn-success form-control btn-flat" style="margin-left: 15px;">		
													<i class="fa fa-print" style="margin-right : 5px; "></i>
															Cetak
													</button>
													</div>
												</td>
											</tr>
										</table>

										<div style="padding: 10px;background-color: #ebebeb;margin-bottom:20px; width:100%">
											<h1>Total Pemasukan : Rp. <?= number_format($sum['TOTAL'], 0, ',', '.',) ?></h1>
										</div>
									</form>
								</div>
								<div class="col-md-12">
									<table id="exampleReport" class="table table-hover table-bordered">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">TANGGAL</th>
												<!-- <th scope="col">No Transaksi</th> -->
												<th scope="col">PEMASUKAN</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($hasil as $pg) : ?>
												<tr>
													<th scope="row"><?= $i; ?></th>
													<td><?= $pg['TANGGAL'] ?></td>
													<!-- <td><?= $pg['NO_TRANSAKSI'] ?></td> -->
													<td><?= "Rp. " . number_format($pg['TOTAL'], 0, ".", "."); ?></td>

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

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Pembayaran #<span id="no_transaksi"></span></h4>

			</div>
			<div class="modal-body">
				<!-- form start -->

				<div class="row">
					<div class="col-md-12">
						<form id="form1" name="form1" class="form-horizontal" action="" method="post">
							<div class="form-group row">

								<h5 for="inputEmail3" class="col-sm-6 col-form-label">Paket ( <span id="paket_cucian"></span>)</h5>

								<div class="col-sm-6">
									<input type="text" class="form-control text-right" id="harga_paket" name="harga_paket" onkeyup="sum()" readonly>
								</div>
							</div>
							<div class="form-group row">
								<h5 for="discount" class="col-sm-6 col-form-label">Discount</h5>

								<div class="col-sm-6">
									<input type="text" class="discount form-control text-right" id="discount" name="discount" onkeyup="sum()">
								</div>
							</div>
							<div class="form-group row">
								<h5 for="subtotal" class="col-sm-6 col-form-label">Sub Total</h5>

								<div class="col-sm-6">
									<input type="text" class="subtotal form-control text-right" id="subtotal" name="subtotal" onkeyup="sum()" readonly>
								</div>

							</div>
							<div class="form-group row">
								<h5 for="tambahan" class="col-sm-6 col-form-label">Tambahan</h5>

								<div class="col-sm-6">
									<input type="text" class="tambahan form-control text-right" id="tambahan" name="tambahan" onkeyup="sum()">
								</div>

							</div>
							<div class=" form-group row">
								<h5 for="totals" class="col-sm-6 col-form-label">Totals</h5>

								<div class="col-sm-6">
									<input type="hidden" class="ttl form-control text-right" id="ttl" name="ttl" onkeyup="sum()">
									<input type="text" class="totals form-control text-right" id="totals" name="totals" onkeyup="sum()" readonly>
								</div>

							</div>
							<div class="form-group row">
								<h5 for="inputPassword3" class="col-sm-6 col-form-label">Bayar</h5>

								<div class="col-sm-6">
									<input type="hidden" class="byr form-control text-right" id="byr" name="byr" onkeyup="sum()">
									<input type="text" class="bayar form-control text-right" id="bayar" name="bayar" onkeyup="sum()">
								</div>

							</div>
							<div class="form-group row">
								<h5 for="kembali" class="col-sm-6 col-form-label">Kembali</h5>
								<div class="col-sm-6">
									<input type="hidden" class="kbl form-control text-right" id="kbl" name="kbl" onkeyup="sum()">
									<input type="text" class="kembali form-control text-right" id="kembali" name="kembali" onkeyup="sum()" readonly>
								</div>
							</div>



							<div class="col-sm-12">
								<div class="form-group pull-right">
									<button type="submit" onclick="cek()" class="btn btn-info">Simpan</button>
									<button type="submit" class="btn btn-primary">Simpan & Cetak</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
