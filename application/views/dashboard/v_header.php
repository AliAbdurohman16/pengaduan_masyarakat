<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Pengaduan Masyarakat - <?= $title; ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets'); ?>/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/argon.css?v=1.2.0" type="text/css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?= base_url('assets'); ?>/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets'); ?>/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <h1 class="text-purple">PM Panel</h1>
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '' ? 'active' : ''?>"
                                href="<?= base_url('dashboard'); ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <?php if($this->session->userdata('nik')) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'tulis_pengaduan' ? 'active' : ''?>"
                                href="<?= base_url('dashboard/tulis_pengaduan'); ?>">
                                <i class="fa fa-edit text-success"></i>
                                <span class="nav-link-text">Tulis Pengaduan</span>
                            </a>
                        </li>
                        <?php } ?>


                        <?php if($this->session->userdata('id_petugas')) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'pengaduan' ? 'active' : ''?>"
                                href="<?= base_url('dashboard/pengaduan'); ?>">
                                <i class="fas fa-comment-alt text-orange"></i>
                                <span class="nav-link-text">Data Pengaduan Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'pengaduan_diproses' ? 'active' : ''?>"
                                href="<?= base_url('dashboard/pengaduan_diproses'); ?>">
                                <i class="fas fa-exclamation text-yellow"></i>
                                <span class="nav-link-text">Data Pengaduan Diproses</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'pengaduan_selesai' ? 'active' : ''?>"
                                href="<?= base_url('dashboard/pengaduan_selesai'); ?>">
                                <i class="fas fa-check text-green"></i>
                                <span class="nav-link-text">Data Pengaduan Selesai</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'pengaduan_ditolak' ? 'active' : ''?>"
                                href="<?= base_url('dashboard/pengaduan_ditolak'); ?>">
                                <i class="fas fa-times text-red"></i>
                                <span class="nav-link-text">Data Pengaduan Ditolak</span>
                            </a>
                        </li>
                        <?php if ($this->session->userdata('level') == "admin") { ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'masyarakat' ? 'active' : ''?>"
                                href="<?= base_url('dashboard/masyarakat'); ?>">
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">Data Masyarakat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'petugas' ? 'active' : ''?>"
                                href="<?= base_url('dashboard/petugas'); ?>">
                                <i class="ni ni-badge text-red"></i>
                                <span class="nav-link-text">Data Petugas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('dashboard/laporan'); ?>">
                                <i class="fa fa-chart-pie text-primary"></i>
                                <span class="nav-link-text">Data Laporan</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Pengaturan Akun</span>
                    </h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'profil' ? 'active' : ''?>"
                                href="<?= base_url('dashboard/profil'); ?>">
                                <i class="ni ni-circle-08 text-pink"></i>
                                <span class="nav-link-text">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'ubah_kata_sandi' ? 'active' : ''?>"
                                href="<?= base_url('dashboard/ubah_kata_sandi'); ?>">
                                <i class="ni ni-key-25 text-info"></i>
                                <span class="nav-link-text">Ubah Kata Sandi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modalKeluar" data-toggle="modal">
                                <i class="ni ni-curved-next text-dark"></i>
                                <span class="nav-link-text">Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <?php
									$nik = $this->session->userdata('nik');
									$id = $this->session->userdata('id_petugas');
									$user = $this->db->query("SELECT * FROM masyarakat WHERE nik = '$nik'")->row();
									$user1 = $this->db->query("SELECT * FROM petugas WHERE id_petugas = '$id'")->row();
								?>
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <?php if($user) { ?>
                                        <img alt="Image placeholder"
                                            src="<?= base_url('gambar/profil/') . $user->foto; ?>">
                                        <?php } else { ?>
                                        <img alt="Image placeholder"
                                            src="<?= base_url('gambar/profil/') . $user1->foto; ?>">
                                        <?php } ?>
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">
                                            <?php
										if ($user) {
											echo $user->nama;
										} else {
											echo $user1->nama_petugas;
										}
										?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Selamat Datang!</h6>
                                </div>
                                <a href="<?= base_url('dashboard/profil'); ?>" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Profile</span>
                                </a>
                                <a href="<?= base_url('dashboard/ubah_kata_sandi'); ?>" class="dropdown-item">
                                    <i class="ni ni-key-25"></i>
                                    <span>Ubah Kata Sandi</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#modalKeluar" class="dropdown-item" data-toggle="modal">
                                    <i class=" ni ni-user-run"></i>
                                    <span>Keluar</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        <!-- Header -->

        <!-- Modal -->
        <div class="modal" id="modalKeluar" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Keluar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin keluar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('dashboard/keluar'); ?>" class="btn btn-primary">Ya</a>
                    </div>
                </div>
            </div>
        </div>