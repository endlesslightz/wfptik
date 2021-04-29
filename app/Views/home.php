<div class="container">
    <div class="row">
        <h1>Hello, <?= $nama; ?> !</h1>
        <h4>Saya dari prodi <?= $prodi; ?></h4>
        <hr>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde impedit doloremque velit! Perferendis odit quaerat velit dolorum recusandae laudantium nam, ea expedita error perspiciatis quis.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, tempora.</p>
        <ul>
            <?php
            foreach ($list as $item) {
                echo "<li> $item </li>";
            }
            ?>
        </ul>
        <div class="col">
        </div>
    </div>
</div>