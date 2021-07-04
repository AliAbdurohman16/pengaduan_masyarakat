<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pengaduan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">
                                    <i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard/pengaduan_selesai'); ?>">
                                    Pengaduan Selesai</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pengaduan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
    <?php
	foreach ($pengaduan as $p) { ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Detail Pengaduan</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">NIK</label>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <?= $p->nik; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Tanggal</label>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <?= date('d-m-Y', strtotime($p->tgl_pengaduan)); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Foto</label>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="custom-file">
                                        <img width="50%" class="img-fluid"
                                            src="<?= base_url('gambar/pengaduan/') . $p->foto; ?>">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <br />
                            <br />
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Status</label>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Isi Laporan</label>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <?= $p->isi_laporan; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if ($this->session->userdata('nik')) {
			foreach ($tanggapan as $t) { ?>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Tanggapan</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">ID Pengaduan</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <?= $t->id_pengaduan; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">ID Petugas</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <?= $t->id_petugas; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <?= date('d-m-Y', strtotime($t->tgl_tanggapan)); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Isi Tanggapan</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <?= $t->tanggapan; ?>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <a href="<?= base_url('dashboard/pengaduan'); ?>"
                            class="btn btn-success float-right">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } 
		}?>
        <?php if ($this->session->userdata('id_petugas')) {
            foreach ($tanggapan as $t) { ?>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Tanggapan</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">ID Pengaduan</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <?= $t->id_pengaduan; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">ID Petugas</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <?= $t->id_petugas; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <?= date('d-m-Y', strtotime($t->tgl_tanggapan)); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Isi Tanggapan</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <?= $t->tanggapan; ?>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <a href="<?= base_url('dashboard/pengaduan_selesai'); ?>"
                            class="btn btn-success float-right">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <?php }
		}?>
    </div>
    <?php } ?>