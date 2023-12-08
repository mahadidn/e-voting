<?php

namespace Klp12\Evoting\Controller;

use Klp12\Evoting\App\View;
use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Repository\SessionRepository;
use Klp12\Evoting\Repository\UserRepository;
use Klp12\Evoting\Service\SessionService;
use Klp12\Evoting\Service\UserService;

class HomeController {

    private SessionService $sessionService;
    private UserService $userService;

    public function __construct(){
        $sessionRepository = new SessionRepository(Database::getConnection('prod'));
        $userRepository = new UserRepository(Database::getConnection('prod'));

        $this->sessionService = new SessionService($sessionRepository);
        $this->userService = new UserService($userRepository);
    }

    public function index(): void {
        $user = $this->sessionService->current();
        if ($user->usertype == null){
            
            View::render('index', [
                'title' => 'login'
            ]);
        }else {
            View::render('index', [
                'title' => 'login',
                'type' => $user->usertype,
                'username' => $user->username
            ]);
        }

    }

    public function quickCount(): void {

        $row = $this->userService->tampilKandidat();

        $user = $this->sessionService->current();
        if ($user->usertype == null){
            
            View::render('quick-count', [
                'title' => 'Quick Count',
                'kandidat' => $row
            ]);
        }else {
            View::render('quick-count', [
                'title' => 'Quick Count',
                'type' => $user->usertype,
                'username' => $user->username,
                'kandidat' => $row
            ]);
        }
    }

    public function kandidat(): void {

        $row = $this->userService->tampilKandidat();

        $user = $this->sessionService->current();
        if ($user->usertype == null){
            
            View::render('kandidat', [
                'title' => 'kandidat',
                'kandidat' => $row
            ]);
        }else {
            View::render('kandidat', [
                'title' => 'kandidat',
                'type' => $user->usertype,
                'username' => $user->username,
                'kandidat' => $row
            ]);
        }
    }

}
