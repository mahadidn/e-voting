<?php

namespace Klp12\Evoting\Middleware;

use Klp12\Evoting\App\View;
use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Repository\SessionRepository;
use Klp12\Evoting\Service\SessionService;

class SudahPilihMiddleware implements Middleware {
    

    private SessionService $sessionService;

    public function __construct(){
        $sessionRepository = new SessionRepository(Database::getConnection('prod'));
        $this->sessionService = new SessionService($sessionRepository);
    }

    function before(): void{
        $user = $this->sessionService->current();
        
        if ($user->status_memilih == 'sudah'){
            View::redirect('/quick-count');
        }
        
    }
}

