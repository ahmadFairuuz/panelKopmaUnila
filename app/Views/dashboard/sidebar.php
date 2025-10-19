<!-- Navbar -->
<?php echo $this->extend('layout/template') ?>(
<?php echo $this->section('sidebar'); ?>
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <div class="logo d-flex align-items-center">
            <img src="<?php echo base_url('/img/logo-kopma-unila.png') ?>" alt="Kopma Unila" />
            <span class="d-none d-lg-block">Kopma Unila</span>
        </div>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        <span class="ms-3 fw-bold">Halo! <?php echo user()->username ?></span>
    </div>
    <!-- End Logo -->
</header>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Main</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo base_url('/') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->
        <li class="nav-item">
            <a href="<?php echo base_url('/dashboard/data_kegiatan') ?>" class="nav-link collapsed px-3 d-flex">
                <i class="bi bi-calendar"></i>
                <span>Data Kegiatan</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="https://scribehow.com/page/User_Guide_Panel_Kepengurusan_Kopma_Unila__vTx9pzLAQIGel6inLmjhZw"
                class="nav-link collapsed px-3 d-flex" target="_blank">
                <i class="bi bi-book"></i>
                <span>Panduan Pengguna</span>
            </a>
        </li>
        <li class="my-1">
            <hr>
        </li>
        <?php
        if (!in_groups('panitia')){
            ?>

            <?php
            if (!in_groups('staff humas')) {
                ?>
                <li class="nav-item">
                    <div class="nav-heading">Pengurus</div>
                    <a href="<?php echo base_url('/dashboard/program_kerja') ?>" class="nav-link collapsed px-3 d-flex">
                        <i class="bi bi-clipboard"></i>
                        <span>Program Kerja</span>
                    </a>
                </li>
                <li class="my-1">
                    <hr>
                </li>
                <?php
            }
            ?>

            <?php
            if (in_array(user()->username, ['admin', 'humas', 'staff','badanpengawas','ketum'])):
                ?>
                <li class="nav-item">
                    <div class="nav-heading">Humas</div>
                    <a href="<?php echo base_url('humas/alumni') ?>" class="nav-link collapsed px-3 d-flex">
                        <i class="bi bi-mortarboard"></i>
                        <span>Alumni</span>
                    </a>
                </li>
                <?php
            endif;
            ?>

            <!-- ADMINISTRASI -->
            <?php
            if (in_array(user()->username, ['administrasi', 'admin','badanpengawas','ketum'])):
                ?>
                <li class="my-1">
                    <hr>
                </li>
                <li class="nav-item">
                    <div class="nav-heading">Administrasi</div>
                    <div class="row text-muted small fw-bold text-uppercase px-3" data-bs-toggle="collapse"
                        href="#admin-collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="col-10">Administrasi</span>
                        <span class="col-2">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </li>
                <div id="admin-collapse" class="collapse">
                    <li class="nav-item">
                        <a href="<?php echo base_url('administrasi/surat_masuk') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Surat Masuk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('administrasi/surat_keluar') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Surat Keluar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('administrasi/digilib') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-book"></i>
                            <span>Digilib</span>
                        </a>
                    </li>
                </div>
                <?php
            endif;
            ?>

            <!-- PSDA -->
            <!-- hanya admin & psda -->
            <?php if (in_array(user()->username, ['admin', 'psda','badanpengawas','ketum'])): ?>
                <li class="my-1">
                    <hr>
                </li>
                <li class="nav-item">
                    <div class="nav-heading">PSDA</div>
                    <div class="row text-muted small fw-bold text-uppercase px-3" data-bs-toggle="collapse" href="#psdacollapse"
                        role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="col-10">PSDA</span>
                        <span class="col-2">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </li>
                <div id="psdacollapse" class="collapse">

                    <li class="nav-item">
                        <a href="<?php echo base_url('psda/calon_anggota') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-person-fill-add"></i>
                            <span>Calon Anggota</span>
                        </a>
                    </li>
                    <?php
            endif;
            ?>

                <!-- Data Anggota khusus untuk staff / admin / psda -->
                <?php if (in_array(user()->username, ['admin', 'psda', 'staff','badanpengawas','ketum'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('psda/data_anggota') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-people-fill"></i>
                            <span>Data Anggota</span>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- hanya admin & psda -->
                <?php if (in_array(user()->username, ['admin', 'psda','badanpengawas','ketum'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('psda/data_poin') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-coin"></i>
                            <span>Data Poin</span>
                        </a>
                    </li>
                    <?php
                endif;
                ?>

                <!-- hanya admin & psda -->
                <?php if (in_array(user()->username, ['admin', 'psda','badanpengawas','ketum'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('psda/kode_referal') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-gift-fill"></i>
                            <span>Kode Referal</span>
                        </a>
                    </li>
                    <?php
                endif;
                ?>
            </div>

            <!-- USAHA -->
            <?php
            if (in_array(user()->username, ['usaha', 'admin','badanpengawas','ketum'])):
                ?>
                <li class="my-1">
                    <hr>
                </li>
                <li class="nav-item">
                    <div class="nav-heading">Usaha</div>
                    <a href="<?php echo base_url('usaha/produk') ?>" class="nav-link collapsed px-3 d-flex">
                        <i class="bi bi-box-seam"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <?php
            endif;
            ?>

            <!-- KEUANGAN -->
            <?php
            if (in_array(user()->username, ['keuangan', 'admin','badanpengawas','ketum'])):
                ?>
                <li class="my-1">
                    <hr>
                </li>
                <li class="nav-item">
                    <div class="nav-heading">Keuangan</div>
                    <div class="row text-muted small fw-bold text-uppercase px-3" data-bs-toggle="collapse"
                        href="#keuangan-collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="col-10">Keuangan</span>
                        <span class="col-2">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </li>
                <div id="keuangan-collapse" class="collapse">
                    <li class="nav-item">
                        <a href="<?php echo base_url('keuangan/data_simpanan') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-cash-stack"></i>
                            <span>Data Simpanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('keuangan/pembayaran_simwa') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-receipt-cutoff"></i>
                            <span>Pembayaran Simpanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('keuangan/laporan_keuangan') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-file-earmark-bar-graph"></i>
                            <span>Laporan Keuangan</span>
                        </a>
                    </li>
                </div>
                <?php
            endif;
            ?>

            <!-- LITBANG -->
            <?php
            if (in_array(user()->username, ['litbang', 'admin','badanpengawas','ketum'])):
                ?>
                <li class="my-1">
                    <hr>
                </li>
                <li class="nav-item">
                    <div class="nav-heading">Litbang</div>
                    <div class="row text-muted small fw-bold text-uppercase px-3" data-bs-toggle="collapse"
                        href="#litbang-collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="col-10">Litbang</span>
                        <span class="col-2">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </li>
                <div id="litbang-collapse" class="collapse">
                    <li class="nav-item">
                        <a href="<?php echo base_url('litbang/survey_berjalan') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-clipboard2-data"></i>
                            <span>Survey Berjalan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('litbang/hasil_survey') ?>" class="nav-link collapsed px-3 d-flex">
                            <i class="bi bi-clipboard2-data"></i>
                            <span>Hasil Survey</span>
                        </a>
                    </li>
                </div>
                <?php
            endif;
            ?>

            <li class="my-2">
                <hr>
            </li>
            <?php
            if (in_groups('admin')) {
                ?>
                <li class="nav-heading">Admin</li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/data_user') ?>" class="nav-link collapsed px-3 d-flex">
                        <i class="bi bi-person-gear"></i>
                        <span>Akun</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/akun_juko') ?>" class="nav-link collapsed px-3 d-flex">
                        <i class="bi bi-people"></i>
                        <span>Akun Si Juko</span>
                    </a>
                </li>
                <?php
            }
        }
        ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo base_url('/logout') ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>
<!-- End Sidebar-->
<?php echo $this->renderSection('main'); ?>
<!-- Offcanvas -->
<?php echo $this->endSection(); ?>