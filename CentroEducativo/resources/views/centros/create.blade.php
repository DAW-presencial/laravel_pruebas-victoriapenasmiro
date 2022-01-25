@extends('layouts.base')
@section('title', 'Nuevo Centro')

@section('content')

    <h1 class="mb-5 text-center">@lang('centros.nuevo_centro')</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('centros.store', [$lang]) }}" method="POST">
        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">{{ __('centros.nombre') }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre"
                    placeholder="{{ __('centros.nombre') }}" value="{{ old('email') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="asd" class="col-sm-2 col-form-label">{{ __('centros.asd') }}</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="asd" name="asd" placeholder="{{ __('centros.asd') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label">{{ __('centros.descripcion') }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="descripcion" name="descripcion"
                    placeholder="{{ __('centros.descrip_centro') }}"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha_alta" class="col-sm-2 col-form-label">@lang('centros.fec_alta')</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_alta" name="fecha_alta"
                    placeholder="@lang('centros.fec_alta')">
            </div>
        </div>

        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radios" id="radio1" value="option1">
                        <label class="form-check-label" for="radio1">
                            @lang('centros.primer_radio')
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radios" id="radio2" value="option2" checked>
                        <label class="form-check-label" for="radio2">
                            @lang('centros.segundo_radio')
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="radios" id="radio3" value="option3" disabled>
                        <label class="form-check-label" for="radio3">
                            @lang('centros.tercer_radio')
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-2">@lang('centros.guarderia')</div>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="guarderia" name="guarderia" checked>
                    <label class="form-check-label" for="guarderia">
                        @lang('centros.con_guarderia')
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="categoria">{{ __('centros.categoria') }}</label>
            <select class="form-control" id="categoria" name="categoria">
                <option>1</option>
                <option>2</option>
                <option selected>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ambitos">{{ __('centros.ambitos') }} </label>
            <select multiple class="form-control" id="ambitos" name="ambitos">
                <option>{{ __('centros.infantil') }}</option>
                <option selected>{{ __('centros.primaria') }}</option>
                <option selected>{{ __('centros.eso') }}</option>
                <option>{{ __('centros.bachiller') }}</option>
                <option>{{ __('centros.fp') }}</option>
            </select>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">{{ __('centros.registrar') }}</button>
            </div>
        </div>
    </form>

@endsection
