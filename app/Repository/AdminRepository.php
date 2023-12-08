<?php

namespace Klp12\Evoting\Repository;

use Klp12\Evoting\Model\Domain\Admin;
use Klp12\Evoting\Model\Domain\Kandidat;

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

    // pengguna
    public function tampilkanDataPengguna(){
        $statement = $this->connection->prepare("SELECT id, username, email, nama_lengkap, status_memilih FROM user");
        $statement->execute();
        $row = $statement->fetchAll();

        return $row;
    }

    // hapus data pengguna
    public function hapusDataPengguna($id){
        $statement = $this->connection->prepare("DELETE FROM user WHERE id = ?");
        $statement->execute([$id]);
    }

    // edit data pengguna
    public function editPengguna($nama, $id, $username, $email, $password){
        $statement = $this->connection->prepare("UPDATE user SET nama_lengkap = ?, username = ?, email = ?, password = ? WHERE id = ?");
        $statement->execute([$nama, $username, $email, $password, $id]);
    }   

    // tambah data kandidat
    public function tambahKandidat(Kandidat $kandidat) {
        $statement = $this->connection->prepare("INSERT INTO kandidat(nama_lengkap, foto, profil, visi_misi) VALUES (?, ?, ?, ?)");
        $statement->execute([$kandidat->nama_kandidat, $kandidat->foto, $kandidat->profil, $kandidat->visi_misi]);
        
    }

    // tampilkan kandidat
    public function tampilkanKandidat(){
        $statement = $this->connection->prepare("SELECT * FROM kandidat");
        $statement->execute();

        $row = $statement->fetchAll();
        return $row;
    }

    // tampil satu kandidat
    public function tampilkanSatuKandidat($id){
        $statement = $this->connection->prepare("SELECT * from kandidat WHERE id = ?");
        $statement->execute([$id]);

        $row = $statement->fetch();
        return $row;
    }

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

