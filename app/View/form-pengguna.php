<?php
    include ('includes/admin/header.php');
    include ('includes/admin/sidebar.php');
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <?php if(strstr($model['title'], 'Edit')){ ?>
                    <h1 class="h3 mb-2 text-gray-800">Form Edit Pengguna</h1>
                <?php }else { ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Form Pengguna</h1>
                <?php } ?>
            </div>

            <!-- DataTales Example -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputNama">Nama</label>
                            <input required type="text" name="nama" class="form-control" id="inputNama" placeholder=""
                                value="">
                        </div>
                        <div class="form-group">
                            <label for="inputUsername">Username</label>
                            <input required type="text" name="username" class="form-control" id="inputUsername"
                                placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input required type="email" name="email" class="form-control" id="inputEmail"
                                placeholder="" value="">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassBaru">Password Baru</label>
                                <input required type="password" name="passBaru" class="form-control" id="inputPassBaru"
                                    placeholder="" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputKonfirmasiPass">Konfirmasi Password Baru</label>
                                <input required type="password" name="konfirmasiPass" class="form-control"
                                    id="inputKonfirmasiPass" placeholder="" value="">
                            </div>
                        </div>
                        <div class="card-header">
                            <button type="submit" class="btn btn-base" name="" value="">
                                Simpan Perubahan
                            </button>
                            <a type="button" class="btn btn-danger" href="/data/pengguna">
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
