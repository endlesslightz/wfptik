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


                <?php if (session()->getFlashdata('label') != '') { ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('label'); ?>
                    </div>
                <?php } ?>


                <div class="card-body">
                    <h1>Daftar Anggota</h1>
                    <!-- <a href="<?= base_url('admin/user/create'); ?>" class="btn btn-success btn-rounded mb-3">Tambah Anggota</a> -->
                    <div id="viewdata"></div>
                </div>

            </div>
        </section>
        <!-- Section: Main chart -->

    </div>

    <div id="viewmodal" style="display:none;"></div>
</main>

<script>
    function tampilkan() {
        $.ajax({
            url: "<?= base_url('/admin/user/getdata') ?>",
            dataType: "json",
            success: function(response) {
                $('#viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        tampilkan();
    });
</script>

<?php echo $this->endSection();
?>