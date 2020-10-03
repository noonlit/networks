<?php

spl_autoload_register(function ($className) {
    $className = str_replace("\\", "/", $className);
        require __DIR__ . '/app/' . $className . '.php';
});
