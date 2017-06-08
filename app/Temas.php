<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Temas extends Model
{

    protected $guarded = [];
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'temas.nome' => 10,
            'sub_temas.descricao' => 2,
        ],
        'joins' => [
            'sub_temas' => ['temas.id','sub_temas.tema_id'],
        ],
    ];



    public function subTemas()
    {
        return $this->hasMany(SubTemas::class, 'tema_id', 'id');
    }
}
