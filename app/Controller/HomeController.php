<?php

namespace Klp12\Evoting\Controller;

use Klp12\Evoting\App\View;
use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Repository\SessionRepository;
use Klp12\Evoting\Service\SessionService;

class HomeController {

    private SessionService $sessionService;

    public function __construct(){
        $sessionRepository = new SessionRepository(Database::getConnection('prod'));

        $this->sessionService = new SessionService($sessionRepository);
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

        $user = $this->sessionService->current();
        if ($user->usertype == null){
            
            View::render('quick-count', [
                'title' => 'Quick Count'
            ]);
        }else {
            View::render('quick-count', [
                'title' => 'Quick Count',
                'type' => $user->usertype,
                'username' => $user->username
            ]);
        }
    }

    public function kandidat(): void {
        $user = $this->sessionService->current();
        if ($user->usertype == null){
            
            View::render('kandidat', [
                'title' => 'kandidat'
            ]);
        }else {
            View::render('kandidat', [
                'title' => 'kandidat',
                'type' => $user->usertype,
                'username' => $user->username
            ]);
        }
    }

}
