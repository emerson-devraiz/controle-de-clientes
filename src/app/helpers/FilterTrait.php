<?php

namespace cleanarchitecture\app\helpers;

trait FilterTrait
{
    public function filterChars(string $string)
    {
        $filter = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
        $filter = trim($filter);
        
        return $filter;
    }

    public function filterEmail(string $email)
    {
        $filter = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $filter;
    }

    public function filterCpf(string $cpf): string
    {
        $filter = str_replace('.', '', $cpf);
        $filter = str_replace('-', '', $filter);

        return $this->filterChars($filter);
    }
    
    public function filterCnpj(string $cnpj): string
    {
        $filter = str_replace('.', '', $cnpj);
        $filter = str_replace('/', '', $filter);
        $filter = str_replace('-', '', $filter);

        return $filter;
    }

    public function filterWhatsapp(string $whatsapp): string
    {
        $filter = str_replace('+', '', $whatsapp);
        $filter = str_replace('(', '', $filter);
        $filter = str_replace(')', '', $filter);
        $filter = str_replace('-', '', $filter);
        $filter = str_replace(' ', '', $filter);

        return $filter;
    }

    public function filterDecimal(string $decimal)
    {
        $decimalConverted = 0.00;

        if (empty($decimal) === false) {
            $decimalConverted = str_replace(",", ".", str_replace(".", "", $decimal));
        }

        return (float) $decimalConverted;
    }
}