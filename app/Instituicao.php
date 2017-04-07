<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $guarded = [];


    public function tecnologias()
    {
        $this->hasMany(Tecnologia::class);
    }

}
