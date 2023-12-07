<?php
    include ('includes/user/head.php');
?>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                <h2 class="text-center text-white">Sistem E-Voting</h2>
                <p class="text-center text-white">Pemilihan Pengurus HMTI UMRAH</p>
                <?php if(isset($model['error'])){ ?>
                        <div class="row">
                            <div class="alert alert-danger" role="alert">
                                <?= $model['error'] ?>
                            </div>
                        </div>
                      <?php } ?>
                <div class="card text-center">
                    <div class="card-body">
                        <img src="/assets/img/admin-login.png" class="img-fluid mx-auto rounded-circle"
                            style="max-width: 150px;" alt="logo">
                        <form method="post" action="/login/admin" class="pt-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><img src="/assets/img/username.png"
                                            style="max-width: 15px;" alt="username-icon"></span>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="Username"
                                    aria-label="Username" aria-describedby="basic-addon1" />
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><img src="/assets/img/password.png"
                                            style="max-width: 15px;" alt="password-icon"></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password"
                                    aria-describedby="basic-addon2" />
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Masuk</button>
                                <a href="/" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php
    include ('includes/user/scripts.php');
?>
</html>