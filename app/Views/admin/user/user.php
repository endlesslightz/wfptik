<?php echo $this->extend('template/template'); ?>

<?php echo $this->section('kontainer'); ?>
<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">
        <!-- Section: Main chart -->
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Hello, <?= $nama ?> !</strong></h5>
                </div>
                <?php if (session()->getflashdata('sukses') != '') { ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getflashdata('sukses'); ?>
                    </div>
                <?php } ?>
                <div class="card-body">
                    <h1>Daftar Anggota</h1>
                    <a href="user/create" class="btn btn-success btn-rounded mb-3">Tambah Anggota</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Avatar</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($list as $item) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="/img/profil/<?= $item['avatar'] ?>" alt="" width="100px"></td>
                                    <td><?= $item['username'] ?> </td>
                                    <td><?= $item['email'] ?> </td>
                                    <td><a class="btn btn-success" href="<?= base_url('admin/user/' . $item['username']); ?>">Detail</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
        <!-- Section: Main chart -->

    </div>
</main>

<?php echo $this->endSection();

/* most basic usage */
$var = 5;
$var_is_greater_than_two = ($var > 2 ? true : false); // returns true
?>