<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class LocalImplantacao extends Model
{

    protected $guarded = [];

    public function tecnologia()
    {
        $this->belongsTo(Tecnologia::class);
    }

    public static function valida(Tecnologia $tecnologia, $datas)
    {
        $validator = [];
        $messages = [
            'required' => 'The :attribute field is required.',
            'date_format' => 'O campo :attribute esta com o formato da data inválido',
        ];

        if (is_object($datas)) {
            $validator = Validator::make($datas, [
                'ativo.*'           => 'required',
                'uf.*'              => 'required',
                'cidade.*'          => 'required',
                'bairro.*'          => 'required',
                'dataImplantacao.*' => 'required|date_format:d-m-Y'
            ], $messages);
        }else{
            $validator = Validator::make($datas, [
                'ativo'           => 'required',
                'uf'              => 'required',
                'cidade'          => 'required',
                'bairro'          => 'required',
                'dataImplantacao' => 'required|date_format:d-m-Y'
            ], $messages);
        }

        
        if ($validator->fails()) {
            return $validator->errors();
        };
        //
        //if (!$validator->fails()) {
        //    foreach ( $datas as $data) {
        //        $tecnologia->instituicoesParceiras()->create($data);
        //    }
        //}
    }
}
