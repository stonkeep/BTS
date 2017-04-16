<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $guarded = [];

    public function tecnologias()
    {
        $this->hasMany(Tecnologia::class);
    }
}
