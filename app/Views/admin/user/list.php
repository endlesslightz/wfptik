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
                <td><a class="btn btn-success" href="<?= base_url('admin/user/' . $item['username']); ?>">Detail</a>
                    <a class="btn btn-info" href="#" onclick="edit('<?= $item['id'] ?>')">Edit</a>
                    <a class="btn btn-danger" href="#" onclick="hapus('<?= $item['id'] ?>')">Hapus</a>

                </td>
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
        });
    });


    function edit(id) {
        $.ajax({
            type: "get",
            url: "<?= base_url('/admin/user/getform/') ?>/" + id,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#editmodal').modal('show');
            }
        });
    }

    function hapus(id) {
        Swal.fire({
            title: 'Hapus Data',
            text: `Apakah Anda yakin akan menghapus data dengan ID=${id}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "delete",
                    url: "<?= base_url('/admin/user/hapus/') ?>/" + id,
                    dataType: "json",
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                        tampilkan();
                    }
                });
            }
        });
    }
</script>