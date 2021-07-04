<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Data Laporan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">
                                    <i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Laporan Pengaduan</li>
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
        <div class="col-xl-6 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Laporan Sesuai Tanggal </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('dashboard/laporan_aksi'); ?>" method="POST" target="_blank">
                        <div class="pl-lg-4">
                            <input type="hidden" name="nilaifilter" value="1">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Tanggal Awal</label>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <input type="date" name="tgl_awal" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Tanggal Akhir</label>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <input type="date" name="tgl_akhir" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class=" my-4" />
                        <button class="btn btn-primary float-right" type="submit"><i class="fa fa-print"></i>
                            Print</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Laporan Sesuai Bulan </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('dashboard/laporan_aksi'); ?>" method="POST" target="_blank">
                        <div class="pl-lg-4">
                            <input type="hidden" name="nilaifilter" value="2">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Pilih Tahun</label>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <select name="tahun1" class="form-control" required>
                                            <option value="">Pilih Tahun</option>
                                            <?php foreach ($tahun as $t) { ?>
                                            <option value="<?= $t->tahun; ?>"><?= $t->tahun; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Bulan Awal</label>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <select name="blnawal" class="form-control" required>
                                            <option value="">Pilih Bulan Awal</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Bulan Akhir</label>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <select name="blnakhir" class="form-control" required>
                                            <option value="">Pilih Bulan AKhir</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class=" my-4" />
                        <button class="btn btn-primary float-right" type="submit"><i class="fa fa-print"></i>
                            Print</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Laporan Sesuai Tahun </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('dashboard/laporan_aksi'); ?>" method="POST" target="_blank">
                        <div class="pl-lg-4">
                            <input type="hidden" name="nilaifilter" value="3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Pilih Tahun</label>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <select name="tahun2" class="form-control" required>
                                            <option value="">Pilih Tahun</option>
                                            <?php foreach ($tahun as $t) { ?>
                                            <option value="<?= $t->tahun; ?>"><?= $t->tahun; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class=" my-4" />
                        <button class="btn btn-primary float-right" type="submit"><i class="fa fa-print"></i>
                            Print</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
