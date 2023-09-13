 <!-- Content Wrapper. Contains page content -->
 <style>
 	.info-box {
 		border-radius: 10px;
 	}

 	.info-box-icon {
 		border-top-left-radius: 10px;
 		border-bottom-left-radius: 10px;
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
 			<li><a href="#"><i class="fa fa-dashboard"></i><?= $title; ?></a></li>
 		</ol>
 	</section>

 	<!-- Main content -->
 	<section class="content">
 		<!-- Small boxes (Stat box) -->
 		<div class="row">
 			<div class="col-lg-3 col-xs-6">
				
 				<!-- small box -->
 				<div class="info-box">
 					<span class="info-box-icon bg-green">
					<i class="fa fa-motorcycle"></i>
					</span>

 					<div class="info-box-content">
 						<span class="info-box-text">M O T O R</span>
 						<span class="info-box-number"><?= $data_motor; ?><small> UNIT</small></span>
 					</div>
 					<!-- /.info-box-content -->
 				</div>
 			</div>
 			<!-- ./col -->
 			<div class="col-lg-3 col-xs-6">
 				<!-- small box -->
 				<div class="info-box">
 					<span class="info-box-icon bg-light-blue disabled color-palette"><i class="fa fa-car"></i></span>

 					<div class="info-box-content">
 						<span class="info-box-text">M O B I L</span>
 						<span class="info-box-number"><?= $data_mobil; ?><small> UNIT</small></span>
 					</div>
 					<!-- /.info-box-content -->
 				</div>
 			</div>
 			<!-- ./col -->
 			<div class="col-lg-3 col-xs-6">
 				<!-- small box -->
 				<div class="info-box">
 					<span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>

 					<div class="info-box-content">
 						<span class="info-box-text">PEMASUKAN MOTOR</span>
 						<span class="info-box-number">
						<?= "Rp. " . number_format(($motor == null) ? 0 :
							$motor, 0, ".", "."); ?></span>
 					</div>
 					<!-- /.info-box-content -->
 				</div>
 			</div>
 			<!-- ./col -->
 			<div class="col-lg-3 col-xs-6">
 				<!-- small box -->
 				<div class="info-box">
 					<span class="info-box-icon bg-light-blue disabled color-palette"><i class="fa fa-database"></i></span>

 					<div class="info-box-content">
 						<span class="info-box-text">PEMASUKAN MOBIL</span>
 						<span class="info-box-number"> <?= "Rp. " . number_format(($mobil == null) ? 0 :
							$mobil, 0, ".", "."); ?></span>
 					</div>
 					<!-- /.info-box-content -->
 				</div>
 			</div>
 			<!-- ./col -->
 		</div>




 		<!-- row echartjs -->
 		<div class="row">
 			<div class="col-md-12">
 				<div class="box box-primary">
 					<div class="box-header with-border">
 						<h3 class="box-title">Grafik Pemasukkan, Pengeluaran & Laba</h3>
 						<br>
 						<br>
 						<form>
 							<label for="bulan">Pilih Bulan</label>
 							<input type="month" name="yearMonth" value="<?= $ym ?>">
 							<button type="submit">SUBMIT</button>

 						</form>
 					</div>
 					<div class="box-body">
 						<div class="chart">
 							<div id="barChart" style="height:500px"></div>
 						</div>
 					</div>
 					<div class="box-footer">
 						<div class="row">
 							<div class="col-sm-4 col-xs-6">
 								<div class="description-block border-right">
									<?php $pemasukansekarang = $laba_rugi['sum_total'];
										  $pemasukankemarin = $laba_rugi_prev['sum_total'];
									?>
 									<?php if ($pemasukansekarang == $pemasukankemarin) : ?>
 										<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
 									<?php elseif ($pemasukansekarang > $pemasukankemarin) : ?>
 										<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?= number_format($persentase_laba['pemasukkan'], 2, '.', '.') ?>%</span>
 									<?php elseif ($pemasukansekarang < $pemasukankemarin) : ?>
 										<span class="description-percentage text-danger"><i class="fa fa-caret-down"></i> <?= number_format($persentase_laba['pemasukkan'], 2, '.', '.') ?>%</span>
 									<?php else : ?>
 									<?php endif; ?>
 									<h5 class="" style="margin:0px;color:grey">Rp. <?= number_format($laba_rugi_prev['sum_total']) ?> (<?= date('Y F', strtotime($ymp)) ?>)</h5>
 									<h5 class="description-header">Rp. <?= number_format($laba_rugi['sum_total']) ?> (<?= date('Y F', strtotime($ym)) ?>)</h5>
 									<span class="description-text">TOTAL PEMASUKKAN </span>
 								</div>
 							</div>

 							<div class="col-sm-4 col-xs-6">
 								<div class="description-block border-right">
									<?php $pengeluaransekarang = $laba_rugi['sum_biaya'];
										$pengeluarankemarin = $laba_rugi_prev['sum_biaya'];
									?>
 									<?php if ($pengeluaransekarang == $pengeluarankemarin) : ?>
 										<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i>0%</span>
 									<?php elseif ($pengeluaransekarang > $pengeluarankemarin) : ?>
 										<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?= number_format($persentase_laba['pengeluaran'], 2, '.', ',') ?>%</span>
 									<?php elseif ($pengeluaransekarang < $pengeluarankemarin) : ?>
 										<span class="description-percentage text-danger"><i class="fa fa-caret-down"></i> <?= number_format($persentase_laba['pengeluaran'], 2, '.', ',') ?>%</span>
 									<?php else : ?>
 									<?php endif; ?>
 									<h5 class="" style="margin:0px;color:grey">Rp. <?= number_format($laba_rugi_prev['sum_biaya']) ?> (<?= date('Y F', strtotime($ymp)) ?>)</h5>
 									<h5 class="description-header">Rp. <?= number_format($laba_rugi['sum_biaya']) ?> (<?= date('Y F', strtotime($ym)) ?>)</h5>
 									<span class="description-text">TOTAL PENGELUARAN </span>
 								</div>
 							</div>


 							<div class="col-sm-4 col-xs-6">
 								<div class="description-block border-right">
									<?php
									$labasekarang = $laba_rugi['sum_laba']; 
									$labakemarin = $laba_rugi_prev['sum_laba'];
									?>
 									<?php if ($labasekarang == $labakemarin) : ?>
 										<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
 									<?php elseif ($labasekarang > $labakemarin) : ?>
 										<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?= number_format($persentase_laba['laba'], 2, '.', ',') ?>%</span>
										
 									<?php elseif ($labasekarang < $labakemarin) : ?>
 										<span class="description-percentage text-danger"><i class="fa fa-caret-down"></i> <?= number_format($persentase_laba['laba'], 2, '.', ',') ?>%</span>
 									<?php else : ?>
 									<?php endif; ?>
 									<h5 class="" style="margin:0px;color:grey">Rp. <?= number_format($laba_rugi_prev['sum_laba']) ?> (<?= date('Y F', strtotime($ymp)) ?>)</h5>
 									<h5 class="description-header">Rp. <?= number_format($laba_rugi['sum_laba']) ?> (<?= date('Y F', strtotime($ym)) ?>)</h5>
 									<span class="description-text">TOTAL LABA </span>
 								</div>
 							</div>
 						</div>

 					</div>
 				</div>
 			</div>

 			<!-- <div class="col-md-6">
 				<div class="box box-primary">
 					<div class="box-header with-border">
 						<h3 class="box-title">Grafik Pemasukan</h3>
 					</div>
 					<div class="box-body">
 						<div class="chart">
 							<div id="pieChart" style="height:500px"></div>
 						</div>
 					</div>
 				</div>
 			</div> -->
 		</div>







 		<!-- /.row -->
 	</section>
 	<!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- script echartjs -->
 <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.0/dist/echarts.min.js"></script>
 <script>
 	var chartDom = document.getElementById('barChart');
 	var myChart = echarts.init(chartDom);
 	var option;


 	const colors = ['green', 'red', 'blue'];
 	option = {
 		color: colors,
 		tooltip: {
 			trigger: 'axis',
 			axisPointer: {
 				type: 'cross'
 			}
 		},
 		grid: {
 			right: '10%',
 			left: '5%',
 		},
 		toolbox: {
 			feature: {
 				dataView: {
 					show: true,
 					readOnly: false
 				},
 				restore: {
 					show: true
 				},
 				saveAsImage: {
 					show: true
 				}
 			}
 		},
 		legend: {
 			data: ['Pemasukkan', 'Pengeluaran', 'Laba']
 		},
 		xAxis: [{
 			type: 'category',
 			axisTick: {
 				alignWithLabel: true
 			},
 			// prettier-ignore
 			data: <?= json_encode($laba_rugi['tanggal']) ?>
 		}],
 		yAxis: [{
 			type: 'value',
 			name: '',
 			position: 'right',
 			alignTicks: true,
 			axisLine: {
 				show: true,
 				lineStyle: {
 					color: colors[0]
 				}
 			},
 			axisLabel: {
 				formatter: '{value} '
 			}
 		}],
 		dataZoom: [{
 				show: true,
 				realtime: true,
 				start: 0,
 				end: 100,
 				xAxisIndex: [0, 1]
 			},
 			{
 				type: 'inside',
 				realtime: true,
 				start: 0,
 				end: 100,
 				xAxisIndex: [0, 1]
 			}
 		],
 		series: [{
 				name: 'Pemasukkan',
 				type: 'bar',
 				data: <?= json_encode($laba_rugi['total']) ?>
 			},
 			{
 				name: 'Pengeluaran',
 				type: 'bar',
 				data: <?= json_encode($laba_rugi['biaya']) ?>
 			},
 			{
 				name: 'Laba',
 				type: 'line',
 				data: <?= json_encode($laba_rugi['laba']) ?>
 			}
 		]
 	};

 	option && myChart.setOption(option);
 </script>

 <script>
 	var chartDom = document.getElementById('pieChart');
 	var myChart = echarts.init(chartDom);
 	var option;

 	option = {
 		legend: {
 			top: 'bottom'
 		},
 		toolbox: {
 			show: true,
 			feature: {
 				mark: {
 					show: true
 				},
 				dataView: {
 					show: true,
 					readOnly: false
 				},
 				restore: {
 					show: true
 				},
 				saveAsImage: {
 					show: true
 				}
 			}
 		},
 		series: [{
 			name: 'Nightingale Chart',
 			type: 'pie',
 			radius: [50, 250],
 			center: ['50%', '50%'],
 			roseType: 'area',
 			itemStyle: {
 				borderRadius: 8
 			},
 			data: [{
 					value: 40,
 					name: 'rose 1'
 				},
 				{
 					value: 38,
 					name: 'rose 2'
 				},
 				{
 					value: 32,
 					name: 'rose 3'
 				},
 				{
 					value: 30,
 					name: 'rose 4'
 				},
 				{
 					value: 28,
 					name: 'rose 5'
 				},
 				{
 					value: 26,
 					name: 'rose 6'
 				},
 				{
 					value: 22,
 					name: 'rose 7'
 				},
 				{
 					value: 18,
 					name: 'rose 8'
 				}
 			]
 		}]
 	};

 	option && myChart.setOption(option);
 </script>
