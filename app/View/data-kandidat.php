<?php
    include ('includes/admin/header.php');
    include ('includes/admin/sidebar.php');
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-base" style="font-weight: 600">Data Kandidat</h1>
                <p class="mb-4">Berikut merupakan data kandidat telah terdaftar pada sistem.</p>
                <a type="button" class="btn btn-base" href="/data/kandidat/tambah">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Profil</th>
                                <th>Visi-Misi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($model['kandidat'] as $key => $value) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $value['nama_lengkap'] ?></td>
                                <td><img src="/assets/img/<?= $value['foto'] ?>" alt="foto kandidat" width="200px"></td>
                                <td><?= $value['profil'] ?></td>
                                <td><?= $value['visi_misi'] ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-success btn-sm mr-2" href="/data/kandidat/edit/<?= $value['id'] ?>">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; } ?>
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
