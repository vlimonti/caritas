<?php

namespace App\Services;

class AddressService
{
    public function apiPostal(string $postal)
    {
        $url = 'viacep.com.br/ws/'.$postal.'/json/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        return json_decode($output);
    }
}