<?php

namespace Klp12\Evoting\Controller;

use Klp12\Evoting\App\View;
use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Model\LoginRequest;
use Klp12\Evoting\Repository\AdminRepository;
use Klp12\Evoting\Repository\SessionRepository;
use Klp12\Evoting\Service\AdminService;
use Klp12\Evoting\Service\SessionService;

class AdminController {

    private AdminService $adminService;
    private SessionService $sessionService;

    public function __construct(){
        $connection = Database::getConnection("prod");
        
        // repository
        $adminRepository = new AdminRepository($connection);
        $sessionRepository = new SessionRepository($connection);

        // service
        $this->adminService = new AdminService($adminRepository);
        $this->sessionService = new SessionService($sessionRepository);
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
        View::render('data-pemilih', [
            'title' => 'Data Pemilih'
        ]);
    }

    public function dataKandidat(): void {
        View::render('data-kandidat', [
            'title' => 'Data Kandidat'
        ]);
    }

    public function dataKandidatTambah(): void {
        View::render('form-kandidat', [
            'title' => 'Tambah Data Kandidat'
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
        View::render('data-pengguna', [
            'title' => 'Data Pengguna'
        ]);
    }

    public function dataPenggunaTambah(): void {
        View::render('form-pengguna', [
            'title' => 'Tambah Data Pengguna'
        ]);
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