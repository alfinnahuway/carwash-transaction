<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Queen Steam | Laporan Laba-Rugi</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/AdminLTE.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="window.print();">

	<!-- <body> -->
	<div class="page">
		<!-- Main content -->
		<section class="content pull-center">
			<!-- title row -->

			<div class="row">
				<div class="col-md-12" style="line-height:50px;">
					<h1 style="font-size: 100px; font-weight: bold;" class="text-center">
						Queen<span style="font-size: 100px; font-weight: lighter;" >STEAM.</span><br>
						<h3 style="font-size: 30px; font-weight: bold;" class="text-center">Bekasi Timur Regensi Jalan Elang 9 No, Jl. Raya Bekasi Timur Regensi No.7, RT.001/RW.008, Cimuning, Kec. Mustika Jaya, Kota Bekasi</h3>
						
					</h1>

					<br>
					<h1>Laporan Laba-Rugi <?= $page; ?></h1>
					<table id="table_print" class="table table-bordered table-striped">
                    <thead>
											<tr>
												<th scope="col" width="20">#</th>
												<th scope="col" width="100" class="text-center">Tanggal</th>
												<th scope="col" width="100" class="text-right">PEMASUKKAN</th>
												<th scope="col" width="100" class="text-right">PENGELUARAN</th>
												<th scope="col" width="100" class="text-right">LABA</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($hasil as $pg) : ?>
												<tr style="text-align: right">
													<th scope="row"><?= $i; ?></th>
													<td class="text-center"><?= $pg['TANGGAL'] ?></td>
													<td><?= "Rp. " . number_format($pg['TOTAL'], 0, ".", "."); ?></td>
													<td><?= "Rp. " . number_format($pg['BIAYA'], 0, ".", "."); ?></td>
													<td><?= "Rp. " . number_format($pg['LABA'], 0, ".", "."); ?></td>
												</tr>
												<?php $i++ ?>
											<?php endforeach; ?>
										</tbody>
					                    </table>
                                        <table id="table_print" class="table">
                                            <thead>
											    <tr>
                                                <th width="20"></th>
                                                <th width="50" class="text-center"></th>
												<th width="100" class="text-right">
                                                <span style="font-size: 20px;">Total Pemasukkan : <span style="color:blue;font-weight: bolder;">Rp. <?= number_format($sum['pemasukkan'], 0, ',', '.',) ?></span></span>
                                                </th>
                                                <th width="100" class="text-right">
                                                <span style="font-size: 20px;">Total Pengeluaran : <span style="color:red;font-weight: bolder;">Rp. <?= number_format($sum['pengeluaran'], 0, ',', '.',) ?></span></span>
                                                </th>
                                                <th width="100" class="text-right">
                                                <span style="font-size: 20px;;">Total Laba : <span style="color:green;font-weight: bolder;">Rp. <?= number_format($sum['laba'], 0, ',', '.',) ?> </span>
                                                </th>
											</tr>
                                            </thead>
                                        </table>
									</form>
								</div>
				</div>
				<!-- /.col -->
			</div>

	</div>


	</section>
	<!-- /.content -->

	</div>
	<!-- ./wrapper -->
	
</body>

</html>
