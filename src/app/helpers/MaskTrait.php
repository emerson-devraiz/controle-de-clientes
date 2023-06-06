<?php

namespace cleanarchitecture\app\helpers;

trait MaskTrait
{
    private function apply(string $string, string $mask)
    {
        $maskared = '';
        $k = 0;

        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($string[$k])) $maskared .= $string[$k++];
            } else {
                if (isset($mask[$i])) {
                    if ($mask[$i] == $string[$k]) {
                        $k++;
                    }
                    $maskared .= $mask[$i];
                }
            }
        }

        return $maskared;
    }

    public function maskCnpj(string $cnpj): string
    {
        return $this->apply($cnpj, '##.###.###/####-##');
    }

    public function maskWhatsapp(string $whatsapp): string
    {
        return $this->apply($whatsapp, '+55 (##) #####-####');
    }

    public function maskMoney(string $value): string
    {
        $valueConverted = '0,00';

        if (empty($value) === false) {
            $valueConverted = number_format($value, 2, ',', '.');
        }

        return $valueConverted;
    }

    public function formatBytes($bytes, $precision = 2)
    {
        $base = log($bytes, 1024);
        $suffixes = array('', 'KB', 'MB', 'GB', 'TB');   
    
        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }
}