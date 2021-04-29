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
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt ad non eligendi nisi, rem, beatae nobis soluta quis ducimus ipsam perspiciatis atque corrupti possimus? Animi neque inventore odit labore voluptatibus.</p>
                </div>
            </div>
        </section>
        <!-- Section: Main chart -->

    </div>
</main>
<?php echo $this->endSection(); ?>

<?php echo $this->section('kontainer2'); ?>
<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">
        <!-- Section: Main chart -->
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Hello, ini adalah bagian dari section yang kedua!</strong></h5>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex, suscipit odit officiis id reprehenderit veritatis rerum nostrum deleniti praesentium laudantium labore in repudiandae sequi excepturi esse non eos? Dolorem fugit non officia quos similique ex corrupti quibusdam sit tempora at dicta, hic eveniet perspiciatis alias, molestias nisi? Accusantium, quia doloremque?</p>
                </div>
            </div>
        </section>
        <!-- Section: Main chart -->

    </div>
</main>
<?php echo $this->endSection(); ?>