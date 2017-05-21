<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTemas extends Model
{

    protected $guarded = [];


    public function tema()
    {
        return $this->belongsTo(Temas::class, 'tema_id', 'id');
    }

    public function tecnologias()
    {
        return $this->belongsToMany(Tecnologia::class);
    }
}
