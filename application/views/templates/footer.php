<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 1.0 Beta
	</div>
	<strong>Copyright &copy; <?= date('Y'); ?> <a href="#">QueenSTEAM</a>.</strong> All rights
	reserved.
</footer>

<aside class="control-sidebar control-sidebar-dark" style="display: none;">
	<!-- Create the tabs -->
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
		<!-- Home tab content -->
		<div class="tab-pane" id="control-sidebar-home-tab">
			<h3 class="control-sidebar-heading">Recent Activity</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-birthday-cake bg-red"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

							<p>Will be 23 on April 24th</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-user bg-yellow"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

							<p>New phone +1(800)555-1234</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

							<p>nora@example.com</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-file-code-o bg-green"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

							<p>Execution time 5 seconds</p>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->

			<h3 class="control-sidebar-heading">Tasks Progress</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Custom Template Design
							<span class="label label-danger pull-right">70%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Update Resume
							<span class="label label-success pull-right">95%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-success" style="width: 95%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Laravel Integration
							<span class="label label-warning pull-right">50%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Back End Framework
							<span class="label label-primary pull-right">68%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->

		</div>
		<!-- /.tab-pane -->
		<!-- Stats tab content -->
		<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
		<!-- /.tab-pane -->
		<!-- Settings tab content -->
		<div class="tab-pane" id="control-sidebar-settings-tab">
			<form method="post">
				<h3 class="control-sidebar-heading">General Settings</h3>

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Report panel usage
						<input type="checkbox" class="pull-right" checked>
					</label>

					<p>
						Some information about this general settings option
					</p>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Allow mail redirect
						<input type="checkbox" class="pull-right" checked>
					</label>

					<p>
						Other sets of options are available
					</p>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Expose author name in posts
						<input type="checkbox" class="pull-right" checked>
					</label>

					<p>
						Allow the user to show his name in blog posts
					</p>
				</div>
				<!-- /.form-group -->

				<h3 class="control-sidebar-heading">Chat Settings</h3>

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Show me as online
						<input type="checkbox" class="pull-right" checked>
					</label>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Turn off notifications
						<input type="checkbox" class="pull-right">
					</label>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Delete chat history
						<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
					</label>
				</div>
				<!-- /.form-group -->
			</form>
		</div>
		<!-- /.tab-pane -->
	</div>
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/raphael/raphael.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/') ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/') ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Select2 -->
<script src="<?= base_url('assets/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets/') ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url('assets/') ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url('assets/') ?>plugins/iCheck/icheck.min.js"></script>
<!-- Page script -->

<!-- SweetAlert -->
<script src="<?= base_url('assets/'); ?>js/myjvs/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/'); ?>js/myjvs/myscript.js" type="text/javascript"></script>
<!-- sr datatable button export
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" type="text/javascript"></script> -->

<script type="text/javascript">
	// $(function() {
	// 	$('#example1').DataTable({
	// 		'paging': true,
	// 		'lengthChange': false,
	// 		'searching': true,
	// 		'ordering': true,
	// 		'info': true,
	// 		"responsive": true,
	// 		'autoWidth': false
	// 	})
	// })
	// $(function() {
	// 	// $('#exampleReport').DataTable({
	// 	// 	dom: 'Bfrtip',
	// 	// 	buttons: [
	// 	// 		'copyHtml5',
	// 	// 		'excelHtml5',
	// 	// 		'csvHtml5',
	// 	// 		'pdfHtml5'
	// 	// 	],
	// 	// 	'paging': true,
	// 	// 	'lengthChange': false,
	// 	// 	'searching': true,
	// 	// 	'ordering': true,
	// 	// 	'info': true,
	// 	// 	"responsive": true,
	// 	// 	'autoWidth': false
	// 	// })
	// })
</script>
<script>
	/** add active class and stay opened when selected */
	var url = window.location;

	// for sidebar menu entirely but not cover treeview
	$('ul.sidebar-menu a').filter(function() {
		return this.href == url;
	}).parent().addClass('active');

	// for treeview
	$('ul.treeview-menu a').filter(function() {
		return this.href == url;
	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>
<script>
	function newTransaksi(url){
    var x = window.open('<?= base_url('laporan/cetak_laporan_transaksi?tgl_awal='. $tgl_awal.'& tgl_akhir='.$tgl_akhir) ?>');
    x.focus();
	}

	function newPengeluaran(url){
    var x = window.open('<?= base_url('laporan/cetak_laporan_pengeluaran?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir); ?>');
    x.focus();
	}

	function newPemasukan(url){
    var x = window.open('<?= base_url('laporan/cetak_laporan_pemasukan?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir); ?>');
    x.focus();
	}

	function newLabaRugi(url){
    var x = window.open('<?= base_url('laporan/cetak_laporan_labarugi?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir); ?>');
    x.focus();
	}
</script>
<script>
	

	setTimeout(() => {
		$('#bayar').val(1);
		$('#bayar').val(0);
		$('#bayar').focus();
	}, 500);


	function cek() {
		var nota = document.getElementById("nota").value;
		var byr = document.getElementById("byr").value;
		var ttl = document.getElementById("ttl").value;
		var kbl = document.getElementById("kbl").value;
		byar = parseInt(byr);
		ttl = parseInt(ttl);

		if (byar < ttal || byr == 0 || byr == '' || ttl == 0 || ttl == '') {
			Swal.fire({
				title: 'Transaksi pembayaran gagal.',
				text: 'Periksa kembali inputan anda',
				icon: 'error',
				showConfirmButton: true,
			});
		} else {
			$("#form1").submit();
		}
	}

	function just_save() {
		var nota = document.getElementById("nota").value;
		var byr = document.getElementById("byr").value;
		var ttl = document.getElementById("ttl").value;
		var kbl = document.getElementById("kbl").value;
		byar = parseInt(byr);
		ttal = parseInt(ttl);

		if (byar < ttal || byr == 0 || byr == '' || ttl == 0 || ttl == '') {
			Swal.fire({
				title: 'Transaksi pembayaran gagal.',
				text: 'Periksa kembali inputan anda',
				icon: 'error',
				showConfirmButton: true,
			});

		} else {
			$('#actionPembayaran').val('save');
			$('#form1').submit();
		}
	}
</script>

<script>
	$('#bayar').keypress(function(e) {
		var nota = document.getElementById("nota").value;
		var byr = document.getElementById("byr").value;
		var ttl = document.getElementById("ttl").value;
		var kbl = document.getElementById("kbl").value;
		byar = parseInt(byr);
		ttal = parseInt(ttl);
		if (e.which == 13) {
			if (byar < ttal || byr == 0) {
				Swal.fire({
					title: 'Transaksi pembayaran gagal.',
					text: 'Periksa kembali inputan anda',
					icon: 'error',
					showConfirmButton: true,
				});

			} else {
				$('#form1').submit();
			}

		}
	})
</script>
<!--  -->
<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({
			changeMonth: true,
        	changeYear: true
	  });
		//Initialize Select2 Elements
		
		$('.select2').select2();
		//Date range as a button

		// 	function(start, end) {
		// 		$('#daterange-btn span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'))
		// 		$("#example1").DataTable().destroy();
		// 		$("#example1").DataTable({
		// 			"searching": true,
		// 			"responsive": true,
		// 			"autoWidth": false,
		// 			"lengthChange": true,
		// 			"ordering": true,
		// 			"processing": true,
		// 			"order": [],
		// 			"ajax": {
		// 				url: "<?= base_url("laporan/search") ?>",
		// 				type: "POST",
		// 				data: {
		// 					start_date: start.format('YYYY-MM-DD'),
		// 					end_date: end.format('YYYY-MM-DD')
		// 				},

		// 			},
		// 			"columns": [{
		// 					"data": "NO_TRANSAKSI"
		// 				},
		// 				{
		// 					"data": "TANGGAL"
		// 				},
		// 				{
		// 					"data": "NOPLAT"
		// 				},
		// 				{
		// 					"data": "JENIS_KENDARAAN"
		// 				},
		// 				{
		// 					"data": "JENIS_PAKET"
		// 				},
		// 				{
		// 					"data": "HARGA"
		// 				},

		// 			],

		// 			"footerCallback": function(row, data, start, end, display) {
		// 				var api = this.api(),
		// 					data;

		// 				// Remove the formatting to get integer data for summation
		// 				var intVal = function(i) {
		// 					return typeof i === 'string' ?
		// 						i.replace(/[^\d]/g, "") * 1 :
		// 						typeof i === 'number' ?
		// 						i : 0;
		// 				};

		// 				// Total over all pages
		// 				total = api
		// 					.column(5)
		// 					.data()
		// 					.reduce(function(a, b) {
		// 						return intVal(a) + intVal(b);
		// 					}, 0);

		// 				// Total over this page
		// 				pageTotal = api
		// 					.column(5, {
		// 						page: 'current'
		// 					})
		// 					.data()
		// 					.reduce(function(a, b) {
		// 						return intVal(a) + intVal(b);
		// 					}, 0);

		// 				// Update footer
		// 				$(api.column(5).footer()).html(
		// 					'Rp. ' + iniRp(pageTotal) + '</br>  Rp. ' + iniRp(total) + ' Sub Total'
		// 				);


		// 			}
		// 		});
		// 	}
		// )
	})
</script>
</body>

</html>




<script>
	$('.custom-file-input').on('change', function() {
		let filename = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(filename);
	});

	$('.form-check-input').on('click', function() {
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');

		$.ajax({
			url: "<?= base_url('admin/changeaccess')  ?>",
			type: "post",
			data: {
				menuId: menuId,
				roleId: roleId
			},
			success: function() {
				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" +
					roleId;
			}
		});
	});
</script>

<script>
	function select_data($id, $menu) {
		$('#id').val($id);
		$('#menu').val($menu);
	}

	function refresh() {
		$('#id').val("");
		$('#menu').val("");
	}
</script>

<script>
	function select_submenu($id, $title, $menu, $url, $icon) {
		$('#id').val($id);
		$('#title').val($title);
		$('#menu').val($menu);
		$('#url').val($url);
		$('#icon').val($icon);
	}


	function refresh() {
		$('#id').val("");
		$('#title').val("");
		$('#menu').val("");
		$('#url').val("");
		$('#icon').val("");
	}
</script>


<script type='text/javascript'>
	function get_values() {
		var ID_PAKET = $("#paket").val();

		$.post("<?= base_url('transaksi/getharga/'); ?>" + ID_PAKET,

			function(data) {
				$('#harga').val(data.harga_paket);
			}
		);
	}

	$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
		$("#kendaraan").change(function() { // Ketika user mengganti atau memilih data kendaraan
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "<?php echo base_url("transaksi/getPaket"); ?>", // Isi dengan url/path file php yang dituju
				data: {
					ID_KENDARAAN: $("#kendaraan").val()
				}, // data yang akan dikirim ke file yang dituju
				dataType: "json",
				beforeSend: function(e) {
					if (e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response) { // Ketika proses pengiriman berhasil
					// lalu munculkan kembali combobox kotanya
					$("#paket").html(response.daftar_paket).show();
				},
				error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
		<?php if (isset($transaksi)) : ?>
			setPaket();

			function setPaket() {
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: "<?php echo base_url("transaksi/getPaket?id=" . $transaksi['NO_TRANSAKSI']); ?>", // Isi dengan url/path file php yang dituju
					data: {
						ID_KENDARAAN: $("#kendaraan").val()
					}, // data yang akan dikirim ke file yang dituju
					dataType: "json",
					beforeSend: function(e) {
						if (e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response) { // Ketika proses pengiriman berhasil
						// lalu munculkan kembali combobox kotanya
						$("#paket").html(response.daftar_paket).show();
					},
					error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
						alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
					}
				});
			}
		<?php endif; ?>


	});
</script>


<script>
	function ubahtransaksi($NO_TRANSAKSI, $NOPLAT, $ID_KENDARAAN, $ID_PAKET, $HARGA) {
		$('#notrank').val($NO_TRANSAKSI);
		$('#nopol').val($NOPLAT);
		$('#idken').val($ID_KENDARAAN);
		$('#idpaket').val($ID_PAKET);
		$('#total').val($HARGA);
	}
</script>

<script type="text/javascript">
	setfocus();

	function setfocus() {
		var input = document.getElementById("byr");
		input.focus();
	}



	function otomatis() {
		var test = form2.noplat.value.match(/[a-zA-Z]+|[0-9]+/g);
		form2.noplat.value = test.join(" ");
	}

	function kapital() {
		var x = document.getElementById("noplat");
		x.value = x.value.toUpperCase();
	}

	function sum() {
		var a = form1.harga_paket.value.replace(/[^\d]/g, "");
		var b = form1.bayar.value.replace(/[^\d]/g, "");
		var c = form1.discount.value.replace(/[^\d]/g, "");
		var d = form1.tambahan.value.replace(/[^\d]/g, "");
		var f = form1.subtotal.value.replace(/[^\d]/g, "");
		var g = form1.totals.value.replace(/[^\d]/g, "");

		var a = +a; // converts 'a' from a string to an int
		var b = +b; // converts 'b' from a string to an int
		var c = +c;
		var d = +d;
		var f = +f;
		var g = +g;



		form1.harga_paket.value = formatNum(a);
		form1.discount.value = formatNum(c);
		form1.tambahan.value = formatNum(d);
		form1.totals.value = formatNum(a - ((c / 100) * a) + (d));
		form1.bayar.value = formatNum(b);
		var diskon = ((c / 100) * a);
		form1.subtotal.value = formatNum((a) - diskon);
		var kembalian = ((a - (c / 100) * a) + (d));
		form1.kembali.value = formatNum(b - kembalian);
		form1.ttl.value = (a - ((c / 100) * a) + (d));
		form1.byr.value = (b);
		form1.kbl.value = ((b) - kembalian);

	}

	function formatNum(rawNum) {
		rawNum = "" + rawNum; // converts the given number back to a string
		var retNum = "";
		var j = 0;
		for (var i = rawNum.length; i > 0; i--) {
			j++;
			if (((j % 3) == 1) && (j != 1))
				retNum = rawNum.substr(i - 1, 1) + "." + retNum;
			else
				retNum = rawNum.substr(i - 1, 1) + retNum;
		}
		return retNum;
	}
</script>
<!-- <script type="text/javascript" language="javascript" src='https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js' defer></script>
<script type="text/javascript" language="javascript" src='https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js' defer></script>
<script type="text/javascript" language="javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js' defer></script>
<script type="text/javascript" language="javascript" src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js' defer></script>
<script type="text/javascript" language="javascript" src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js' defer></script>
<script type="text/javascript" language="javascript" src='https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js' defer></script>
<script type="text/javascript" language="javascript" src='https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js' defer></script> -->
<script>

	function iniRp(rawNum) {
		rawNum = "" + rawNum; // converts the given number back to a string
		var retNum = "";
		var j = 0;
		for (var i = rawNum.length; i > 0; i--) {
			j++;
			if (((j % 3) == 1) && (j != 1))
				retNum = rawNum.substr(i - 1, 1) + "." + retNum;
			else
				retNum = rawNum.substr(i - 1, 1) + retNum;
		}
		return retNum;
	}
	$(document).ready(function() {

		$("#example1").DataTable({
			"searching": true,
			"responsive": true,
			"autoWidth": false,
			"lengthChange": false,
			"ordering": true,
			"footerCallback": function(row, data, start, end, display) {
				var api = this.api(),
					data;

				// Remove the formatting to get integer data for summation
				var intVal = function(i) {
					return typeof i === 'string' ?
						i.replace(/[^\d]/g, "") * 1 :
						typeof i === 'number' ?
						i : 0;
				};

				// Total over all pages
				total = api
					.column(5)
					.data()
					.reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);

				// Total over this page
				pageTotal = api
					.column(5, {
						page: 'current'
					})
					.data()
					.reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);

				// Update footer
				$(api.column(5).footer()).html(
					'Rp. ' + iniRp(pageTotal) + '</br> Sub Total  Rp. ' + iniRp(total)
				);

			}
		});


		$("#exampleReport").DataTable({
			// dom: 'Bfrtip',
			"searching": true,
			"responsive": true,
			"autoWidth": true,
			"lengthChange": false,
			"ordering": true,
			"footerCallback": function(row, data, start, end, display) {
				var api = this.api(),
					data;

				// Remove the formatting to get integer data for summation
				var intVal = function(i) {
					return typeof i === 'string' ?
						i.replace(/[^\d]/g, "") * 1 :
						typeof i === 'number' ?
						i : 0;
				};

				

			}
		});
	});
</script>

</body>

</html>
