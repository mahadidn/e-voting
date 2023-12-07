<?php

namespace Klp12\Evoting\Service;

use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Model\Domain\User;
use Klp12\Evoting\Model\LoginRequest;
use Klp12\Evoting\Repository\UserRepository;

class UserService {

    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    // register service
    public function registerUser(User $user): User {

        $this->validateRegisterUser($user);

        try {
            Database::beginTransaction();
            $findUser = $this->userRepository->findByUsername($user->username);
            if ($findUser != null){
                throw new \Exception("Username telah digunakan");
            }

            $newUser = new User();
            $newUser->username = $user->username;
            $newUser->password = password_hash($user->password, PASSWORD_BCRYPT);
            $newUser->nama_lengkap = $user->nama_lengkap;
            $newUser->email = $user->email;

            $this->userRepository->saveUser($newUser);

            Database::commitTransaction();
            return $newUser;
        }catch(\Exception $e){
            Database::rollbackTransaction();
            throw $e;
        }
    

    }

    private function validateRegisterUser(User $user){
        if ($user->username == null || $user->password == null || $user->email == null || $user->nama_lengkap == null
        || trim($user->username) == "" || trim($user->password) == "" || trim($user->email) == "" || trim($user->nama_lengkap) == ""){
            throw new \Exception("Form Registrasi tidak boleh ada yang kosong!");
        }
    }

    // login
    public function login(LoginRequest $login){
        $this->validateLoginRequest($login);
        $user = $this->userRepository->findByUsername($login->username);
        if ($user == null){
            throw new \Exception("Username atau Password salah!");
        }
        if(password_verify($login->password, $user->password)){
            if($user->usertype == "user"){
                $loginResponse = $user;
                $loginResponse->usertype = $user->usertype;
                $loginResponse->username = $user->username;
                $loginResponse->id = $user->id;
                $loginResponse->nama_lengkap = $user->nama_lengkap;
                $loginResponse->email = $user->email;

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

