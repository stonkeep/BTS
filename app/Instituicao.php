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

    public function natureza()
    {
        return $this->belongsTo(NaturezasJuridicas::class, 'naturezaJuridica');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargos::class);
    }
}
