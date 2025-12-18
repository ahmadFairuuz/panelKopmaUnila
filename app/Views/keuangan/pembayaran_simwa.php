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
                        <h3><?= $title ?></h3>
                    </div>
                    <div class="card-body my-3">
                        <!-- Buat Konten Disini -->
                        <?php
                        if (session()->getFlashdata('pesan')) {
                        ?>
                        <div class="row mx-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashData('pesan') ?>
                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <?php
                            session()->remove('pesan');
                        }
                        ?>
                        <?php
                        if (session()->getFlashdata('error')) {
                        ?>
                        <div class="row mx-2">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <?php
                            session()->remove('pesan');
                        }
                        ?>
                        <div class="table-responsive my-3">
                            <table class="table table-striped fs-6 " id="tableBayar">
                                <thead>
                                    <tr>
                                        <?php
                                    if (has_permission('mengelola_keuangan')) {
                                        ?>
                                        <th scope="col">Action</th>
                                        <?php
                                    }
                                    ?>

                                        <th scope="col">Waktu</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Nomor Anggota</th>
                                        <th scope="col">Denda</th>
                                        <th scope="col">Nominal</th>
                                        <th scope="col">Bukti</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                foreach ($simwa as $d) {
                                    ?>
                                    <tr>
                                        <?php
                                        if (has_permission('mengelola_keuangan')) {
                                            ?>
                                        <td>
                                            <?php
                                                if ($d['status'] == 1) {
                                                    ?>
                                            <a href="<?php echo base_url('keuangan/accept/' . $d['id_pembayaran']); ?>" type="button"
                                                class="btn btn-success btn-sm">
                                                <ion-icon name="checkmark-circle-outline"></ion-icon>
                                            </a>
                                            <a href="<?php echo base_url('keuangan/reject/' . $d['id_pembayaran']); ?>" type="button" class="btn btn-danger btn-sm">
                                                <ion-icon name="ban-outline"></ion-icon>
                                            </a>

                                            <?php
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                        </td>
                                        <?php
                                        }
                                        ?>
                                        <td><?php echo $d['waktu_pembayaran']; ?></td>
                                        <td><?php echo $d['nama_lengkap']; ?></td>
                                        <td><?php echo $d['nomor_anggota']; ?></td>
                                        <td>
                                            <?= $d['denda'] === null || $d['denda'] === '' ? '-' : 'Rp ' . number_format($d['denda'], 0, ',', '.') ?>
                                        </td>
                                        <td>Rp<?php echo number_format($d['nominal'], 2); ?></td>
                                        <td>
                                            <?php
                                            if ($d['bukti_pembayaran'] == '-') {
                                                echo "-";
                                            } else {
                                                ?>
                                            <a target="blank" href="<?php echo base_url('assets/uploads/img/bukti_simwa/' . $d['bukti_pembayaran']); ?>"
                                                class="btn btn-sm btn-primary">
                                                <span clas>
                                                    <ion-icon name="eye-outline"></ion-icon>
                                                </span>
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <div class="badge bg-<?php echo $d['status'] == 1 ? 'warning' : ($d['status'] == 2 ? 'danger' : 'success'); ?>">
                                                <?php echo $d['status'] == 1 ? 'Pending' : ($d['status'] == 2 ? 'Rejected' : 'Accepted'); ?>
                                            </div>
                                        </td>
                                    </tr>
                            
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
<?php echo $this->endSection(); ?>

<!-- SCRIPT UNTUK DATATABLES -->
<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#tableBayar').DataTable({
            pageLength: 100,
            lengthMenu: [10, 25, 50, 100, 250, 500],
            ordering: true,
            searching: true,
            order: [[1, 'desc']],
            info: true,
        });
    });
</script>
<?= $this->endSection() ?>
