<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li class="">
				<a href="<?= base_url('dashboard'); ?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-exchange"></i> <span>Transaksi </span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?= base_url('transaksi'); ?>"><i class="fa fa-circle-o"></i>Pencucian</a></li>
					<li><a href="<?= base_url('transaksi/daftarPengeluaran'); ?>"><i class="fa fa-circle-o"></i>Pengeluaran</a></li>
					<li><a href="<?= base_url('transaksi/daftarPembayaran'); ?>"><i class="fa fa-circle-o"></i>Daftar Pembayaran</a></li>
				</ul>
			</li>
			<?php if($user['ROLE_ID'] == 1): ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-database"></i> <span>Master Data</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?= base_url('paket'); ?>"><i class="fa fa-circle-o"></i> Paket Cucian</a></li>
					<li><a href="<?= base_url('pengguna'); ?>"><i class="fa fa-circle-o"></i> Pengguna</a></li>
				</ul>
			</li>
			<?php endif; ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-book"></i> <span>Laporan </span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?= base_url('laporan'); ?>"><i class="fa fa-circle-o"></i>Transaksi</a></li>
					<li><a href="<?= base_url('laporan/pengeluaran'); ?>"><i class="fa fa-circle-o"></i>Pengeluaran</a></li>
					<li><a href="<?= base_url('laporan/pemasukan'); ?>"><i class="fa fa-circle-o"></i>Pemasukan</a></li>
					<li><a href="<?= base_url('laporan/labaRugi'); ?>"><i class="fa fa-circle-o"></i>Laba-Rugi</a></li>
				</ul>
			</li>
			

	</section>
	<!-- /.sidebar -->
</aside>
