<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTecnologia extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO colocar em todos os forms o user_id logado para verificar se tem acesso a request
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'               => 'required|unique:tecnologias,titulo',
            'fimLucrativo'         => 'required|boolean',
            'tempoImplantacao'     => 'required',
            'emAtividade'          => 'required|boolean',
            'inscricaoAnterior'    => 'required|boolean',
            'investimentoFBB'      => 'required|boolean',
            'categoria_id'         => 'required',
            'resumo'               => 'required',
            'tema_id'              => 'required|different:temaSecundario_id|exists:temas,id',
            'temaSecundario_id'    => 'required|different:tema_id|exists:temas,id',
            'problema'             => 'required',
            'objetivoGeral'        => 'required',
            'objetivoEspecifico'   => 'required',
            'descricao'            => 'required',
            'resultadosAlcancados' => 'required',
            'recursosMateriais'    => 'required',
            'recursosHumanos'      => 'required',
            'valorEstimado'        => 'required',
            'valorHumanos'         => 'required',
            'depoimentoLivre'      => 'required',
            'instituicao_id'       => 'required|exists:instituicaos,id',
            'subtema1'             => 'required|exists:sub_temas,id',
            'subtema2'             => 'required|exists:sub_temas,id',
        ];
    }
}
