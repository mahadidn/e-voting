<?php

namespace Klp12\Evoting\Model\Domain;

class SessionUser {

    public string $usertype = "user";
    public ?int $id = null;
    public string $user_id;
    public string $username_session;
}

