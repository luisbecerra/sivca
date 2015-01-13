@extends('layouts.base')

@section('contenido')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tripulacion</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">

        <!-- /.col-lg-12 -->
        <div class="panel panel-default" role="group" aria-label="...">
            <div class="panel-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarTripulacion">Nuevo tripulante</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarCurso">Agregar curso</button>
            </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de tripulantes  
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Ambulancia</th>  
                                    <th>Cursos</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tripulacion as $tripulante)
                                    <tr>
                                        <td>{{$tripulante->id}}</td>
                                        <td>{{$tripulante->nombre}}</td>
                                        <td>{{$tripulante->cargo}}</td>
                                        <td>{{$tripulante->ambulancia->placa}}</td>
                                        <td>
                                        <ul>
                                            @if($tripulante->cursoTripulacion->count() > 0)
                                                @foreach($tripulante->cursoTripulacion as $curso)
                                                    <li>{{$curso->nombre}} - {{$curso->fecha}}</li>
                                                @endforeach
                                            @else
                                                No posee cursos registrados
                                            @endif
                                        </ul>
                                     </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

	<!-- Modal Tripulacion-->
    <div class="modal fade" id="agregarTripulacion" tabindex="-1" role="dialog" aria-labelledby="modalTripulacionLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalTripulacionLabel">Agregar Tripulacion</h4>
          </div>
          <div class="modal-body">
            <!-- contenido modal -->
            <form role="form" method="POST" action="tripulacion" id="form-tripulacion">
                <div class="form-group">
                    <label>Cedula</label>
                    <input type="number" class="form-control" name="id" minlength="6"  maxlength="10" required>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                 <div class="form-group">
                    <label>Cargo</label>
                    <input type="text" class="form-control" name="cargo" required>
                </div>
                 <div class="form-group">
                    <label>Ambulancia</label>
                    <select name="ambulancia" id="ambulancia" class="form-control">
                     @foreach($ambulancias as $ambulancia)
                       <option value="{{$ambulancia->id}}">{{ $ambulancia->placa }}</option>
                     @endforeach
                    </select>
                </div>                   

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn-nueva-tripulacion">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Curso-->
    <div class="modal fade" id="agregarCurso" tabindex="-1" role="dialog" aria-labelledby="modalCursoLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalCursonLabel">Agregar Curso</h4>
          </div>
          <div class="modal-body">
            <!-- contenido modal -->
            <form role="form" method="POST" action="curso" id="form-curso">
                <div class="form-group">
                    <label>Tripulante</label>
                    <select name="tripulante" id="tripulante" class="form-control">
                     @foreach($tripulacion as $tripulante)
                       <option value="{{$tripulante->id}}">{{ $tripulante->id}} - {{ $tripulante->nombre}}</option>
                     @endforeach
                    </select>
                </div>  
                <div class="form-group">
                    <label>Nombre del curso</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="form-group">
                    <label>Fecha en la que se curso</label>
                    <input type="text" class="form-control" id="fecha-curso" name="fecha" required>
                </div>        

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn-nuevo-curso">Guardar</button>
          </div>
        </div>
      </div>
    </div>


@stop

@section('scripts-extra')
    <script type="text/javascript">

        $("#form-tripulacion").validate();

        $("#btn-nueva-tripulacion").click(function(event) {
            $("#form-tripulacion").submit();
        });

        $("#form-curso").validate();

        $("#btn-nuevo-curso").click(function(event) {
            $("#form-curso").submit();
        });

        
        

        $(document).ready(function(){
            var picker1 = new Pikaday({ field: $('#fecha-curso')[0] });
        })
    </script>

@stop