<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCentro;
use App\Models\Ambito;
use App\Models\Centro;
use App\Models\Centro_Ambito;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $can_modify = new Centro;

        $centros = Centro::all();

        return view('centros.index', compact('lang', 'centros', 'can_modify'));
        //return redirect()->route('centros.create', compact('lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        $can_create = new Centro;
        $ambitos = Ambito::all();

        $this->authorize('check-language', $lang);
        $this->authorize('create', $can_create, 403);

        return view('centros.create', compact('lang', 'ambitos', 'can_create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCentro $request, $lang)
    {
        $can_create = new Centro;
        $this->authorize('create', $can_create, 403);

        $centro = Centro::create($request->all());

        //completo la tabla centros_ambitos
        $centro->ambitos()->attach($request->input('ambitos'));

        //almaceno en una sesión un mensaje de éxito para mostrar en alert
        return redirect()->to(RouteServiceProvider::HOME)->with('exito', 'Centro registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, Centro $centro)
    {
        $can_modify = new Centro;
        $this->authorize('check-language', $lang);

        //recupero el listado de ambitos de este centro
        $ambitos_id = $centro->ambitos()->allRelatedIds()->toArray();

        $listado_ambitos = [];

        foreach ($ambitos_id as $ambito) {
            array_push($listado_ambitos, Ambito::find($ambito)->nombre);
        }

        return view('centros.show', compact('lang', 'centro', 'listado_ambitos', 'can_modify'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, Centro $centro)
    {
        $ambitos = Ambito::all();
        $can_edit = new Centro;
        $this->authorize('update', $can_edit, 403);
        
        //recupero el listado de ambitos de este centro
        $ambitos_id = $centro->ambitos()->allRelatedIds()->toArray();

        $this->authorize('check-language', $lang);

        return view('centros.edit', compact('lang', 'centro', 'ambitos', 'ambitos_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCentro $request, $lang, Centro $centro)
    {
        $can_edit = new Centro;
        $this->authorize('update', $can_edit, 403);

        //actualización por asignación masiva
        $centro->update($request->all());

        //actualizo la tabla intermedia centros_ambitos
        $centro->ambitos()->sync($request->input('ambitos'));

        return redirect()->route('centros.show', compact('lang', 'centro'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, Centro $centro)
    {
        $can_delete = new Centro;
        $this->authorize('delete', $can_delete, 403);

        $centro->delete();

        // Elimino la relación del centro con ambitos dentro de centros_ambitos
        $centro->ambitos()->detach();

        //almaceno en una sesión un mensaje de éxito para mostrar en alert
        return redirect()->route('centros.index', compact('lang'))->with('eliminado', 'Centro eliminado correctamente');
    }
}
