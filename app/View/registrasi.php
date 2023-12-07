<?php
    include ('includes/user/head.php');
    include ('includes/user/navbar.php');
?>

    <div class="container-fluid pt-5 gx-5 pb-5">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12">
                    <img src="/assets/img/user.png" class="img-fluid pb-3" alt="background" />
                </div>
                <div class="col-lg-5 col-md-12">
                    <h2>Daftar</h2>
                    <p class="">Silahkan Mendaftar agar bisa masuk ke sistem</p>
                    <?php if(isset($model['error'])){ ?>
                        <div class="row">
                            <div class="alert alert-danger" role="alert">
                                <?= $model['error'] ?>
                            </div>
                        </div>
                      <?php } ?>
                    <form method="post" action="/register" class="pb-5">
                        <div class="form-group">
                            <input type="text" name="nama_lengkap" class="form-control" id="exampleInputName" placeholder="Nama Lengkap" />
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-6 pe-2 pb-3 pb-md-0">
                                <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" />
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                        </div>
                        <p class=" text-muted">Sudah mempunyai akun? <a href="/login/pemilih" class="text-decoration-none text-primary font-weight-bold">Login</a></p>
                        <button type="submit" class="btn btn-success px-3">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-basecolor" style="height: 23vh"></div>
</body>
<?php
    include ('includes/user/scripts.php');
?>
</html>
