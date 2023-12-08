<?php
    include ('includes/user/head.php');
    include ('includes/user/navbar.php');
?>

    <div class="container-fluid pt-5 gx-5">
        <div class="container">
            <h2 class="text-center">Voting Sekarang!</h2>
            <p class="text-center">Silahkan Pilih Kandidat yang Terbaik bagi Anda</p>
            <form method="post" action="/beranda/user">
            <div class="row justify-content-center">
            
            <?php $i = 1; ?>
            
            <?php foreach ($model['kandidat'] as $key => $value) { ?>
                <div class="col-md-4 col-sm-12 pb-3">
                    <div class="card p-3 bg-light">
                        <img src="/assets/img/<?= $value['foto'] ?>" class="card-img-top img-fluid" width="200px" alt="Kandidat <?= $i ?>" />
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $value['nama_lengkap'] ?></h5>
                            <div
                                class="custom-control custom-radio custom-control-inline d-flex align-items-center justify-content-center">
                                <input type="radio" id="customRadioInline<?= $i ?>" name="id" value="<?= $value['id'] ?>"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline<?= $i ?>"><?= $i ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++;  } ?>    
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success px-3">Vote Now</button>
            </div>
            </form>
        </div>
    </div>
    </body>
<?php
    include ('includes/user/scripts.php');
?>
</html>
