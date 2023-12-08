<?php
    include ('includes/admin/header.php');
    include ('includes/admin/sidebar.php');
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-base" style="font-weight: 600">Data Voting</h1>
                <p class="mb-4">Berikut merupakan data voting terkini</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kandidat</th>
                                <th>Foto</th>
                                <th>Jumlah Suara</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($model['voting'] as $key => $value) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $value['nama_lengkap'] ?></td>
                                <td><img src="/assets/img/<?= $value['foto'] ?>" alt="foto kandidat" width="200px"></td>
                                <td><?= $value['jumlah_suara'] ?></td>
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
