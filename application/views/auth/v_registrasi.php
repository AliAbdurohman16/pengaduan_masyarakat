<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Registrasi</h1>
                        <p class="text-lead text-white">Silahkan anda registrasi dibawah ini dengan format
                            yang benar! Jika sudah mempunyai akun silahkan anda masuk dengan benar! Klik
                            <a href="<?= base_url(); ?>" class="h3 text-white"><b>Masuk</b></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary border-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-4"><small>Registrasi</small></div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" action="<?= base_url('auth/registrasi_aksi'); ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="NIK" type="number" name="nik">
                                </div>
                                <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Nama Lengkap" type="text" name="nama">
                                </div>
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Username" type="text" name="username">
                                </div>
                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Telepon" type="number" name="telp">
                                </div>
                                <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-image"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="inputGroupFile02" name="foto">
                                        <label class="custom-file-label" for="inputGroupFile02">Foto</label>
                                        <?php
											if (isset($gambar_error)) {
												echo $gambar_error;
											} 
										?>
                                    </div>
                                </div>
                                <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-file-alt"></i></span>
                                    </div>
                                    <textarea class="form-control" placeholder="Masukkan isi laporan anda" type="text"
                                        name="pengaduan"></textarea>
                                </div>
                                <?= form_error('pengaduan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">Registrasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>