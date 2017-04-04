<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temas extends Model
{

    protected $guarded = [];


    public function subTemas()
    {
        return $this->hasMany(SubTemas::class);
    }
}
