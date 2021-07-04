        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Profil</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">
                                            <i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profil</li>
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
                <?php foreach ($profil as $p){ ?>
                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="<?= base_url('gambar/profil/') . $p->foto; ?>" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4"></div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h4><?= $p->nik; ?></h4>
                                <h3><?= $p->nama; ?></h3>
                                <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i><?= $p->username; ?> - <?= $p->telp; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php foreach ($petugas as $pe){ ?>
                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="<?= base_url('gambar/profil/') . $pe->foto; ?>"
                                            class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4"></div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3><?= $pe->nama_petugas; ?></h3>
                                <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i><?= $pe->username; ?> -
                                    <?= $pe->telp; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="col-xl-8 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Profile </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('dashboard/profil_update'); ?>" method="POST"
                                enctype="multipart/form-data">
                                <div class="pl-lg-4">
                                    <?php foreach ($profil as $p){ ?>
                                    <?php if ($profil) { ?>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">NIK</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="number" name="nik" class="form-control"
                                                    value="<?= $p->nik; ?>" readonly>
                                                <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Nama Lengkap</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="text" name="nama" class="form-control"
                                                    value="<?= $p->nama; ?>">
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control"
                                                    value="<?= $p->username; ?>">
                                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Telepon</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="number" name="telp" class="form-control"
                                                    value="<?= $p->telp; ?>">
                                                <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Foto</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
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
                                    <?php } ?>
                                    <?php } ?>

                                    <?php foreach ($petugas as $pe){ ?>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Nama Lengkap</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="text" name="nama" class="form-control"
                                                    value="<?= $pe->nama_petugas; ?>">
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control"
                                                    value="<?= $pe->username; ?>">
                                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Telepon</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="number" name="telp" class="form-control"
                                                    value="<?= $pe->telp; ?>">
                                                <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Foto</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
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
                                    <?php } ?>
                                </div>
                                <hr class="my-4" />
                                <button class="btn btn-primary float-right" type="submit">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>