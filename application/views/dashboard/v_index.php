        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Card stats -->
                    <?php if ($this->session->userdata('id_petugas')) { ?>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pegaduan Selesai</h5>
                                            <span class="h2 font-weight-bold mb-0"><?= $selesai; ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pengaduan Diproses
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0"><?= $diproses; ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="fas fa-exclamation"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pengaduan Ditolak</h5>
                                            <span class="h2 font-weight-bold mb-0"><?= $ditolak; ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pengaduan Belum
                                                Diproses</h5>
                                            <span class="h2 font-weight-bold mb-0"><?= $belum_diproses; ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="fas fa-bell"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--6">
            <?php if ($this->session->userdata('nik')) { ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <?php foreach ($pengaduan as $p) { ?>

                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile">
                        <a href="<?= base_url('dashboard/detail_pengaduan/') . $p->id_pengaduan; ?>"><img
                                src="<?= base_url('gambar/pengaduan/') . $p->foto; ?>" alt="foto" height="200px"
                                class="card-img-top"></a>
                        <div class="card-header text-center">
                            <div class="d-flex justify-content-between">
                                <span><i class="ni ni-badge"></i> <?= $p->nik; ?></span>
                                <span><i class="ni ni-calendar-grid-58"></i>
                                    <?= date('d-m-Y', strtotime($p->tgl_pengaduan)); ?></span>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex">
                                        <a href="<?= base_url('dashboard/detail_pengaduan/') . $p->id_pengaduan; ?>"
                                            class="text-dark"><?= word_limiter($p->isi_laporan, 15); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-2">
                                <?php
							if ($p->status == "selesai") {
								echo "<span class='btn btn-sm btn-success'>Selesai</span>";
							} else if ($p->status == "proses") {
								echo "<span class='btn btn-sm btn-warning'>Sedang diproses</span>";
							} else if ($p->status == "0") {
								echo "<span class='btn btn-sm btn-danger'>Ditolak</span>";
							}else{
								echo "<span class='btn btn-sm btn-danger'>Belum diproses</span>";
							}
						?>
                            </div>
                            <div class="text-center">
                                <a href="<?= base_url('dashboard/edit_pengaduan/') . $p->id_pengaduan; ?>"
                                    class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <button type="button" data-toggle="modal" data-target="#myModal"
                                    class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </div>
                            <div class="modal" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin ingin menghapus?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Tidak</button>
                                            <a href="<?= base_url('dashboard/hapus_pengaduan/') . $p->id_pengaduan; ?>"
                                                class="btn btn-primary">Ya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>