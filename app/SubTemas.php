<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTemas extends Model
{

    protected $guarded = [];


    public function tema()
    {
        return $this->belongsTo(Temas::class);
    }
}
