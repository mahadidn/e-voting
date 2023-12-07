<?php

namespace Klp12\Evoting\Service;

use Klp12\Evoting\Model\Domain\Admin;
use Klp12\Evoting\Model\Domain\SessionAdmin;
use Klp12\Evoting\Model\Domain\SessionUser;
use Klp12\Evoting\Model\Domain\User;
use Klp12\Evoting\Repository\SessionRepository;

class SessionService {

    public static string $COOKIE_NAME = 'X-EVoting-Session';

    private SessionRepository $sessionRepository;

    public function __construct(SessionRepository $sessionRepository){
        $this->sessionRepository = $sessionRepository;
    }

    public function create(int $id, string $usernameSession) {
        $user = $this->sessionRepository->findByUsername($usernameSession);

        if ($user->usertype == "admin"){
            $session = new SessionAdmin();
            $session->id = $id;
            $session->user_id = uniqid();
            $session->username_session = $usernameSession;

            $this->sessionRepository->createSession($session);
            setcookie(self::$COOKIE_NAME, $session->user_id, time() + (60*60*24*30), "/");
            return $session;
        }else if ($user->usertype == "user"){
            $session = new SessionUser();
            $session->id = $id;
            $session->user_id = uniqid();
            $session->username_session = $usernameSession;

            $this->sessionRepository->createSession($session);
            setcookie(self::$COOKIE_NAME, $session->user_id, time() + (60*60*24*30), "/");
            return $session;
        }

    }

    public function destroy(){
        $sessionUserId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $this->sessionRepository->deleteByUserId($sessionUserId);

        setcookie(self::$COOKIE_NAME, '', 1, '/');
    }

    public function current(): Admin|User|null {
        $sessionUserId = $_COOKIE[self::$COOKIE_NAME] ?? '';

        $session = $this->sessionRepository->findByUserId($sessionUserId);
        if ($session == null){
            return null;
        }
        return $this->sessionRepository->findByUsername($session->username_session);
    }

}


