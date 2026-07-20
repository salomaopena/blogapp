<?php

namespace App\Libraries;

/***
 * Codifica/descodifca IDs para nunca expor inteiros na URL.
 * Usa o Encryption Service nativo do CI4 - base64 URL-safe
 */

class IdCodec
{
    public static function encode(int $id): string
    {
        $encrypter = service('encrypter');
        $cipher = $encrypter->encrypt((string) $id);

        return rtrim(strtr(base64_encode($cipher), '+/', '-_'), '=');
    }


    public static function decode(string $hash): ?int
    {
        try {
            $cipher = base64_decode(strtr($hash, '-_', '+/'));
            $plain = service('encrypter')->decrypt($cipher);
            return ctype_digit($plain) ? (int) $plain : null;

        } catch (\Throwable $th) {
            return null;
        }
    }


}