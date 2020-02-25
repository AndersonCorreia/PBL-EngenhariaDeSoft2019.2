<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateInstituicao extends FormRequest
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
            //
            'Responsavel' => 'min: 5|max: 1000',
        ];
    }

    /**
     * Mensagens personalizadas para quando o required não for atendido.
     *
     * @return void
     */
    public function messages()
    {
        return [
            'Responsavel.min' => 'digite o nome completo',
        ];
    }
}
