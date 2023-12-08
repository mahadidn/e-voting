<?php

namespace Klp12\Evoting\Model\Domain;

class Kandidat {

    public string $nama_kandidat;
    public ?int $id = null;
    public string $profil;
    public ?string $jumlah_suara = null;
    public ?string $foto = null;
    public string $visi_misi;
}

