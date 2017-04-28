<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class InstituicaoParceira extends Model
{

    protected $guarded = [];

    public static function grava(Tecnologia $tecnologia, $datas)
    {
        $validator = [];
        $messages = [
            'required' => 'The :attribute field is required.',
        ];

        if (is_array($datas)) {
            $validator = Validator::make($datas, [
                'nome.*' => 'required',
            ], $messages);
        }else{
            $validator = Validator::make($datas, [
                'nome' => 'required',
            ], $messages);
        }
            
     

        if ($validator->fails()) {
            return $validator->errors();
        };

        if (!$validator->fails()) {
            foreach ( $datas as $data) {
                $tecnologia->instituicoesParceiras()->create($data);
            }
        }
    }


    public function tecnologia()
    {
       return $this->belongsTo(Tecnologia::class);
    }
}
