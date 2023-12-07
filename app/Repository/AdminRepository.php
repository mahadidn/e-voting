<?php

namespace Klp12\Evoting\Repository;

use Klp12\Evoting\Model\Domain\Admin;

class AdminRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection){
        $this->connection = $connection;
    }

    // register
    public function saveAdmin(Admin $admin): Admin {
        $statement = $this->connection->prepare("INSERT INTO admin (username, password, email) VALUES (?, ?, ?)");
        $statement->execute([$admin->username, $admin->password, $admin->email]);

        return $admin;
    }

    // login

    // helper
    public function findByUsername($username): Admin|null {
        $statementAdmin = $this->connection->prepare("SELECT id, username, password, email FROM admin WHERE username = ?");
        $statementAdmin->execute([$username]);

        try {
            if($row = $statementAdmin->fetch()){
                $admin = new Admin();
                $admin->username = $row['username'];
                $admin->password = $row['password'];
                $admin->email = $row['email'];
                $admin->id = $row['id'];
                
                return $admin;
            }else {
                return null;
            }
        }finally {
            $statementAdmin->closeCursor();
        }

    }

}

