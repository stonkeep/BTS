<?php

namespace App;

use Faker\Documentor;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Tecnologia extends Model
{
    use Eloquence;
    
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
        return $this->belongsToMany(PublicosAlvo::class);
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
        return $this->belongsTo(Temas::class, 'tema_id', 'id');
        //return Temas::find($this->tema_id);
    }

    public function temaSecundario()
    {
        return $this->belongsTo(Temas::class, 'temaSecundario_id', 'id');
    }

    public function responsaveis()
    {
        return $this->hasMany(Responsavel::class, 'tecnologia_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function instituicoesParceiras()
    {
        return $this->hasMany(InstituicaoParceira::class);
    }
}
