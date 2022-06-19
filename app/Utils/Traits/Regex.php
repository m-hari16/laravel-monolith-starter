<?php

namespace App\Utils\Traits;

trait  Regex
{
    public function replaceRegex($data){
        $data = preg_replace( "/\r|\n|\t/", "", $data);
        $data = str_replace(',', '', $data);
        $data = str_replace('.', '', $data);
        
        return $data;
    }
}