<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';
    protected $fillable = [
        'title', 'slug', 'body'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function cekSlug(): String
    {
        return "notes";
    }
}
