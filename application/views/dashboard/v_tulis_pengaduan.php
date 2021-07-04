        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Tulis Pengaduan</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">
                                            <i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tulis Pengaduan</li>
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
                <div class="col-xl-8 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Tulis Pengaduan</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('dashboard/tulis_pengaduan_aksi'); ?>" method="POST"
                                enctype="multipart/form-data">
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">NIK</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <input type="number" name="nik" class="form-control"
                                                    value="<?= $this->session->userdata('nik'); ?>" readonly>
                                                <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
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
                                                <input type="text" name="tgl" class="form-control"
                                                    value="<?= date('d-m-Y'); ?>" readonly>
                                                <?= form_error('tgl', '<small class="text-danger">', '</small>'); ?>
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
                                                <input type="file" name="foto" class="form-control"
                                                    id="inputGroupFile02">
                                                <label class="custom-file-label" for="inputGroupFile02"></label>
                                                <?php
													if (isset($gambar_error)) {
														echo $gambar_error;
													} 
												?>
                                                <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Masukkan Laporan</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <textarea type="text" name="laporan" class="form-control"></textarea>
                                                <?= form_error('laporan', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <button class="btn btn-primary float-right" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>