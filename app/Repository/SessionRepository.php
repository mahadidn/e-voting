<?php

namespace Klp12\Evoting\Repository;

use Klp12\Evoting\Model\Domain\Admin;
use Klp12\Evoting\Model\Domain\SessionAdmin;
use Klp12\Evoting\Model\Domain\SessionUser;
use Klp12\Evoting\Model\Domain\User;

class SessionRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection){
        $this->connection = $connection;
    }

    // create session
    public function createSession(SessionUser|SessionAdmin $session): SessionUser|SessionAdmin {

        if ($session->usertype == "user"){

            $statement = $this->connection->prepare("INSERT INTO session_user (id, user_id, username_session) VALUES (?, ?, ?)");
            $statement->execute([$session->id, $session->user_id, $session->username_session]);
            $session->usertype = "user";

            return $session;
        }else if($session->usertype == "admin"){
            $statement = $this->connection->prepare("INSERT INTO session_admin(id, user_id, username_session) VALUES (?, ?, ?)");
            $statement->execute([$session->id, $session->user_id, $session->username_session]);
            $session->usertype == "admin";
            return $session;
        }
        

    } 

    public function findByUserId(string $userId): SessionUser|SessionAdmin|null {

        $statementUser = $this->connection->prepare("SELECT id, user_id, username_session FROM session_user WHERE user_id = ?");
        $statementUser->execute([$userId]);

        $statementAdmin = $this->connection->prepare("SELECT id, user_id, username_session FROM session_admin WHERE user_id = ?");
        $statementAdmin->execute([$userId]);

        try {
            if($row = $statementUser->fetch()){
                $sessionUser = new SessionUser();
                $sessionUser->usertype = "user";
                $sessionUser->username_session = $row['username_session'];
                $sessionUser->user_id = $row['user_id'];
                $sessionUser->id = $row['id'];

                return $sessionUser;
            }else if ($row = $statementAdmin->fetch()){
                $sessionAdmin = new SessionAdmin();
                $sessionAdmin->usertype = "admin";
                $sessionAdmin->username_session = $row['username_session'];
                $sessionAdmin->user_id = $row['user_id'];
                $sessionAdmin->id = $row['id'];

                return $sessionAdmin;
            }else {
                return null;
            }
        }finally {
            $statementUser->closeCursor();
            $statementAdmin->closeCursor();
        }
    }

    public function deleteByUserId(string $userId): void {
        $result = $this->findByUserId($userId);

        if ($result->usertype == "user"){

            $statementUser = $this->connection->prepare("DELETE FROM session_user WHERE user_id = ?");
            $statementUser->execute([$userId]);
        }else if ($result->usertype == "admin"){
            $statementAdmin = $this->connection->prepare("DELETE FROM session_admin WHERE user_id = ?");
            $statementAdmin->execute([$userId]);
        }

    }

    public function findByUsername(string $username): Admin|User {
        $statementAdmin = $this->connection->prepare("SELECT id, username, email FROM admin WHERE username = ?");
        $statementAdmin->execute([$username]);

        $statementUser = $this->connection->prepare("SELECT id, username, email, nama_lengkap, status_memilih FROM user WHERE username = ?");
        $statementUser->execute([$username]);

        try {

            if($row = $statementAdmin->fetch()){
                $admin = new Admin();
                $admin->id = $row['id'];
                $admin->username = $row['username'];
                $admin->email = $row['email'];
                $admin->usertype = "admin";
                return $admin;
            }else if ($row = $statementUser->fetch()){
                $user = new User();
                $user->id = $row['id'];
                $user->username = $row['username'];
                $user->email = $row['email'];
                $user->nama_lengkap = $row['nama_lengkap'];
                $user->usertype = "user";
                $user->status_memilih = $row['status_memilih'];

                return $user;
            }else {
                return null;
            }
        }finally {
            $statementAdmin->closeCursor();
            $statementUser->closeCursor();
        }
    }

}

