<footer class="main-footer">
	<div class="hidden-xs">
		<b>Version</b> 1.0 Beta
	</div>
	<strong>Copyright &copy; <?= date('Y'); ?> <a href="#">QueenSTEAM</a>.</strong> All rights
	reserved.
</footer>
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
<!-- sr datatable button export -->
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() { 
		$("#table_print").DataTable({
			"searching": false,
			"responsive": true,
			"autoWidth": false,
			"lengthChange": false,
			"ordering": false,
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
	});

    function(start, end) {
				$('#daterange-btn span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'))
				$("#table_print").DataTable().destroy();
				$("#table_print").DataTable({
					"searching": true,
					"responsive": true,
					"autoWidth": false,
					"lengthChange": true,
					"ordering": true,
					"processing": true,
					"order": [],
					"ajax": {
						url: "<?= base_url("laporan/search") ?>",
						type: "POST",
						data: {
							start_date: start.format('YYYY-MM-DD'),
							end_date: end.format('YYYY-MM-DD')
						},

					},
					"columns": [{
							"data": "NO_TRANSAKSI"
						},
						{
							"data": "TANGGAL"
						},
						{
							"data": "NOPLAT"
						},
						{
							"data": "JENIS_KENDARAAN"
						},
						{
							"data": "JENIS_PAKET"
						},
						{
							"data": "HARGA"
						},

					],

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
							'Rp. ' + iniRp(pageTotal) + '</br>  Rp. ' + iniRp(total) + ' Sub Total'
						);


					}
				});
			}
</script>