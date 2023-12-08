<?php

namespace Klp12\Evoting\Controller;

use Klp12\Evoting\App\View;
use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Model\Domain\Kandidat;
use Klp12\Evoting\Model\Domain\User;
use Klp12\Evoting\Model\LoginRequest;
use Klp12\Evoting\Repository\AdminRepository;
use Klp12\Evoting\Repository\SessionRepository;
use Klp12\Evoting\Repository\UserRepository;
use Klp12\Evoting\Service\AdminService;
use Klp12\Evoting\Service\SessionService;
use Klp12\Evoting\Service\UserService;

class AdminController {

    private AdminService $adminService;
    private SessionService $sessionService;
    private UserService $userService;

    public function __construct(){
        $connection = Database::getConnection("prod");
        
        // repository
        $adminRepository = new AdminRepository($connection);
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);

        // service
        $this->adminService = new AdminService($adminRepository);
        $this->sessionService = new SessionService($sessionRepository);
        $this->userService = new UserService($userRepository);
    }

    public function login(): void {

        $admin = $this->sessionService->current();
        if ($admin->usertype == 'admin'){
            View::redirect('/beranda/admin');
        }

        View::render('login-admin', [
            'title' => 'login admin'
        ]);
    }

    public function postLogin(): void {
        $loginRequest = new LoginRequest();
        $loginRequest->username = $_POST['username'];
        $loginRequest->password = $_POST['password'];

        try {
            $response = $this->adminService->loginAdmin($loginRequest);

            $this->sessionService->create($response->id, $response->username);
            
            View::redirect('/beranda/admin');
        }catch(\Exception $e){
            View::render('login-admin', [
                'title' => 'login admin',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function beranda(): void {
        View::render('beranda', [
            'title' => 'beranda'
        ]);
    }

    public function dataPemilih(): void {

        $row = $this->adminService->tampilkanDataPengguna();

        View::render('data-pemilih', [
            'title' => 'Data Pemilih',
            'pemilih' => $row
        ]);
    }

    public function dataKandidat(): void {

        $kandidat = $this->adminService->tampilkanKandidat();

        View::render('data-kandidat', [
            'title' => 'Data Kandidat',
            'kandidat' => $kandidat
        ]);
    }

    public function dataKandidatTambah(): void {
        
        View::render('form-kandidat', [
            'title' => 'Tambah Data Kandidat'
        ]);
    }

    public function postDataKandidatTambah(): void {

        try {

            $fileName = $_FILES['upload_file']['name'];
            $fileSize = $_FILES['upload_file']['size'];
            $fileTmpName = $_FILES['upload_file']['tmp_name'];
            $fileError = $_FILES['upload_file']['error'];
    
            if ($fileError === 4){
                throw new \Exception("Pilih Gambar Terlebih Dahulu");
            }
    
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode(".", $fileName);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
    
            if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
                throw new \Exception("File yang di upload bukan gambar");
            }
    
            if ($fileSize > 500000){
                throw new \Exception('Ukuran Gambar Terlalu Besar!');
            }
    
            $newImage = uniqid();
            $newImage .= '.';
            $newImage .= $ekstensiGambar;
            $destination = __DIR__ . '/../../public/assets/img/' . $newImage;
            
            move_uploaded_file($fileTmpName, $destination);
    
            $kandidat = new Kandidat();
            $kandidat->nama_kandidat = $_POST['nama'];
            $kandidat->foto = $newImage;
            $kandidat->profil = $_POST['profil'];
            $kandidat->visi_misi = $_POST['visimisi'];

            $this->adminService->tambahKandidat($kandidat);

            View::redirect('/data/kandidat');
        }catch (\Exception $e){
            View::render('form-kandidat', [
                'title' => 'Tambah Data Kandidat',
                'error' => $e->getMessage()
            ]);
        }

    }

    public function dataKandidatEdit($id){
        $row = $this->adminService->tampilSatuKandidat($id);

        View::render('form-kandidat', [
            'title' => 'Edit Data Kandidat',
            'kandidat' => $row
        ]);

    }

    public function dataVoting(): void {
        View::render('data-voting', [
            'title' => 'Data Voting'
        ]);
    }

    public function dataRekapitulasiVoting(): void {
        View::render('data-rekapitulasi-voting', [
            'title' => 'Rekapitulasi Voting'
        ]);
    }

    public function dataPengguna(): void {

        $row = $this->adminService->tampilkanDataPengguna();

        View::render('data-pengguna', [
            'title' => 'Data Pengguna',
            'pengguna' => $row
        ]);
    }

    public function dataPenggunaTambah(): void {
        View::render('form-pengguna', [
            'title' => 'Tambah Data Pengguna'
        ]);
    }

    public function postDataPenggunaTambah(): void {
        $user = new User();
        $user->username = $_POST['username'];
        $user->nama_lengkap = $_POST['nama'];
        $user->email = $_POST['email'];
        $user->password = $_POST['passBaru'];

        $this->userService->registerUser($user);
        View::redirect('/data/pengguna');

    }

    public function dataPenggunaHapus($id): void {
        $this->adminService->hapusDataPengguna($id);
        View::redirect('/data/pengguna');
    }

    public function dataPenggunaEdit(): void {
        View::render('form-pengguna', [
            'title' => 'Edit Data Pengguna'
        ]);
    }

    public function postDataPenggunaEdit($id): void {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['passBaru'];
        $this->adminService->editPengguna($nama, $id, $username, $email, $password);
        View::redirect('/data/pengguna');
    }

    public function gantiPassword(): void {
        View::render('ganti-password', [
            'title' => 'Ganti Password'
        ]);
    }

    public function logout(): void {
        $this->sessionService->destroy();
        View::redirect('/login/admin');
    }

}