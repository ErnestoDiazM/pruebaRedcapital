@extends('layouts.app') 
@section('content')

<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("/usuarios")}}"><i class="fas fa-users"></i>Usuarios</a></li>

                </ol>

            </nav>

            <div class="card-body">
                @if(session('state_messaje'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('state_messaje')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
                </div>
                @endif


                <a href="{{url("/usuarios/crear ")}}" class="btn btn-primary">
                     <i class="fas fa-plus-circle">&nbsp</i> Crear Usuario
                </a>
                <br>
                <br>
                <br>
               

                <div class="separador"></div>

                <div class="table-responsive">
                    <table id="table-users" class="table table-bordered table-striped table-hover table-striped" style="width: 100%" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <td class="text-center" scope="col">#</td>
                                <td class="text-center" scope="col">Nombre</td>
                                <td class="text-center" scope="col">Email</td>
                                <td class="text-center" scope="col">Privilegio</td>
                                
                                <td class="text-center" scope="col">Opciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?> @foreach($listausuarios as $row)
                            <tr>
                                <td class="text-center">{{$count++}}</td>
                                <td class="text-center">{{$row->nombre}} {{$row->apellido}}</td>
                                <td class="text-center">{{$row->email}}</td>
                                <td class="text-center">{{$row->privilegio}}</td>
                                <td class="text-center">

                                    <a href="{{url("/usuarios/editar/".$row->id)}}"><i class="fas fa-edit">  </i>  </a>
                                    <i>&nbsp</i>
                                    <a href="javascript:;" class="btn-delete" data-id="{{$row->id}}"><i class="fas fa-trash-alt"></i></a>
                                    <i>&nbsp</i>
                                   

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("click", ".btn-delete",function () {
            var id = $(this).data("id");
            var url = url_base + "/usuarios/eliminar/" + id;
                alertify.confirm("Notificaciones", "¿Seguro quieres eliminar este Usuario?",
                    function () {
                        alertify.success('Eliminar Usuario');
                        window.location.href = url;
                    },
                    function () {
                        alertify.error('Operacion Cancelada');
                    });
        });

    });

</script>
<script>
    $(document).ready(function() {
     $('#table-users').DataTable( {
         "language": {
             "lengthMenu": "Mostrar _MENU_ Registros por página",
             "zeroRecords": "No se encontraron registros",
             "info": "Mostrando página(s) _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros disponibles",
             "infoFiltered": "(filtered from _MAX_ total records)",
             "paginate": {
             "first":      "Primero",
             "last":       "Último",
             "next":       "Siguiente",
             "previous":   "Anterior"
              },
              "search": "Buscar:"

         }
     } );
 } );
</script>
</div>
@endsection