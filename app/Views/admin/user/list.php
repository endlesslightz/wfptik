<a href="#" id="tambah" class="btn btn-success btn-rounded mb-3">Tambah Anggota W/ Ajax</a>

<table id="datatabel">
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

<script>
    $(document).ready(function() {
        $('#datatabel').DataTable();

        $('#tambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('/admin/user/getform') ?>",
                dataType: "json",
                success: function(response) {
                    $('#viewmodal').html(response.data).show();
                    $('#formmodal').modal('show');
                }
            });
        })
    });
</script>