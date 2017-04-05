<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insticuicao extends Model
{
    protected $guarded = [];


    public function tecnologias()
    {
        $this->hasMany(Tecnologia::class);
    }

}
