<?php

namespace App;

use Faker\Documentor;
use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    protected $guarded = [];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicao_id', 'id');
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

    public function locais()
    {
        return $this->hasMany(LocalImplantacao::class, 'tecnologia_id', 'id');
    }


    public function subtemas()
    {
        return $this->belongsToMany(SubTemas::class);
    }

    public function subtemasPrincipal()
    {
        return $this->subtemas->where('tema_id', strval($this->temaPrincipal()->first()->id));
    }

    public function temaPrincipal()
    {
        return $tema = Temas::where('id', $this->tema_id)->first();
    }

    public function temaSecundario()
    {
        return $tema = Temas::where('id', $this->temaSecundario_id)->first();
    }

    public function responsaveis()
    {
        return $this->hasMany(Responsavel::class);
    }

    public function categoria()
    {
        return $this->hasOne(Categoria::class);
    }

    public function instituicoesParceiras()
    {
        return $this->hasMany(InstituicaoParceira::class);
    }
}
