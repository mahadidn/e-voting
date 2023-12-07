<?php
    include ('includes/user/head.php');
    include ('includes/user/navbar.php');
?>

    <div class="container-fluid bg-basecolor d-flex flex-wrap pt-5">
        <div class="col-md-6 text-white">
            <h1 class="">Sistem Pemungutan Suara (E-Voting) Pemilihan Pengurusan HMTI UMRAH Online Berbasis Web</h1>
            <p>Selamat datang di Sistem Pemungutan Suara (E-Voting) online berbasis web Anda bisa mengakses dari mana saja
                dan kapan saja</p>
            <div class="">
                <a href="/login/pemilih" class="btn btn-info text-white mr-2">Vote Now</a>
                <a href="/kandidat" class="btn btn-outline-light"> Candidate List</a>
            </div>
        </div>
        <div class="col-6 col-md-6 d-flex justify-content-end">
            <img src="/assets/img/voting-box.png" width="300px" class="img-fluid" alt="voting-box" />
        </div>
    </div>
    

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 200">
        <path fill="#3F87DB" fill-opacity="1"
            d="M0,128L34.3,112C68.6,96,137,64,206,69.3C274.3,75,343,117,411,138.7C480,160,549,160,617,138.7C685.7,117,754,75,823,64C891.4,53,960,75,1029,106.7C1097.1,139,1166,181,1234,165.3C1302.9,149,1371,75,1406,37.3L1440,0L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
        </path>
    </svg>
</body>
<?php
    include ('includes/user/scripts.php');
?>
</html>