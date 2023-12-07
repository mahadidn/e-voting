<?php
    include ('includes/user/head.php');
    include ('includes/user/navbar.php');
?>

    <div class="container-fluid pt-5 gx-5">
        <div class="container">
            <h2 class="text-center">Voting Sekarang!</h2>
            <p class="text-center">Silahkan Pilih Kandidat yang Terbaik bagi Anda</p>
            <form method="post" action="/vote">
            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-12 pb-3">
                    <div class="card p-3 bg-light">
                        <img src="/assets/img/kandidat.jpg" class="card-img-top img-fluid" alt="Kandidat 1" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Kandidat 1</h5>
                            <div
                                class="custom-control custom-radio custom-control-inline d-flex align-items-center justify-content-center">
                                <input type="radio" id="customRadioInline1" name="customRadioGroup1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">1</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 pb-3">
                    <div class="card p-3 bg-light">
                        <img src="/assets/img/kandidat.jpg" class="card-img-top img-fluid" alt="Kandidat 2" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Kandidat 2</h5>
                            <div
                                class="custom-control custom-radio custom-control-inline d-flex align-items-center justify-content-center">
                                <input type="radio" id="customRadioInline2" name="customRadioGroup1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">2</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 pb-3">
                    <div class="card p-3 bg-light">
                        <img src="/assets/img/kandidat.jpg" class="card-img-top img-fluid" alt="Kandidat 3" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Kandidat 3</h5>
                            <div
                                class="custom-control custom-radio custom-control-inline d-flex align-items-center justify-content-center">
                                <input type="radio" id="customRadioInline3" name="customRadioGroup1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline3">3</label>
                            </div>
                        </div>
                    </div>
                </div>
                
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
