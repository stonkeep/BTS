<?php

namespace App;

use App\Http\Controllers\EnderecoEletronicoController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class EnderecoEletronico extends Model
{

    protected $guarded = [];


    public function tecnologias()
    {
        $this->belongsTo(Tecnologia::class);
    }


    public static function validate($datas)
    {
        $validator = [];
        $messages = [
            'required' => 'The :attribute field is required.',
            'exists' => 'A tecnologia não existe'
        ];

        $validator = Validator::make($datas, [
                'link.*' => 'required',
                'tecnologias_id.*' => 'required|exists:tecnologias,id',
            ], $messages);
            
        if ($validator->fails()) {
            return $validator->errors();
        };
        
        return $validator->fails();
    }

}
