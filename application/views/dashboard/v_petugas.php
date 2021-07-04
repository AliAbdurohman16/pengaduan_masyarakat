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
                            <li class="breadcrumb-item active" aria-current="page">Petugas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Page content -->
<div class="container-fluid mt--6">
    <a href="<?= base_url('dashboard/tambah_petugas'); ?>" class="btn btn-success mb-3">Tambah Petugas</a>
    <div class="mb-3">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Data Petugas</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table id="example1" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Lengkap</th>
                                <th>username</th>
                                <th>Telepon</th>
                                <th width="10%">Foto</th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php 
							$no = 1;
							foreach($petugas as $p){
						?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $p->nama_petugas; ?></td>
                                <td><?= $p->username; ?></td>
                                <td><?= $p->telp; ?></td>
                                <td><img width="100%" class="img-fluid"
                                        src="<?= base_url('gambar/profil/') . $p->foto; ?>"></td>
                                <td>
                                    <a href="<?= base_url('dashboard/edit_petugas/') . $p->id_petugas; ?>"
                                        class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="#myModal" data-toggle="modal" class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('dashboard/hapus_petugas/') . $p->id_petugas; ?>"
                        class="btn btn-primary">Ya</a>
                </div>
            </div>
        </div>
    </div>