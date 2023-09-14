<?php

namespace App\Http\Controllers\Crypt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\http\Controllers\Interfaces\CryptInterface;

class VernamController extends Controller implements CryptInterface
{
    private static $binaryText = '';
    private static $binaryKey = '';
    private static $textLen = 0;

    public static function crypt(string $text, string $key)
    {
        $textCrypt = '';

        self::$binaryText = self::strToBinary($text);
        self::$binaryKey  = self::strToBinary($key);

        if(strlen(self::$binaryText) !== strlen(self::$binaryKey)) {
            throw new \InvalidArgumentException("A chave e o texto devem ter o mesmo tamanho em bits");
        }

        self::$textLen    = strlen(self::$binaryText);

        for($i = 0; $i < self::$textLen; $i++) {
            $bitText = isset(self::$binaryText[$i]) ? self::$binaryText[$i] : '';
            $bitKey  = isset(self::$binaryKey[$i]) ? self::$binaryKey[$i] : '';

            // Realiza a operação XOR
            $bitResult = ($bitText == $bitKey) ? '0' : '1';
            $textCrypt .= $bitResult;
        }

        return self::binaryToStr($textCrypt);
    }


    public static function decrypt(string $text, string $key)
    {
        return self::crypt($text, $key);
    }



    public static function strToBinary($text)
    {
        $binary = '';
        self::$textLen = strlen($text);

        for ($i = 0; $i < self::$textLen; $i++) {
            $char = $text[$i];
            $binary .= str_pad(decbin(ord($char)), 8, '0', STR_PAD_LEFT);
        }

        return $binary;
    }

    public static function binaryToStr($binary)
    {
        $text = '';
        self::$textLen = strlen($binary);

        for ($i = 0; $i < self::$textLen; $i += 8) {
            $byte = substr($binary, $i, 8);
            $text .= chr(bindec($byte));
        }

        return $text;
    }
}
