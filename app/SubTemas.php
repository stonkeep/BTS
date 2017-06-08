<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class SubTemas extends Model
{
    use Eloquence;

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
