<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Selamat Datang!</h1>
                        <p class="text-lead text-white">Jika anda sudah mempunyai akun silahkan anda masuk dengan format
                            yang benar!.</p>
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
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <?php
		if (isset($_GET['alert'])) {
			if ($_GET['alert'] == "gagal") {
				echo "<div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Maaf! Username & Kata Sandi salah!.</div>";
			}else if ($_GET['alert'] == "belum_login") {
				echo "<div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Anda harus masuk terlebih dahulu!.</div>";
			}else if ($_GET['alert'] == "logout") {
				echo "<div class='alert alert-success' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Anda telah logout!.</div>";
			}
		}
		?>
                <?= $this->session->flashdata('message'); ?>
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-3"><small>Masuk</small></div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="<?= base_url('auth/aksi'); ?>" method="POST">
                            <div class="form-group mb-3">
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
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Kata Sandi" type="password"
                                        name="password">
                                </div>
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <a href="<?= base_url('auth/lupa_kata_sandi'); ?>" class="text-mutted"><small>Lupa Kata
                                        Sandi?</small></a>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>