<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Crypt\{
    VigenereController,
    VernamController
};

class SiteController extends Controller
{
    public static function index()
    {
        echo "<h1>Criptográfia</h1>";
    }

    public static function vigenere()
    {
        $chave = "marshmellow";
        $texto_claro = "O texto original é o texto sem a adição de criptografia, já o texto criptografado é o texto com adição da criptografia VIGENERE e o texto descriptografado é o texto original passado pelo processo de decriptação.";

        $texto_cripty = VigenereController::crypt($texto_claro, $chave);
        $texto_decrypt = VigenereController::decrypt($texto_cripty, $chave);

        echo "<h1>Cifra de Vigenère</h1>";
        echo "<pre>";
        echo "<b>Texto original</b>: {$texto_claro} <br><br>";
        echo "<b>Texto criptografado:</b> {$texto_cripty}<br><br>";
        echo "<b>Texto descriptografado:</b> {$texto_decrypt}";
        echo "</pre>";
    }

    public static function vernam()
    {
        $key = 'docedegoiaba';

        $text = "docedegoiaba";

        $text_crypt = VernamController::crypt($text, $key);
        $text_decrypt = VernamController::decrypt($text_crypt, $key);

        echo "<h1>Cifra Vernam</h1>";
        echo "<pre>";
        echo "<b>Texto original: </b> {$text} <br>";
        echo "<b>Texto Encriptado: </b> {$text_crypt} <br>";
        echo "<b>Texto Decriptado: </b> {$text_decrypt}";
        echo "</pre>";
    }

}
