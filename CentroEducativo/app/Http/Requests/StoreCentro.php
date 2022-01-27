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

        return [
            'nombre' => 'required',
            'cod_asd' => 'required',
            'descripcion' => 'required',
            'fec_comienzo_actividad' => 'required',
            'opcion_radio' => 'required',
            'guarderia' => 'required',
            'categoria' => 'required',
            'ambitos' => 'required',
        ];
    }
}
