<?php

namespace Klp12\Evoting\Repository;

use Klp12\Evoting\Model\Domain\SessionUser;
use Klp12\Evoting\Model\Domain\User;

class UserRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection){
        $this->connection = $connection;
    }

    // register repository
    public function saveUser(User $user): User{
        
        $statement = $this->connection->prepare("INSERT INTO user (username, password, email, nama_lengkap) VALUES (?, ?, ?, ?)");
        $statement->execute([$user->username, $user->password, $user->email, $user->nama_lengkap]);

        return $user;
    }


    // helper
    public function findByUsername($username): User|null{

        $statementUser = $this->connection->prepare("SELECT id, username, nama_lengkap, password, email FROM user WHERE username = ?");
        $statementUser->execute([$username]);

        try {
            if($row = $statementUser->fetch()){
                $user = new User();
                $user->username = $row['username'];
                $user->password = $row['password'];
                $user->email = $row['email'];
                $user->nama_lengkap = $row['nama_lengkap'];
                $user->id = $row['id'];

                return $user;
            }else {
                return null;
            }
        }finally {
            $statementUser->closeCursor();
        }

    }

}

