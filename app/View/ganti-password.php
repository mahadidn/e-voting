<?php
    include ('includes/admin/header.php');
    include ('includes/admin/sidebar.php');
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-base" style="font-weight: 600">Ganti Password</h1>
            </div>

            <!-- DataTales Example -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputPassLama">Password Lama</label>
                            <input required type="password" name="passLama" class="form-control" id="inputPassLama"
                                placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputPassBaru">Password Baru</label>
                            <input required type="password" name="passBaru" class="form-control" id="inputPassBaru"
                                placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputKonfirmasiPass">Konfirmasi Password Baru</label>
                            <input required type="password" name="konfirmasiPass" class="form-control" id="inputKonfirmasiPass"
                                placeholder="" value="">
                        </div>
                        <div class="card-header">
                            <button type="submit" class="btn btn-base" name="" value="">
                                Simpan Perubahan
                            </button>
                            <a type="button" class="btn btn-danger" href="/beranda/admin">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
    include ('includes/admin/footer.php');
    include ('includes/admin/scripts.php');
?>
