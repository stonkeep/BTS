<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicosAlvo extends Model
{

    protected $guarded = [];

    public function tecnologias()
    {
        return $this->belongsToMany(Tecnologia::class);
    }
}
