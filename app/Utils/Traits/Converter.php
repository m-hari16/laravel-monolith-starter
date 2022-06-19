<?php

namespace App\Utils\Traits;

use App\Models\Notes;
use App\Utils\Traits\Regex;

trait Converter
{
    use Regex;

    /**
     * generate slug.
     *
     * @param  string{name}}
     * @return string
    */
    public function generateSlug($name, $model){
        $exist = true;
        $slug = $this->replaceRegex($name);
        $slug = strtolower($slug);
        $slug = str_replace(" ", "-", $slug);

        $count = 1;

        do{
            if($model == Notes::cekSlug()){
                if(Notes::where('slug', $slug)->get()->count() < 1) {
                    $exist = false;
                    break;
                }     
            }

            $slug .= '_' . $count++;
        }while($exist);
        
        return $slug;
    }

}