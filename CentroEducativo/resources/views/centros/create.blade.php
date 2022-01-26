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


    <form action="{{ route('centros.store', $lang) }}" method="POST">

        {{-- genero token para poder enviar el formulario. Directoiva obligatoria en Laravel --}}
        @csrf

        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">{{ __('centros.nombre') }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre"
                    placeholder="{{ __('centros.nombre') }}" value="{{ old('nombre') }}">
                @error('nombre')
                    <small class="text-danger">*{{ "$message" }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="asd" class="col-sm-2 col-form-label">{{ __('centros.asd') }}</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="asd" name="asd" value="{{ old('asd') }}"
                    placeholder="{{ __('centros.asd') }}">
                @error('asd')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label">{{ __('centros.descripcion') }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="descripcion" name="descripcion"
                    placeholder="{{ __('centros.descrip_centro') }}">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha_alta" class="col-sm-2 col-form-label">@lang('centros.fec_alta')</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_alta" name="fecha_alta"
                    value="{{ old('fecha_alta') }}" placeholder="@lang('centros.fec_alta')">
                @error('fecha_alta')
                    <small class="text-danger">*{{ $message }}</small>

                @enderror
            </div>
        </div>

        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radios" id="radio1" value="option1"
                            {{ old('radios') == 'option1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="radio1">
                            @lang('centros.primer_radio')
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radios" id="radio2" value="option2"
                            {{ old('radios') == 'option2' ? 'checked' : '' }}>
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
                    @error('radios')
                        <small class="text-danger">*{{ $message }}</small>
                    @enderror
                </div>

            </div>
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-2">@lang('centros.guarderia')</div>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="guarderia" name="guarderia" value="1"
                        {{ old('guarderia') ? 'checked' : '' }}>
                    <label class="form-check-label" for="guarderia">
                        @lang('centros.con_guarderia')
                    </label>
                </div>
                @error('guarderia')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="categoria">{{ __('centros.categoria') }}</label>
            <select class="form-control" id="categoria" name="categoria">

                @for ($i = 0; $i < 6; $i++)
                    @if ($i === 0)
                        <option disabled selected>Por favor, selecciona una opción</option>
                    @else
                        <option value="{{ $i }}" {{ old('categoria') == $i ? 'selected' : '' }}>
                            {{ $i }}</option>
                    @endif
                @endfor

                {{-- <option value="1" {{ old('categoria') == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('categoria') == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('categoria') == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('categoria') == '4' ? 'selected' : '' }}>4</option>
                <option value="5" {{ old('categoria') == '5' ? 'selected' : '' }}>5</option> --}}
            </select>
            @error('categoria')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="ambitos">{{ __('centros.ambitos') }} </label>
            <select multiple class="form-control" id="ambitos" name="ambitos[]">

                @foreach ($ambitos as $ambito)
                    <option value="{{ $ambito->nombre }}" @if (old('ambitos')){{ in_array($ambito->nombre, old('ambitos')) ? 'selected' : '' }}@endif>
                        {{ __('centros.' . $ambito->nombre) }}</option>
                @endforeach

            </select>
            @error('ambitos')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">{{ __('centros.registrar') }}</button>
            </div>
        </div>
    </form>

@endsection
