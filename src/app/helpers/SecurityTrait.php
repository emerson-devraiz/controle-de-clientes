<?php

namespace cleanarchitecture\app\helpers;

trait SecurityTrait
{
    private string $key;
    private string $iv;
    private string $encryptMethod;

    private function setSecurity()
    {
        $this->key = hash('sha256', SECRET_KEY);
        $this->iv  = substr(hash('sha256', SECRET_IV), 0, 16);
        $this->encryptMethod = ENCRYPT_METHOD;
    }

    public function encrypt(string $text): string
    {
        $this->setSecurity();

        $output = openssl_encrypt($text, $this->encryptMethod, $this->key, 0, $this->iv);
        $output = base64_encode($output);

        return $output;
    }

    public function decrypt(string $text): string
    {
        $this->setSecurity();
        
        $output = openssl_decrypt(base64_decode($text), $this->encryptMethod, $this->key, 0, $this->iv);
        return $output;
    }
}