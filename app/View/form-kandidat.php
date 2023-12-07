<?php
    include ('includes/admin/header.php');
    include ('includes/admin/sidebar.php');
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Form Kandidat</h1>
            </div>

            <!-- DataTales Example -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputNama">Nama Kandidat</label>
                            <input required type="text" name="nama" class="form-control" id="inputNama" placeholder=""
                                value="">
                        </div>
                        <div class="form-group">
                            <p class="my-2">Foto Kandidat</p>
                            <div class="custom-file">
                                <label class="custom-file-label" for="customFile" accept="image/*">Pilih Foto</label>
                                <input type="file" class="custom-file-input" id="customFile">
                                <p class="small mt-2">*Ukuran maksimal foto adalah 500 kb</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Profil</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Visi Misi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
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
