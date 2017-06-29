<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstituicoesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'CNPJ'             => 'required|unique:instituicaos|numeric|cnpj',
            'razaoSocial'      => 'required',
            'naturezaJuridica' => 'required|exists:naturezas_juridicas,id',
            'nomeDaArea'       => 'required',
            'ddd'              => 'required|numeric',
            'telefone'         => 'required',
            'email'            => 'required|email',
            'UF'               => 'required',
            'cidade'           => 'required',
            'endereco'         => 'required',
            'bairro'           => 'required',
            'CEP'              => 'required|numeric',
            'site'             => 'required|url',
            'nomeCompleto'     => 'required',
            'cargo_id'         => 'required|exists:cargos,id',
            'sexo'             => 'required|string|size:1',
            'CPF'              => 'required|numeric|cpf',
        ];
    }
}
