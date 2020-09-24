<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Prueba Redcapital') }}</title>

    
       <!-- Fonts -->
       <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
       <link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" rel="stylesheet"/>
    
    
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
       <!-- Styles -->
    
       <link href="{{ asset('new_css/sb-admin-2.min.css') }}" rel="stylesheet">
    
       <!-- DataTables -->
       <link href="{{ asset('new_css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    
       <!-- Favicon -->
       <link href="{{ asset('new_img/logo-blanco.png') }}" rel="icon" type="image/png">
    
        <!-- alertify CSS-->
        
  

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Script para eliminar en las tablas -->
<script type="text/javascript">
    url_base = "<?php echo url(""); ?>";
            window.Laravel = <?php
            echo json_encode([
         'csrfToken' => csrf_token(),
    ]);
    ?>
</script>
</head>
<body>
   
    @if (Auth::check())
    <div id="app">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Redcapital</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{url("/")}}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                
                    <!-- Usuarios -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuarios
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{"/usuarios"}}">Usuarios</a>
                    <a class="dropdown-item" href="{{"/usuarios/crear"}}">Agregar usuarios</a>
                    
                  </div>
                </li>
                    <!-- Documentos -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Documentos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{"/documentos"}}">Documentos</a>
                    <a class="dropdown-item" href="{{"/documentos/crear"}}">Agregar documentos</a>
                    </div>
                  </li>
                
              </ul>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nombre }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            </div>
          </nav>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @else
    <div id="app">
    <main class="py-4">
        @yield('content')
    </main>
    </div>
        
    @endif
    
</body>
</html>
