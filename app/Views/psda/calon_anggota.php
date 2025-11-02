<?php
echo $this->extend('dashboard/sidebar');
echo $this->section('main');
?>
<main id="main" class="main">
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header mx-3 mt-3">
                        <h3><?php echo $title; ?></h3>
                        <!-- <form method="post" action="<?php echo base_url('psda/upload_calon_anggota'); ?>" enctype="multipart/form-data">
                            <input type="file" name="csv" id="csv">
                            <input type="submit" value="Upload">
                        </form> -->
                    </div>
                    <div class="card-body my-3">
                        <!-- Buat Konten Disini -->
                        <div class="row  mb-2">
                            <div class="col d-flex justify-content-between">
                                <!-- Button Input Data From CSV -->
                                <!-- Search Fiela -->
                                <div class="col ">
                                    <?php
                                        if (in_array(user()->username, ['admin', 'psda']
                                        )) {
                                        ?>
                                    <a href="<?php echo base_url('psda/download_calon'); ?>"
                                        class="btn btn-success btn-sm p-auto rounded-pill shadow-sm d-flex justify-content-center w-25 mr-2">
                                        <span class="me-1">
                                            <ion-icon style="font-size: 16px;" name="download-outline"></ion-icon>
                                        </span>
                                        <span>
                                            XLS
                                        </span>
                                    </a>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <!-- Search Field -->
                                <!-- <div class="row"> -->
                                <!-- Download Button -->
                                <div class="col justify-content-end d-flex">

                                    <a data-bs-toggle="modal" data-bs-target="#confirmModal"
                                        class="btn-danger justify-content-center rounded-pill align-items-center d-flex w-25"><ion-icon
                                            class="mr-1" name="trash-outline"></ion-icon> Reset CA</a>
                                </div>
                                <!-- Download Button -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <?php
                            if (session()->getFlashdata('error')) {
                            ?>
                        <div class="row mx-2">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('error'); ?>
                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <?php
                            session()->remove('error');
                            }
                        ?>
                        <?php
                            if (session()->getFlashdata('success')) {
                            ?>
                        <div class="row mx-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('success'); ?>
                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <?php
                            session()->remove('success');
                            }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped align-center" style="font-size: 15px;" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">NPM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Panggilan</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Fakultas</th>
                                        <th scope="col">Nomor WA</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Asal Informasi</th>
                                        <th scope="col">Domisili</th>
                                        <th scope="col">Tempat Lahir</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Alasan Masuk Kopma</th>
                                        <th scope="col">Kode Referal</th>
                                        <th scope="col">Berkas</th>
                                    </tr>
                                </thead>
                                <?php $i = 1 + (25 * ($current_page - 1));
                                foreach ($calon_anggota as $d) {?>
                                <tr id="<?php echo $d['npm']; ?>">
                                    <th scope="row"><?php echo $i++; ?></th>
                                    <td>
                                        <form action="<?php echo base_url('psda/delete_calon/' . $d['npm']); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" onclick="return confirm('Apakah anda yakin?')"
                                                class="btn btn-danger btn-sm">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </button>
                                        </form>
                                    </td>
                                    <td><?php echo $d['npm']; ?></td>
                                    <td><?php echo $d['nama_lengkap']; ?></td>
                                    <td><?php echo $d['nama_panggilan']; ?></td>
                                    <td><?php echo $d['jurusan']; ?></td>
                                    <td><?php echo $d['fakultas']; ?></td>
                                    <td><?php echo $d['nomor_hp']; ?></td>
                                    <td><?php echo $d['email']; ?></td>
                                    <td><?php echo $d['asal_informasi']; ?></td>
                                    <td><?php echo $d['domisili']; ?></td>
                                    <td><?php echo $d['tempat_lahir']; ?></td>
                                    <td><?php echo $d['tanggal_lahir']; ?></td>
                                    <td style="min-width: 250px;"><?php echo $d['alasan']; ?></td>
                                    <!-- <td class="limit-text" title="<?php echo $d['alasan']; ?>">
                                        <?php echo str_replace(["\r", "\n"], ' ', $d['alasan']); ?>
                                    </td> -->

                                    <td><?php echo $d['kode_referal']; ?></td>
                                    <td class="gy-2">
                                        <a href="<?php echo base_url('assets/uploads/document/regist/foto/' . $d['foto']); ?>" class="m-1 w-100 row btn btn-danger btn-sm"
                                            target="_blank">
                                            <div class="col bukti-btn">Foto</div>
                                        </a>
                                        <a href="<?php echo base_url('assets/uploads/document/regist/ktm/' . $d['ktm']); ?>" class="m-1 w-100 row btn btn-warning btn-sm"
                                            target="_blank">
                                            <div class="col bukti-btn">KTM</div>
                                        </a>
                                        <a href="<?php echo base_url('assets/uploads/document/regist/bukti_pembayaran/' . $d['bukti_pembayaran']); ?>" class="m-1 w-100 row btn btn-success btn-sm"
                                            target="_blank">
                                            <div class="col bukti-btn">Bukti Pembayaran</div>
                                        </a>
                                    </td>
                                </tr>
                                <?php }?>
                            </table>

                        </div>
                        <?php
                            if (user()->username == 'admin') {
                            ?>
                        <div class="row mt-4">
                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirmModal">
                                    <i class="bi bi-arrow-clockwise"></i>
                                    Reset Data Calon Anggota
                                </button>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Konfirmasi Reset Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo base_url('psda/reset_calon'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body mx-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger text-center" role="alert">
                                <strong>Perhatian!</strong><br>
                                Ini akan menghapus seluruh data <strong>Calon Anggota</strong>!.
                            </div>
                        </div>
                    </div>
                    <?php
                    $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                    $random_word = substr(str_shuffle($letters), 0, 8);
                    ?>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="h4 border border-2 p-3 rounded"><?php echo $random_word; ?></div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 text-center">
                            Silakan ketikan kembali kata diatas untuk mengkonfirmasi penghapusan data!
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="confirm" id="confirm" class="form-control text-center"
                                placeholder="____________________">
                            <input type="hidden" name="random" value="<?php echo $random_word; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Yakin ingin melakukan reset data calon anggota?')">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .limit-text {
        max-width: 180px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: pointer;
    }
</style>
<!-- End #main -->
<?php echo $this->endSection(); ?>
<script src="sadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="sadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "ordering": true, // aktifkan sorting
            "paging": true, // hilangkan pagination
            "info": true, // hilangkan info "Showing 1 to ..."
            "searching": true, // hilangkan search bawaan
            "lengthChange": true, // hilangkan "Show 10 entries"
        });
    });
</script>
