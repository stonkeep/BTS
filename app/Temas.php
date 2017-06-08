<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Temas extends Model
{

    protected $guarded = [];

    public function subTemas()
    {
        return $this->hasMany(SubTemas::class, 'tema_id', 'id');
    }
}
