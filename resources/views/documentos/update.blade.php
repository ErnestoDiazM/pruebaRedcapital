@extends('layouts.app') 
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("/documentos")}}"><i class="fas fa-users"></i> Documentos</a></li>
                    <li class="breadcrumb-item"><a href="{{url("/documentos/editar/".$data->id)}}">Editar</a></li>
                </ol>
            </nav>

            <div class="card-body">
                @if(session('state_messaje'))
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('state_messaje')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
                    </div>
                    @endif



                    <div class="separador"></div>


                    <form id="form-user-update" class="form-horizontal" role="form" method="POST" action="{{ url('/documentos/actualizar') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id-u" value="{{ $data->id }}">
                        <input type="hidden" name="type" value="update">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="cargo" id="departamento" class="col-md-12 control-label text-center">Nombre</label>
                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                    <input type="text" id="nombre" class="form-control" placeholder="Nombre" name="nombre" value="{{ $data->nombre }}" required
                                        autofocus> @if ($errors->has('nombre'))
                                    <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
                </span> @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="cargo" id="tipo" class="col-md-12 control-label text-center">Tipo</label>
    
                                <select id="tipo2" class="form-control" name="tipo" value="{{old('tipo')}}" required>
    
                                        
                                                    <option value="PDF">PDF</option>
                                                    <option value="JPG">JPG</option>
                                                    <option value="WORD">WORD</option>
                                                    <option value="EXCEL">EXCEL</option>
                                    </select>
                            </div>

                            <div class="col-md-4">
                                <label for="cargo" id="usuario" class="col-md-12 control-label text-center">Usuario Asignado</label>

                                <select id="usuario2" class="form-control" name="usuario" value="{{old('usuario')}}" value="{{ $data->username. " ". $data->apellido }}" required>

                                    @foreach ($usuario as $u)
                                                <option value="{{$u->id}}"> {{ $u->nombre. " " . $u->apellido}}</option>
                                    @endforeach
                                </select>

                            </div>
                           

                        </div>

                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary col-md-12">
                                Actualizar
                            </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    
@endsection