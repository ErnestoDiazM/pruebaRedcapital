@extends('layouts.app') 
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("/usuarios ")}}"><i class="fas fa-users"></i> Usuarios</a></li>
                    <li class="breadcrumb-item"><a href="{{url("/usuarios/editar/".$user->id)}}">Editar</a></li>
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


                    <form id="form-user-update" class="form-horizontal" role="form" method="POST" action="{{ url('/usuarios/actualizar') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id-u" value="{{ $user->id }}">
                        <input type="hidden" name="type" value="update">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="cargo" id="departamento" class="col-md-12 control-label text-center">Nombre</label>
                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                    <input type="text" id="nombre" class="form-control" placeholder="Nombre" name="nombre" value="{{ $user->nombre }}" required
                                        autofocus> @if ($errors->has('nombre'))
                                    <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
                </span> @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="cargo" id="departamento" class="col-md-12 control-label text-center">Apellido</label>
                                <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                    <input type="text" id="apellido" class="form-control" placeholder="Apellido" name="apellido" value="{{ $user->apellido }}"
                                        required autofocus> @if ($errors->has('apellido'))
                                    <span class="help-block">
                <strong>{{ $errors->first('apellido') }}</strong>
                </span> @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="cargo" id="departamento" class="col-md-12 control-label text-center">Email</label>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="text" id="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}" required autofocus>                                    @if ($errors->has('email'))
                                    <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
                </span> @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="cargo" id="departamento" class="col-md-12 control-label text-center">Password</label>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required autofocus>                                    @if ($errors->has('password'))
                                    <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
                </span> @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="cargo" id="privilegio" class="col-md-12 control-label text-center">Privilegio</label>

                                <select id="privilegio2" class="form-control" name="privilegio" value="{{old('privilegio')}}" required>

                                    <option value="administrador">Administrador</option>
                                    <option value="usuario">Usuario</option>
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