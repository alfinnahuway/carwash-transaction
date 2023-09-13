<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Queen Steam | Laporan Pengeluaran</title>
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
					<h1>Laporan Pengeluaran <?= $page; ?></h1>
					<table id="table_print" class="table table-bordered table-striped">
                                        <thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Tanggal</th>
												<th scope="col">Alasan</th>
												<th scope="col" class="text-right">Biaya</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($hasil as $pg) : ?>
												<tr>
													<th scope="row"><?= $i; ?></th>
													<td><?= $pg['TANGGAL'] ?></td>
													<td><?= $pg['ALASAN'] ?></td>
													<td class="text-right"><?= "Rp. " . number_format($pg['BIAYA'], 0, ".", "."); ?></td>

												</tr>
												<?php $i++ ?>
											<?php endforeach; ?>
										</tbody>
										<table id="table_print" class="table">
										<thead>
											    <tr>
                                                <th width="20"></th>
                                                <th width="50" class="text-center"></th>
                                                <th width="100" class="text-right">
                                                </th>
                                                <th width="150" class="text-right">
												<h1>Total Laporan Transaksi : Rp. <?= number_format($sum['BIAYA'], 0, ',', '.',) ?></h1>
                                                </th>
											</tr>
                                            </thead>
										</table>
									</table>
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
