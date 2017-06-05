<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $guarded = [];


    public function tecnologias()
    {
       return $this->hasMany(Tecnologia::class);
    }

    public function natureza()
    {
        return $this->belongsTo(NaturezasJuridicas::class, 'naturezaJuridica');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargos::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
