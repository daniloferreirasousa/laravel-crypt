<?php

namespace App\Http\Controllers\Interfaces;

interface CryptInterface
{
    public static function crypt(string $text, string $key);
    public static function decrypt(string $text, string $key);
}
