<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalImplantacao extends Model
{

    protected $guarded = [];

    public function tecnologia()
    {
        $this->belongsTo(Tecnologia::class);
    }
}
