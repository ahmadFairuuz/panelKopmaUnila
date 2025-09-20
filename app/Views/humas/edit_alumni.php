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
                        <form action="<?= base_url('humas/save_edited_alumni') ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_alumni" value="<?= old('id_alumni') != null ? old('id_alumni') : $alumni->id_alumni ?>">
                            <input type="hidden" name="slug_alumni" value="<?= old('slug_alumni') != null ? old('slug_alumni') : $alumni->slug_alumni ?>">
                            <div class="row m-3 w-75">
                                <label for="nama_alumni" class="col-sm-3 col-form-label">Nama Lengkap*</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_alumni" class="form-control <?= ($validation->hasError('nama_alumni') ? 'is-invalid' : '') ?>" value="<?= old('nama_alumni') != null ? old('nama_alumni') : $alumni->nama_alumni ?>" id="nama_alumni" placeholder="Nama Lengkap" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_alumni') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Nomor Anggota -->
                            <div class="row m-3 w-75">
                                <label for="nomor_anggota" class="col-sm-3 col-form-label">Nomor Anggota*</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nomor_anggota" id="nomor_anggota" placeholder="Nomor Anggota" class="form-control <?= ($validation->hasError('nomor_anggota') ? 'is-invalid' : '') ?>" value="<?= old('nomor_anggota') != null ? old('nomor_anggota') : $alumni->nomor_anggota ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nomor_anggota') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- NPM -->
                            <div class="row m-3 w-75">
                                <label for="npm" class="col-sm-3 col-form-label">NPM*</label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        name="npm"
                                        id="npm"
                                        placeholder="NPM"
                                        class="form-control <?= ($validation->hasError('npm') ? 'is-invalid' : '') ?>"
                                        value="<?= old('npm') != null ? old('npm') : $alumni->npm ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('npm') ?>
                                    </div>
                                </div>
                            </div>

                            <!-- TAHUN MASUK KULIAH -->
                            <div class="row m-3 w-75">
                                <label for="tahun_masuk" class="col-sm-3 col-form-label">Tahun Masuk Kuliah</label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        name="tahun_masuk"
                                        id="tahun_masuk"
                                        placeholder="Isi tahun masuk kuliah alumni"
                                        class="form-control <?= ($validation->hasError('tahun_masuk') ? 'is-invalid' : '') ?>"
                                        value="<?= old('tahun_masuk') != null ? old('tahun_masuk') : $alumni->tahun_masuk ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tahun_masuk') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Jurusan -->
                            <div class="row m-3 w-75">
                                <label for="jurusan" class="col-sm-3 col-form-label">Jurusan*</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jurusan" id="jurusan" placeholder="Isi Jurusan" class="form-control <?= ($validation->hasError('jurusan') ? 'is-invalid' : '') ?>" value="<?= old('jurusan') != null ? old('jurusan') : $alumni->jurusan ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jurusan') ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Fakultas -->
                            <div class="row m-3 w-75">
                                <label for="fakultas" class="col-sm-3 col-form-label">Fakultas*</label>
                                <div class="col-sm-9">
                                    <select type="text" class="form-select <?= ($validation->hasError('fakultas') ? 'is-invalid' : '') ?>" name="fakultas" id="fakultas">
                                        <option value="<?= $alumni->fakultas ?>" selected><?= $alumni->fakultas ?></option>
                                        <option value="Fakultas Matematika dan Ilmu Pengetahuan Alam">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                                        <option value="Fakultas Keguruan dan Ilmu Pendidikan">Fakultas Keguruan dan Ilmu Pendidikan</option>
                                        <option value="Fakultas Ilmu Sosial dan Ilmu Politik">Fakultas Ilmu Sosial dan Ilmu Politik</option>
                                        <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                                        <option value="Fakultas Teknik">Fakultas Teknik</option>
                                        <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                                        <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                                        <option value="Fakultas Hukum">Fakultas Hukum</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('fakultas') ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Jabatan -->
                            <div class="row m-3 w-75">
                                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jabatan" id="jabatan" placeholder="Isi Jabatan di kepengurusan" class="form-control <?= ($validation->hasError('jabatan') ? 'is-invalid' : '') ?>" value="<?= old('jabatan') != null ? old('jabatan') : $alumni->jabatan ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jabatan') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-3 w-75">
                                <label for="alamat_alumni" class="col-sm-3 col-form-label">Alamat*</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat_alumni" id="alamat_alumni" placeholder="Isi Alamat alumni" class="form-control <?= ($validation->hasError('alamat_alumni') ? 'is-invalid' : '') ?>"><?= old('alamat_alumni') != null ? old('alamat_alumni') : $alumni->alamat_alumni ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_alumni') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-3 w-75">
                                <label for="email_alumni" class="col-sm-3 col-form-label">Email*</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email_alumni" id="email_alumni" placeholder="isi email@example.com" class="form-control <?= ($validation->hasError('email_alumni') ? 'is-invalid' : '') ?>" value="<?= old('email_alumni') != null ? old('email_alumni') : $alumni->email_alumni ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email_alumni') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-3 w-75">
                                <label for="no_hp_alumni" class="col-sm-3 col-form-label">Nomor HP*</label>
                                <div class="col-sm-9">
                                    <input type="no_hp_alumni" name="no_hp_alumni" id="no_hp_alumni" placeholder="Isi Nomor HP" class="form-control <?= ($validation->hasError('no_hp_alumni') ? 'is-invalid' : '') ?>" value="<?= old('no_hp_alumni') != null ? old('no_hp_alumni') : $alumni->no_hp_alumni ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp_alumni') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-3 w-75">
                                <label for="tahun_lulus" class="col-sm-3 col-form-label">Tahun Lulus</label>
                                <div class="col-sm-9">
                                    <input type="number" name="tahun_lulus" id="tahun_lulus" placeholder="contoh : 2000" class="form-control <?= ($validation->hasError('tahun_lulus') ? 'is-invalid' : '') ?>" value="<?= old('tahun_lulus') != null ? old('tahun_lulus') : $alumni->tahun_lulus ?>" min="1900" max="9999">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tahun_lulus') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Jenis Kelamin -->
                            <?php
                            $jk = old('jenis_kelamin') != null ? old('jenis_kelamin') : $alumni->jenis_kelamin;
                            // Normalisasi ke value dropdown
                            if ($jk == 'L') {
                                $jk = 'Laki-laki';
                            } elseif ($jk == 'P') {
                                $jk = 'Perempuan';
                            }
                            ?>

                            <div class="row m-3 w-75">
                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-select <?= ($validation->hasError('jenis_kelamin') ? 'is-invalid' : '') ?>" name="jenis_kelamin" id="jenis_kelamin">
                                        <option disabled <?= $jk == null ? 'selected' : '' ?>>-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" <?= $jk == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_kelamin') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- PEKERJAAN -->
                            <div class="row m-3 w-75">
                                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pekerjaan" id="pekerjaan" placeholder="Isi Pekerjaan Alumni" class="form-control <?= ($validation->hasError('pekerjaan') ? 'is-invalid' : '') ?>" value="<?= old('pekerjaan') != null ? old('tahun_lulus') : $alumni->pekerjaan ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pekerjaan') ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $status = old('status_alumni') != null ? old('status_alumni') : $alumni->status_alumni;
                            $stts = [
                                'Alumni',
                                'Demisioner',
                            ];
                            ?>
                            <div class="row m-3 w-75">
                                <label for="status_alumni" class="col-sm-3 col-form-label">Status*</label>
                                <div class="col-sm-9">
                                    <select class="form-select <?= ($validation->hasError('status_alumni') ? 'is-invalid' : '') ?>" name="status_alumni" id="status_alumni">
                                        <option>-- Status --</option>
                                        <?php
                                        foreach ($stts as $s) {
                                        ?>
                                            <option value="<?= $s ?>" <?= $status == $s ? 'selected' : '' ?>><?= $s ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_alumni') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-4 w-75">
                                <button type="submit" class="col-3 me-2 btn btn-sm btn-primary">Simpan</button>
                                <a href="<?= base_url('humas/alumni') ?>" class="col-3 btn btn-secondary btn-sm">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
<?= $this->endSection() ?>