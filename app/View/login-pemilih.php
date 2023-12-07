<?php
    include ('includes/user/head.php');
    include ('includes/user/navbar.php');
?>

    <div class="container-fluid pt-5 gx-5 pb-5">
        <div class="container pt-5">
            <div class="row justify-content-center pb-5">
                <div class="col-lg-7 col-md-12">
                    <img src="/assets/img/user.png" class="img-fluid pb-3" alt="background" />
                </div>
                <div class="col-lg-5 col-md-12">
                    <h2>Login Pemilih</h2>
                    <?php if(isset($model['error'])){ ?>
                        <div class="row">
                            <div class="alert alert-danger" role="alert">
                                <?= $model['error'] ?>
                            </div>
                        </div>
                      <?php } ?>
                    <p class="">Silahkan Login sebelum melakukan Voting</p>
                    <form method="post" action="/login/pemilih" class="pb-5">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="exampleInputUsername"
                                placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                        </div>
                        <p class="text-muted">Belum mempunyai akun? <a href="/register" class="text-decoration-none text-primary font-weight-bold ">Daftar</a></p>
                        <button type="submit" class="btn btn-success px-3">Masuk</button>
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