<?php

namespace Klp12\Evoting\Service;

use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Model\Domain\Admin;
use Klp12\Evoting\Model\Domain\Kandidat;
use Klp12\Evoting\Model\LoginRequest;
use Klp12\Evoting\Repository\AdminRepository;

class AdminService {
 
    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository){
        $this->adminRepository = $adminRepository;
    }

    // register admin
    public function registerAdmin(Admin $admin): Admin {
        
        try {
            Database::beginTransaction();
            $findAdmin = $this->adminRepository->findByUsername($admin->username);
            if ($findAdmin != null){
                throw new \Exception("Username telah digunakan");
            }

            $newAdmin = new Admin();
            $newAdmin->username = $admin->username;
            $newAdmin->password = password_hash($admin->password, PASSWORD_BCRYPT);
            $newAdmin->email = $admin->email;

            $this->adminRepository->saveAdmin($newAdmin);
            Database::commitTransaction();
            return $newAdmin;
        }catch (\Exception $e){
            Database::rollbackTransaction();
            throw $e;
        }

    }

    // login admin
    public function loginAdmin(LoginRequest $login){
        $this->validateLoginRequest($login);
        $admin = $this->adminRepository->findByUsername($login->username);
        if($admin == null){
            throw new \Exception("Username atau Password salah!");
        }
        if (password_verify($login->password, $admin->password)){
            if($admin->usertype == "admin"){
                $loginResponse = $admin;
                $loginResponse->usertype = $admin->usertype;
                $loginResponse->username = $admin->username;
                $loginResponse->email = $admin->email;
                $loginResponse->id = $admin->id;

                return $loginResponse;
            }
        }else {
                throw new \Exception("Username atau Password salah!");
        }

    }

    private function validateLoginRequest(LoginRequest $loginRequest){
        if ($loginRequest->username == null || $loginRequest->password == null || trim($loginRequest->username) == "" || trim($loginRequest->password) == ""){
            throw new \Exception("Username atau password tidak boleh kosong!");
        }
    }


    // tampilkan data pengguna
    public function tampilkanDataPengguna() {
        $akun = $this->adminRepository->tampilkanDataPengguna();

        return $akun;
    }

    // hapus data pengguna
    public function hapusDataPengguna($id){
        $this->adminRepository->hapusDataPengguna($id);
    }

    // edit pengguna
    public function editPengguna($nama, $id, $username, $email, $password){

        $password = password_hash($password, PASSWORD_BCRYPT);
       
        $this->adminRepository->editPengguna($nama, $id, $username, $email, $password);
        
    }

    // tambah kandidat
    public function tambahKandidat(Kandidat $kandidat){
        $this->adminRepository->tambahKandidat($kandidat);
    }

    // tampilkan kandidat
    public function tampilkanKandidat(){
        return $this->adminRepository->tampilkanKandidat();
    }

    // tampil satu kandidat
    public function tampilSatuKandidat($id){
        return $this->adminRepository->tampilkanSatuKandidat($id);
    }

    // edit kandidat
    public function editKandidat(Kandidat $kandidat, $id){
        $this->adminRepository->editKandidat($kandidat, $id);
    }

    // hapus kandidat
    public function hapusKandidat($id){
        $this->adminRepository->hapusKandidat($id);
    }

    // tampilkan data voting
    public function tampilkanVoting(){
        return $this->adminRepository->dataVoting();
    }

    // reset pemilih
    public function resetPemilih(){
        $this->adminRepository->resetPemilih();
    }

    // ganti password admin
    public function gantiPassword($password, $id){

        $password = password_hash($password, PASSWORD_BCRYPT);

        return $this->adminRepository->gantiPassword($password, $id);
    }

}

