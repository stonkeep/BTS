<?php

namespace App;

use Faker\Documentor;
use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    protected $guarded = [];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicaos_id', 'id');
    }

    public function enderecosEletronico()
    {
        return $this->hasMany(EnderecoEletronico::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function Imagens()
    {
        return $this->hasMany(Imagem::class);
    }

    public function publicos()
    {
        return $this->hasMany(PublicoAtendido::class);
    }

    public function locaisDatas()
    {
        return $this->hasMany(LocalImplantacao::class);
    }

    public function temaPrincipal()
    {
        return $this->hasOne(Temas::class);
    }

    public function temaSecundario($temaSecundario_id)
    {
        return Temas::find('id', $temaSecundario_id);
    }

    public function responsaveis()
    {
        return $this->hasMany(Responsavel::class);
    }

    public function categoria()
    {
        return $this->hasOne(Categoria::class);
    }
}
