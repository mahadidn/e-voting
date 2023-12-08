<?php
    include ('includes/admin/header.php');
    include ('includes/admin/sidebar.php');
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><?= $model['title'] ?></h1>
                <?php if(isset($model['error'])){ ?>
                        <div class="row">
                            <div class="alert alert-danger" role="alert">
                                <?= $model['error'] ?>
                            </div>
                        </div>
                 <?php } ?>
            </div>

            <!-- DataTales Example -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <?php if($model['title'] == 'Edit Data Kandidat'){ ?>
                        
                            <div class="form-group">
                            <label for="inputNama">Nama Kandidat</label>
                            <input required type="text" name="nama" class="form-control" id="inputNama" placeholder="" value="<?= $model['kandidat']['nama_lengkap'] ?>">
                        </div>
                        <div class="form-group">
                            <p class="my-2">Foto Kandidat</p>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="upload_file" id="inputGroupFile02">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                            <p class="small mt-2">*Ukuran maksimal foto adalah 500 kb</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Profil</label>
                            <textarea name="profil" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="<?= $model['kandidat']['profil'] ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Visi Misi</label>
                            <textarea name="visimisi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="<?= $model['kandidat']['visi_misi'] ?>"></textarea>
                        </div>

                        <?php }else { ?>
                        
                        <div class="form-group">
                            <label for="inputNama">Nama Kandidat</label>
                            <input required type="text" name="nama" class="form-control" id="inputNama" placeholder=""
                                value="">
                        </div>
                        <div class="form-group">
                            <p class="my-2">Foto Kandidat</p>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="upload_file" id="inputGroupFile02">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                            <p class="small mt-2">*Ukuran maksimal foto adalah 500 kb</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Profil</label>
                            <textarea name="profil" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Visi Misi</label>
                            <textarea name="visimisi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <?php } ?>
                        <div class="card-header px-0">
                            <button type="submit" class="btn btn-base" name="" value="">
                                Simpan Perubahan
                            </button>
                            <a type="button" class="btn btn-danger" href="/data/kandidat">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        // Add this to add name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
<?php
    include ('includes/admin/footer.php');
    include ('includes/admin/scripts.php');
?>
