<?php

namespace Klp12\Evoting\App;

class View {
    public static function render(string $view, $model){
        require __DIR__ . '/../View/' . $view . '.php';
    }

    public static function redirect(string $url){
        header("Location: $url");
    }
}

