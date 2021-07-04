<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pengaduan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">
                                    <i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengaduan Selesai</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Data Pengaduan Selesai</h3>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php 
								$no = 1;
                                foreach ($data_pengaduan as $dp) {
                                    if ($dp->status == "selesai") {
                                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= date('d-m-Y', strtotime($dp->tgl_pengaduan)); ?></td>
                                <td><?= $dp->nik; ?></td>
                                <td><?= word_limiter($dp->isi_laporan, 5); ?></td>
                                <td><img width="100%" class="img-fluid"
                                        src="<?= base_url('gambar/pengaduan/') . $dp->foto; ?>"></td>
                                <td>
                                    <?php
                                        if ($dp->status == "selesai") {
                                            echo "<span class='btn btn-sm btn-success'>Selesai</span>";
                                        } elseif ($dp->status == "proses") {
                                            echo "<span class='btn btn-sm btn-warning'>Sedang diproses</span>";
                                        } elseif ($dp->status == "0") {
                                            echo "<span class='btn btn-sm btn-danger'>Ditolak</span>";
                                        } else {
                                            echo "<span class='btn btn-sm btn-danger'>Belum diproses</span>";
                                        } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('dashboard/detail_pengaduan_selesai/') . $dp->id_pengaduan; ?>"
                                        class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>
                                </td>
                            </tr>
                            <?php
                                    }
                                } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
