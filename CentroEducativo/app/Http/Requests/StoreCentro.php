<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Gate;

class StoreCentro extends FormRequest
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
        //recupero el lang.
        //importante para mostrar warnings de error en el idioma correspondiente
        $lang = $this->route('lang');
        abort_unless(Gate::allows('check-language', $lang), 403);

        //return ddd($this->getMethod());

        return [
            'nombre' => 'required|string|max:50',
            'cod_asd' => 'required|integer|min:1|max:700',
            'descripcion' => 'nullable|alpha_num',
            'fec_comienzo_actividad' => 'required|date',
            'opcion_radio' => 'required',
            'guarderia' => 'required',
            'categoria' => 'required',
            'ambitos' => 'required',
            'logo' => [
                $this->getMethod() == 'PUT' ? '' : 'required',
                'image',
            ]
        ];

        //     examples
        //     'email' => 'required|email:rfc,dns',
        //     'pw' => 'required|size:8|alpha_num',
        //     'address' => 'required|string|alpha_num|max:155',
        //     'city' => 'required|alpha',
        //     'codigoISO3' => 'required|digits:3|integer',
    }

    //para modificar el mensaje completo de error
    //hay que indicar el mensaje por cada validación
    // public function messages()
    // {
    //     return [
    //         'file.required' => 'Logo obligatorio',
    //     ];
    // }

    //para modificar en los mensaje de error el nombre del campo que se mostrará
    public function attributes()
    {
        return ['file' => 'logo',];
    }
}
