<?php

function getDatabaseConfig(): array {
    return [
        "database" => [
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=evoting",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}

