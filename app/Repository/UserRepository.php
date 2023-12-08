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

    // tambah suara
    public function tambahSuara($suara, $username, $id){
        $statement = $this->connection->prepare("update kandidat SET jumlah_suara = ? WHERE id = ?");
        $statement->execute([$suara, $id]);
        
        $statementUser = $this->connection->prepare("update user SET status_memilih = 'sudah' WHERE username = ?");
        $statementUser->execute([$username]);
    }

    // tampil semua kandidat
    public function tampilkanKandidat(){
        $statement = $this->connection->prepare("SELECT * FROM kandidat");
        $statement->execute();

        $row = $statement->fetchAll();
        return $row;

    }

    // dapatin data kandidat
    public function tampilkanSatuKandidat($id_kandidat){
        $statement = $this->connection->prepare("SELECT * FROM kandidat WHERE id = ?");
        $statement->execute([$id_kandidat]);

        $row = $statement->fetch();
        return $row;
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

