<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Queen Steam | Pembayaran</title>
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

	<!-- Google Font -->
	<style>
		body {
			background: rgb(204, 204, 204);
		}

		/* css bill paper */
		.page {
			width: 250mm;
			padding: 10mm;
			margin: 10mm auto;
			border: 1px #D3D3D3 solid;
			border-radius: 5px;
			background: white;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}
	</style>
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

					<h1 style="width:350px; font-weight: bold;">
					
					=============================================
					</h1>
					<table style="width: 100%;margin-bottom: 20px; font-size:35px; margin-bottom: 50px; line-height: 35px;">
						<tr>
							<td>No Pembayaran</td>
							<td>: <?= $transaksi['NO_TRANSAKSI'] ?></td>
						</tr>
						<tr>
							<td>No Kendaraan</td>
							<td>: <?= $transaksi['NOPLAT'] ?></td>
						</tr>
						<tr>
							<td>Tanggal & Waktu </td>
							<td>: <?= $transaksi['TANGGAL'] ?> <?= $transaksi['JAM'] ?></td>
						</tr>
						<tr>
							<td>Pelayan</td>
							<td>: <?= $transaksi['NAME'] ?></td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>: <?= $transaksi['ROLE'] ?></td>
						</tr>
					</table>
					<br style="line-height: 40px;">
					<table width="px" style="font-size:25px;">
						<thead style="font-weight: bold;">
							<tr style="border-bottom: 5px black dashed;padding-top: 40px;">
							</tr>
							<tr style="border-bottom: 5px black dashed;padding-top: 40px; font-size:30px;">
								<th width="300px">
									PAKET CUCIAN
								</th>
								<th width="5px" class="text-center">
									QTY
								</th>
								<th width="40px" class="text-right">
									HARGA
								</th>
								<th width="40px" class="text-right">
									SUBTOTAL
								</th>
							</tr>

						</thead>
						<tbody>
							<tr style="font-size:30px">
								<td >
									<?= $transaksi['JENIS_PAKET'] ?>
								</td>
								<td class="text-center">
									1
								</td>
								<td class="text-right">
									Rp. <?= number_format($transaksi['HARGA'], 0, '', '.') ?>
								</td>
								<td class="text-right">
									Rp. <?= number_format($transaksi['HARGA'], 0, '', '.') ?>
								</td>
							</tr>
							<tr>
								<td colspan="4" width="332px" style="font-weight:bold;font-size:35px">
									==============================================
								</td>
							</tr>
							<tr style="font-weight:bold;font-size:35px">
								<td colspan="2"></td>
								<th> 
									TOTALS
								</th>
								<td class="text-right">
									Rp. <?= number_format($transaksi['HARGA'], 0, '', '.') ?>
								</td>
							</tr>
							<tr style="font-weight:bold;font-size:35px">
								<td colspan="2"></td>
								<th >
									TUNAI
								</th>
								<td class="text-right">
									Rp. <?= number_format($transaksi['BAYAR'], 0, '', '.') ?>
								</td>
							</tr>
							<tr style="font-weight:bold;font-size:35px">
								<td colspan="2"></td>
								<th >
									KEMBALI
								</th>
								<td class="text-right">
									Rp. <?= number_format($transaksi['KEMBALI'], 0, '', '.') ?>
								</td>
							</tr>
							<tr>
								<td colspan="4" width="332px" style="font-weight:bold;font-size:35px">
									==============================================
								</td>
							</tr>
						</tbody>
					</table>

					<br style="line-height: 40px;">
					<h1 style="font-size: 40px; font-weight: bold;" class="text-center">
					***TERIMA KASIH ATAS KUNJUNGAN ANDA***
					***HATI-HATI DIJALAN***
					</h1>
					<br style="line-height: 40px;">
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
