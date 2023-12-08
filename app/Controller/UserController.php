<?php

namespace Klp12\Evoting\Controller;

use Klp12\Evoting\App\View;
use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Model\Domain\User;
use Klp12\Evoting\Model\LoginRequest;
use Klp12\Evoting\Repository\SessionRepository;
use Klp12\Evoting\Repository\UserRepository;
use Klp12\Evoting\Service\SessionService;
use Klp12\Evoting\Service\UserService;

class UserController {

    private UserService $userService;
    private SessionService $sessionService;

    public function __construct(){
        $connection = Database::getConnection("prod");

        // repo
        $userRepository = new UserRepository($connection);
        $sessionRepository = new SessionRepository($connection);

        // service
        $this->userService = new UserService($userRepository);
        $this->sessionService = new SessionService($sessionRepository);
    }

    public function login(): void {

        $user = $this->sessionService->current();
        
        if (isset($user->usertype)){
            View::redirect('/beranda/user');
        }else {
            View::render('login-pemilih', [
                'title' => 'login'
            ]);
        }

    }

    public function postLogin(): void {
        
        $loginRequest = new LoginRequest();
        $loginRequest->username = $_POST['username'];
        $loginRequest->password = $_POST['password'];

        try {
            $response = $this->userService->login($loginRequest);

            $this->sessionService->create($response->id, $response->username);
            View::redirect('/beranda/user');

        }catch(\Exception $e){
            View::render('login-pemilih', [
                'title' => 'Login Pemilih',
                'error' => $e->getMessage()
            ]);
        }

    }

    public function register(): void {
        View::render('registrasi', [
            'title' => 'Register User'
        ]);
    }

    // register
    public function postRegister(): void {
        $user = new User();
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->nama_lengkap = $_POST['nama_lengkap'];

        try {
            $this->userService->registerUser($user);
            View::redirect('/login/pemilih');
        }catch(\Exception $e){
            View::render('registrasi', [
                'title' => 'Register User',
                'error' => $e->getMessage()
            ]);
        }

    }



    // habis login
    public function halamanUser(): void {
        $user = $this->sessionService->current();
        $row = $this->userService->tampilKandidat();
        View::render('vote', [
            'title' => 'Vote',
            'type' => $user->usertype,
            'username' => $user->username,
            'kandidat' => $row
        ]);
    }

    // post Vote
    public function postVote(): void {

        var_dump($_POST['id']);

        $user = $this->sessionService->current();

        $this->userService->tambahSuara($user->username, $_POST['id']);

        View::redirect('/');
    }

    // logout
    public function logout(): void {
        $this->sessionService->destroy();
        View::redirect('/login/pemilih');
    }

}
