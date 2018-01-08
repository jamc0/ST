<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'RUC'=>'required|max:11',
            'razon_social'=>'required|max:50',
            'direccion'=>'required|max:150',
            'email'=>'max:50',
            'telefono'=>'required|max:14'
        ];
    }
}
