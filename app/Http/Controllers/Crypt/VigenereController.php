<?php

namespace App\Http\Controllers\Crypt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Interfaces\CryptInterface;

/**
 * Cifra de Vigenère
 *
 *  É importante lembrar que essa cifra é relativamente fácil de quebrar,
 *  especialmente se a chave for curta ou se você tiver muito texto cifrado.
 *  Portanto, é recomendável usá-la apenas para fins educacionais ou quando
 *  a segurança não é uma preocupação crítica.
 *  Para fins de segurança real, é melhor usar algoritmos de criptografia modernos e comprovadamente seguros.
 */

class VigenereController extends Controller implements CryptInterface
{
    private static $text;
    private static $key;
    private static $keyLen;

    /**
     * Função de Encryptar um texto normal
     *
     * @param string $text
     * @param string $key
     */
    public static function crypt(string $text, string $key)
    {
        self::$text   = strtoupper($text);
        self::$key    = strtoupper($key);
        self::$keyLen = strlen(self::$key);
        $result = '';

        for($i = 0; $i < strlen($text); $i++) {

            $char = self::$text[$i];

            if(ctype_alpha($char)) {
                $charCode = ord($char) - 65;
                $keyChar  = self::$key[$i % self::$keyLen];
                $keyCode  = ord($keyChar) - 65;
                $encryptedCharCode = ($charCode + $keyCode) % 26 + 65;
                $result .= chr($encryptedCharCode);
            } else {
                $result .= $char;
            }
        }

        return $result;
    }

    /**
     * Função de Decryptar um texto Cryptografado
     *
     * @param string $text
     * @param string $key
     */
    public static function decrypt(string $text, string $key)
    {
        self::$text   = strtoupper($text);
        self::$key    = strtoupper($key);
        self::$keyLen = strlen(self::$key);
        $result = '';

        for($i = 0; $i < strlen(self::$text); $i++) {

            $char = self::$text[$i];

            if(ctype_alpha($char)) {
                $charCode = ord($char) - 65;
                $keyChar = self::$key[$i % self::$keyLen];
                $keyCode = ord($keyChar) - 65;
                $decryptedCharCode = ($charCode - $keyCode + 26) % 26 + 65; // Essa linha diferencia a função da função de encryptar
                $result .= chr($decryptedCharCode);
            } else {
                $result .= $char;
            }
        }

        return strtolower($result);
    }
}
