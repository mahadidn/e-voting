<?php

namespace Klp12\Evoting\Model\Domain;

class User {

    public string $usertype = "user";
    public ?int $id = null;
    public ?string $username = null;
    public ?string $nama_lengkap = null;
    public ?string $email = null;
    public ?string $password = null;

}

