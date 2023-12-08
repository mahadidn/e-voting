<?php
    include ('includes/user/head.php');
    include ('includes/user/navbar.php');
?>

    <div class="container-fluid pt-5 gx-5">
        <div class="container">
            <div class="text-center">
                <h2>Profil Kandidat</h2>
                <p>Silahkan Melihat Profil Jagoan Anda! </p>
            </div>
            <div class="table-responsive pb-5">
                <table class="table table-bordered text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th>No.</th>
                            <th>Foto Kandidat</th>
                            <th>Profil Lengkap</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($model['kandidat'] as $key => $value) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="/assets/img/<?= $value['foto'] ?>" class="img-fluid p-md-3" width="200px" alt="Kandidat <?= $i ?>"></td>
                            <td class="text-left">
                                <?= $value['visi_misi'] ?>
                            </td>
                        </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
<?php
    include ('includes/user/scripts.php');
?>
</html>