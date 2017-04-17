<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $guarded = [];


    public function tecnologia()
    {
        $this->belongsTo(Tecnologia::class);
    }
    
}
