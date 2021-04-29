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
                <div class="card-body">
                    <p>Ini adalah halaman About</p>
                </div>
            </div>
        </section>
        <!-- Section: Main chart -->
    </div>
</main>

<?php echo $this->endSection(); ?>