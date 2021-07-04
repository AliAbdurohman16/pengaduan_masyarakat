        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Petugas</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">
                                            <i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a
                                            href="<?= base_url('dashboard/petugas'); ?>">Petugas</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Petugas</li>
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
                                    <h3 class="mb-0">Edit Petugas</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php foreach($petugas as $p) { ?>
                            <form action="<?= base_url('dashboard/update_petugas'); ?>" method="POST">
                                <div class="pl-lg-4">
                                    <input type="hidden" name="id" value="<?= $p->id_petugas; ?>">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Nama Lengkap</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="text" name="nama" class="form-control"
                                                    value="<?= $p->nama_petugas; ?>">
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
                                                <label class="form-control-label">Kata Sandi</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="password" name="sandi" class="form-control">
                                                <small>kosongkan saja jika tidak ingin mengubahnya.</small>
                                                <?= form_error('sandi', '<small class="text-danger">', '</small>'); ?>
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
                                                <label class="form-control-label">Level</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <select name="level" class="form-control">
                                                    <option value="">- Pilih Level -</option>
                                                    <option
                                                        <?php if($p->level == "admin"){ echo "selected='selected'";} ?>
                                                        value="admin">Admin</option>
                                                    <option
                                                        <?php if($p->level == "petugas"){ echo "selected='selected'";} ?>
                                                        value="petugas">
                                                        Petugas</option>
                                                </select>
                                                <?= form_error('level', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <button class="btn btn-primary" type="submit">Ubah</button>
                                <a href="<?= base_url('dashboard/petugas'); ?>"
                                    class="btn btn-success float-right">Kembali</a>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>