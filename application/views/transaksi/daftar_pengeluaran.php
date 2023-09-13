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
			<li><a href="#"><i class="fa fa-exchange"></i><?= $title; ?></a></li>
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
							<div class="flash-data-pengeluaran" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
							<div class="row">
								<div class="col-md-12">
									<a href="<?= base_url('transaksi/daftarPengeluaranTambah'); ?>">
										<button class="btn btn-primary pull-right btn-sm btn-flat" style="margin-bottom: 10px;">
											<i class="fa fa-plus" style="margin-right: 5px;"></i>
											Tambah Data
										</button>
									</a>
								</div>
								<div class="col-md-12">
								<div class="box-body table-responsive no-padding">
									<table id="example1" class="table table-hover">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th scope="col" class="text-center">TANGGAL</th>
												<th scope="col">DESKRIPSI</th>
												<th scope="col" class="text-right">PENGELUARAN</th>
												<th scope="col"></th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($pengeluaran as $pg) : ?>
												<tr>
													<th class="text-center"><?= $i; ?></th>
													<td class="text-center"><?= $pg['TANGGAL'] ?></td>
													<td><?= $pg['ALASAN'] ?></td>
													<td class="text-right"><?= "Rp. " . number_format($pg['BIAYA'], 0, ".", "."); ?></td>
													<td class="text-center">
														<a href="<?php echo base_url('/transaksi/editPengeluaran/' . $pg['NO_KELUARAN']) ?>" class="btn btn-warning btn-xs btn-flat">
															<i class="fa fa-edit"></i>
															Edit
														</a>
														<a href="<?php echo base_url('/transaksi/hapusPengeluaran/' . $pg['NO_KELUARAN']) ?>" class="btn btn-danger btn-xs tombol-hapus btn-flat">
															<i class="fa fa-trash"></i>
															Hapus
														</a>
													</td>
												</tr>
												<?php $i++ ?>
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
