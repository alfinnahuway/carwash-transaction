<!-- Content Wrapper. Contains page content -->
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
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                            <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?= base_url('transaksi/tambahTransaksi'); ?>">
                                                <button class="btn btn-primary pull-right btn-sm btn-flat" style="margin-bottom: 10px;">
                                                    <i class="fa fa-plus" style="margin-right : 5px; "></i>
                                                    Tambah Data
                                                </button>
                                            </a>
                                        </div>
                                <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover" id="example1">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col" class="text-center">NO. TRANSAKSI</th>
                                                    <th scope="col" class="text-center">TANGGAL</th>
                                                    <th scope="col" class="text-center">NO. KENDARAAN</th>
                                                    <th scope="col">KENDARAAN</th>
                                                    <th scope="col">PAKET</th>
                                                    <th scope="col" class="text-right">HARGA PAKET</th>
                                                 <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($cucian as $cc) : ?>
                                                    <tr>
                                                        <th><?= $i; ?></th>
                                                        <td class="text-center"><?= $cc['NO_TRANSAKSI'] ?></td>
                                                        <td class="text-center"><?= $cc['TANGGAL'] ?></td>
                                                        <td class="text-center"><?= $cc['NOPLAT'] ?></td>
                                                        <td><?= $cc['JENIS_KENDARAAN'] ?></td>
                                                        <td><?= $cc['JENIS_PAKET'] ?></td>
                                                        <td class="text-right"><?= "Rp. " . number_format($cc['HARGA'], 0, ".", "."); ?></td>

                                                        <td class="text-center">
                                                            <a href="<?= base_url('transaksi/pembayaran/') . $cc['NO_TRANSAKSI'] ?>" id="dibayar" class="btn btn-success btn-xs btn-flat" >
                                                                <i class="fa fa-calculator"></i>
                                                                Bayar
                                                            </a>
                                                            <a href="<?= base_url('transaksi/editTransaksi/') . $cc['NO_TRANSAKSI']; ?>" class="btn btn-warning btn-xs btn-flat">
                                                                <i class="fa fa-edit"></i>
                                                                Edit
                                                            </a>
                                                            <a href="<?= base_url('transaksi/deleteTransaksi/'); ?><?= $cc['NO_TRANSAKSI']; ?>" class="btn btn-danger tombol-hapus btn-xs btn-flat">
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


