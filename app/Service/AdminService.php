<?php

namespace Klp12\Evoting\Service;

use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Model\Domain\Admin;
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

}

