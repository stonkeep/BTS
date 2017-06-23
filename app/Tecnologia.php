<?php

namespace App;

use Faker\Documentor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Nicolaslopezj\Searchable\SearchableTrait;
use Sofa\Eloquence\Eloquence;

class Tecnologia extends Model
{
    use Eloquence;
    //use SearchableTrait;

    //protected $searchable = [
    //    /**
    //     * Columns and their priority in search results.
    //     * Columns with higher values are more important.
    //     * Columns with equal values have equal importance.
    //     *
    //     * @var array
    //     */
    //    'columns' => [
    //            'tecnologias.titulo' => 10,
    //            'tecnologias.resumo'  => 5,
    //            'tecnologias.problema'  => 5,
    //            'tecnologias.objetivoGeral'  => 5,
    //            'tecnologias.objetivoEspecifico'  => 5,
    //            'tecnologias.descricao'  => 5,
    //            'tecnologias.resultadosAlcancados'  => 5,
    //            'tecnologias.recursosMateriais'  => 5,
    //            'tecnologias.recursosHumanos'  => 5,
    //            'tecnologias.valorEstimado'  => 5,
    //            'tecnologias.valorHumanos'  => 5,
    //            'tecnologias.depoimentoLivre'  => 5,
    //            //'temaPrincipal.nome'  => 5,
    //            ////'temaSecundario.nome',
    //            //'subtemas.descricao',
    //            //'instituicao.razaoSocial',
    //            //'instituicao.nomeDaArea',
    //            //'instituicao.cidade',
    //            //'publicos.descricao',
    //            //'locais.uf',
    //            //'locais.cidade',
    //            //'locais.bairro',
    //            //'responsaveis.nome',
    //            //'categoria.descricao',
    //            //'instituicoesParceiras.nome',
    //            //'instituicoesParceiras.atuacao',
    //    ],
    //    'joins' => [
    //        //'subtemas' => ['users.id','posts.user_id'],
    //    ],
    //];



    protected $searchableColumns = [
        'titulo' => 10,
        'resumo' => 9,
        'problema' => 9,
        'objetivoGeral' => 9,
        'objetivoEspecifico' => 9,
        'descricao'  => 9,
        'resultadosAlcancados'  => 2,
        'recursosMateriais'  => 2,
        'recursosHumanos'  => 2,
        'valorEstimado'  => 2,
        'valorHumanos'  => 2,
        'depoimentoLivre'  => 2,
        'temaPrincipal.nome'  => 8,
        //'temaSecundario.nome',
        'subtemas.descricao' =>9,
        'instituicao.razaoSocial' => 5,
        'instituicao.nomeDaArea',
        'instituicao.cidade' => 2,
        'publicos.descricao' => 7,
        'locais.cidade' => 7,
        'responsaveis.nome' => 2,
        'categoria.descricao' => 8,
        'instituicoesParceiras.nome' => 5,
        'instituicoesParceiras.atuacao' => 1,
    ];


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

    public function imagens()
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

    public function temaPrincipal()
    {
        return $this->belongsTo(Temas::class, 'tema_id', 'id');
        //return Temas::find($this->tema_id);
    }

    public function temaSecundario()
    {
        return $this->belongsTo(Temas::class, 'temaSecundario_id', 'id');
    }

    public function subtemasPrincipal()
    {
        $subtemasId = [];
        $subtemas = $this->subtemas->where('tema_id', $this->temaPrincipal->id);
        foreach ($subtemas as $item) {
            $subtemasId[] = $item->id;
        }
        return SubTemas::find($subtemasId);
    }

    public function subtemasSecundario()
    {
        $subtemasId = [];
        $subtemas = $this->subtemas->where('tema_id', $this->temaSecundario->id);
        foreach ($subtemas as $subtema) {
            $subtemasId[] = $subtema->id;
        }
        return SubTemas::find($subtemasId);
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
