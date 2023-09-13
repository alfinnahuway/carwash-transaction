<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			<?= $page; ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= base_url('transaksi') ?>"><i class="fa fa-exchange"></i><?= $title; ?></a></li>
			<li class="active"><?= $page; ?></li>
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
              <div class="box-body">
              <form id="form1" name="form1" class="form-horizontal" action="<?= base_url('transaksi/pembayaran/'.$id); ?>" method="post">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-xs-12">
                      <h2 class="page-header">
                      <?php if ($id) : ?>
                    <?php if ($cucian['ID_KENDARAAN'] == 1) : ?>
                      <i class="fa fa-motorcycle"></i>
                    <?php else : ?>
                      <i class="fa fa-car"></i>
                    <?php endif; ?>
                    <?php else : ?>
                      <i class="fa fa-close"></i>
                    <?php endif; ?>  
                        <small class="pull-right">Tanggal: <?= $cucian['TANGGAL']; ?></small>
                      </h2>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col">
                      Pelayan
                      <input style="font-weight: bold" type="text" class="form-control" <?php if ($id) : ?> value="<?= $cucian['NAME']; ?>" <?php else : ?> value="" <?php endif; ?> readonly>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 invoice-col">
                      Jabatan
                      <input style="font-weight: bold" type="text" class="form-control" <?php if ($id) : ?> value="<?= $cucian['ROLE']; ?>" <?php else : ?> value="" <?php endif; ?> readonly>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 invoice-col">
                      Nomor Transaksi
                      <input style="font-weight: bold" type="text" class="form-control" id="nota" name="nota" <?php if ($id) : ?> value="<?= $cucian['NO_TRANSAKSI']; ?>" <?php else : ?> value="" <?php endif; ?> readonly>
                    </div>
                    <!-- /.col -->
                <div class="col-sm-3 invoice-col">
                      Nomor Kendaraan
                      <input style="font-weight: bold" type="text" class="form-control" id="noplat" name="noplat" <?php if ($id) : ?> value="<?= $cucian['NOPLAT']; ?>" <?php else : ?> value="" <?php endif; ?> readonly>
                    </div>
                  </div>
                  <!-- /.row -->

                  <!-- Table row -->
                  <div class="row">
                    <div class="col-xs-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>KENDARAAN</th>
                          <th style="width: 20%">PAKET</th>
                          <th class="text-center" style="width: 5%">QTY</th>
                          <th class="text-right" >HARGA PAKET</th>
                          <th class="text-right" style="width: 24%">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                
                        <tr>
                          <td>1</td>
                          <td><?= $cucian['JENIS_KENDARAAN']; ?></td>
                          <td><?= $cucian['JENIS_PAKET']; ?></td>
                          <td class="text-center">1</td>
                          <td class="text-right"><?= number_format($cucian['HARGA'], 0, ".", "."); ?></td>
                          <td class="text-right">
                              <input type="text" class="form-control text-right" id="harga_paket" name="harga_paket" onkeyup="sum()" <?php if ($id) : ?> value="<?= number_format($cucian['HARGA'], 0, ".", "."); ?>" <?php else : ?> value="0" <?php endif; ?> readonly>
                          </td>
                        </tr>
              
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                <div class="flash-data-kurang" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

                

                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-6">
                      <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <td>
                            <input type="hidden" class="discount form-control text-right" id="discount" name="discount" onkeyup="sum()" value="0">
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th style="width:50%">Sub Total :</th>
                            <td>
                            <input type="text" class="subtotal form-control text-right" id="subtotal" name="subtotal" onkeyup="sum()" <?php if ($id) : ?> value="<?= number_format($cucian['HARGA'], 0, ".", "."); ?>" <?php else : ?> value="0" <?php endif; ?> readonly>
                            <input type="hidden" class="tambahan form-control text-right" id="tambahan" name="tambahan" onkeyup="sum()" value="0">
                            <input type="hidden" class="ttl form-control text-right" id="ttl" name="ttl" onkeyup="sum()">
                            <input type="hidden" class="totals form-control text-right" id="totals" name="totals" onkeyup="sum()" <?php if ($id) : ?> value="<?= number_format($cucian['HARGA'], 0, ".", "."); ?>" <?php else : ?> value="0" <?php endif; ?> readonly>
                            </td>
                          </tr>
                          <tr>
                            <th>Bayar :</th>
                            <td>
                              <input type="hidden" class="byr form-control text-right" id="byr" name="byr" value="" onkeyup="sum()">
                              <input style="font-weight:bold" type="text" class="bayar form-control text-right" id="bayar" name="bayar"  onkeyup="sum()" value="0" autofocus>
                            </td>
                          </tr>
                          <tr>
                            <th>Kembalian :</th>
                            <td>
                                <input type="hidden" class="kbl form-control text-right" id="kbl" name="kbl" onkeyup="sum()">
                                <input style="font-weight:bold" type="text" class="kembali form-control text-right input-lg" id="kembali" name="kembali" onkeyup="sum()" value="0" readonly>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
              
                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <input type="hidden" value="" id="actionPembayaran" name="action">
                      <input type="hidden" value="" id="actionEnter" name="actionenter">
                      <button type="button" class="btn btn-primary pull-right" style="margin-left: 5px;" onclick="cek()">
                        <i class="fa fa-print" style="margin-right: 5px;"></i>Simpan & Cetak
                      </button>	
                      <button type="button" class="btn btn-success pull-right" onclick="just_save()"><i class="fa fa-fw fa-save"></i> Simpan Pembayaran
                      </button>
                      
                        </div>
                      </div>
                    </form>
      </div>
      </div>
      </div>
    </div>
    </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>




