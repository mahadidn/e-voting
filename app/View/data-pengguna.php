<?php
    include ('includes/admin/header.php');
    include ('includes/admin/sidebar.php');
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-base" style="font-weight: 600">Data Pengguna</h1>
                <p class="mb-4">Berikut merupakan data pengguna yang telah terdaftar pada sistem.</p>
                <a type="button" class="btn btn-base" href="/data/pengguna/tambah">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($model['pengguna'] as $key => $value) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $value['nama_lengkap'] ?></td>
                                <td><?= $value['username'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-success btn-sm mr-2" href="/data/pengguna/edit/<?= $value['id'] ?>">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="/data/pengguna/hapus/<?= $value['id'] ?>">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php $i = $i + 1;  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    include ('includes/admin/footer.php');
    include ('includes/admin/scripts.php');
?>

