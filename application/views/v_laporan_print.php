<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Pengaduan Masyarakat - <?= $title; ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets'); ?>/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets/css/argon.css?v=1.2.0" type="text/css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?= base_url('assets'); ?>/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets'); ?>/assets/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
</head>

<body onload="window.print()">
    <!-- Page content -->

    <center>
        <h1><?= $title; ?></h1>
        <h2><?= $subtitle; ?></h2>
    </center>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Data Pengaduan</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table id="example1" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Tanggal</th>
                                    <th>NIK</th>
                                    <th>Isi Laporan</th>
                                    <th width="10%">Foto</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php 
								$no = 1;
                                foreach ($datafilter as $d) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= date('d-m-Y', strtotime($d->tgl_pengaduan)); ?></td>
                                    <td><?= $d->nik; ?></td>
                                    <td><?= word_limiter($d->isi_laporan, 5); ?></td>
                                    <td><img width="100%" class="img-fluid"
                                            src="<?= base_url('gambar/pengaduan/') . $d->foto; ?>"></td>
                                    <td>
                                        <?php
                                        if ($d->status == "selesai") {
                                            echo "<span class='btn btn-sm btn-success'>Selesai</span>";
                                        } elseif ($d->status == "proses") {
                                            echo "<span class='btn btn-sm btn-warning'>Sedang diproses</span>";
                                        } elseif ($d->status == "0") {
                                            echo "<span class='btn btn-sm btn-danger'>Ditolak</span>";
                                        } else {
                                            echo "<span class='btn btn-sm btn-danger'>Belum diproses</span>";
                                        } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="<?= base_url('assets'); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js">
    </script>
    <!-- Optional JS -->
    <script src="<?= base_url('assets'); ?>/assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="<?= base_url('assets'); ?>/assets/js/argon.js?v=1.2.0"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets'); ?>/assets/vendor/datatables.net/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js">
    </script>

</body>

<html>