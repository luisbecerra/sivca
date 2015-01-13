@extends('layouts.base')

@section('contenido')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ambulancias</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">

        <!-- /.col-lg-12 -->
        <div class="panel panel-default" role="group" aria-label="...">
            <div class="panel-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarAmbulancia">Nueva Ambulancia</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarComunicacion">Vincular equipo de comunicación</button>
            </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de ambulancias
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Código Cruet</th>
                                    <th>Tarjeta de propiedad</th>
                                    <th>Tipo de vehículo</th>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                 	<th>Modelo</th>
                                 	<th>Vencimiento seguro</th>
                                 	<th>Vencimiento SOAT</th>
                                 	<th>Num póliza</th>
                                 	<th>Vigencia póliza</th>
                                 	<th>Póliza de responsabilidad civil</th>
                                    <th>Revisión Tecnomecanica</th>
                                    <th>Dirección Reposo</th>
                                    <th>Equipos de telecomunicaciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ambulancias as $ambulancia)
                                    <tr>
                                        <td>{{$ambulancia->id}}</td>
                                        <td>{{$ambulancia->num_tpropiedad}}</td>
                                        <td>{{$ambulancia->tipo}}</td>
                                        <td>{{$ambulancia->placa}}</td>
                                        <td>{{$ambulancia->marca}}</td>
                                        <td>{{$ambulancia->modelo}}</td>
                                        <td>{{$ambulancia->f_venc_seguro}}</td>
                                        <td>{{$ambulancia->f_venc_soat}}</td>
                                        <td>{{$ambulancia->num_poliza}}</td>
                                        <td>{{$ambulancia->f_vig_poliza}}</td>
                                        <td>{{$ambulancia->f_venc_poliza}}</td>
                                        <td>{{$ambulancia->f_rev_tecmecanica}}</td>
                                        <td>{{$ambulancia->dir_ambulancia}}</td>
                                        <td>
                                            <ul>
                                                @if($ambulancia->equipoComunicacion->count() > 0)
                                                    @foreach($ambulancia->equipoComunicacion as $equipo)
                                                       <li> Tipo: {{$equipo->tipo}} <br> Descripción: {{$equipo->descripcion}} <br>Celular: {{$equipo->numero_ce}} </li>
                                                    @endforeach
                                                @else
                                                    No posee equipos registrados
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

	<!-- Modal Ambulancia-->
    <div class="modal fade" id="agregarAmbulancia" tabindex="-1" role="dialog" aria-labelledby="modalAmbulanciaLabel" aria-hidden="true" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalAmbulanciaLabel">Agregar Ambulancia</h4>
          </div>
          <div class="modal-body">
            <!-- contenido modal -->
            <form role="form" method="POST" action="ambulancia" id="form-ambulancia" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Código Cruet</label>
                            <input type="number" class="form-control" name="id" min="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Placa</label>
                            <input type="text" class="form-control" name="placa" maxlength="6" required>
                        </div>                 
                    </div>
                </div>
               
                <div class="form-group">
                    <label>Tarjeta de propiedad</label>
                    <input type="number" class="form-control" name="num_tpropiedad" required>
                </div>
                 <div class="form-group">
                    <label>Tipo vehículo</label>

                    <select name="tipo" id="tipo" class="form-control">
                        <option value="Furgoneta">Furgoneta</option>
                        <option value="NPR">NPR</option>
                        <option value="Vans">Vans</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Marca</label>
                            <input type="text" class="form-control" name="marca" required>
                        </div>           
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Modelo</label>
                            <input type="number" class="form-control" name="modelo" minlength="4" maxlength="10" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha vencimiento seguro</label>
                            <input type="text" class="form-control" id="vencimiento-seguro" name="f_venc_seguro" required>
                        </div>   
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha vencimiento SOAT</label>
                            <input type="text" class="form-control" id="vencimiento-soat"  name="f_venc_soat" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Num Póliza</label>
                            <input type="number" class="form-control" name="num_poliza" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vigencia Póliza</label>
                            <input type="text" class="form-control" id="vigencia-poliza"  name="f_vig_poliza" required>
                        </div>   
                    </div>
                </div>
                <div class="form-group">
                    <label>Póliza de responsabilidad civil</label>
                    <input type="text" class="form-control" id="poliza-responsabilidad"  name="f_venc_poliza" required>
                </div>
                  <div class="form-group">
                    <label>Revisión tecnomecanica</label>
                    <input type="text" class="form-control" id="revision-tecnicomecanica" name="f_rev_tecmecanica" required>
                </div>
                <div class="form-group">
                    <label>Dirección de reposo</label>
                    <input type="text" class="form-control" name="dir_ambulancia">
                </div>
                <div class="img-content">
                    <a data-toggle="modal" href="#" type="button" id="agregar-imagen" class="btn btn-primary btn-lg btn-block">Agregar Imagen</a>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn-nueva-ambulancia">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Equipo comunicacion-->
    <div class="modal fade" id="agregarComunicacion" tabindex="-1" role="dialog" aria-labelledby="modalComunicacionLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalComunicacionLabel">Vincular equipo de comunicación</h4>
          </div>
          <div class="modal-body">
            <!-- contenido modal -->
            <form role="form" method="POST" action="comunicacion" id="form-comunicacion">
                <div class="form-group">
                    <label>Ambulancia</label>
                    <select name="ambulancia" id="ambulancia" class="form-control">
                     @foreach($ambulancias as $ambulancia)
                       <option value="{{$ambulancia->id}}">{{ $ambulancia->placa }}</option>
                     @endforeach
                    </select>
                </div>              
                 <div class="form-group">
                    <label>Tipo de equipo</label>
                    <select name="tipo" id="tipo" class="form-control">

                        <option value="Trunking">Trunking</option>
                        <option value="Celular">Celular</option>
                        <option value="Radio">Radio</option>
                        <option value="VHF">VHF</option>
                        <option value="UHF">UHF</option>
                        <option value="Avantel">Avantel</option>
                    </select>
                </div>
                 <div class="form-group">
                    <label>Celular</label>
                    <input type="number" class="form-control"  name="numero_ce" minlength="7" maxlength="10" required>
                </div>

                  <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="7" class="form-control" required></textarea> 
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn-nueva-comunicacion">Guardar</button>
          </div>
        </div>
      </div>
    </div>

@stop

@section('scripts-extra')
    <script type="text/javascript">

        $("#btn-nueva-ambulancia").click(function(event) {
            $("#form-ambulancia").submit();
        });

        $("#form-ambulancia").validate();

        $("#btn-nueva-comunicacion").click(function(event) {
            $("#form-comunicacion").submit();
        });

         $("#form-comunicacion").validate();

        $('#agregar-imagen').click(function(event){
            console.log("test");

            $(this).before($('<input type="file" name="imagenes[]" class="file" /><br />'));
        });

        
        $(document).ready(function(){
            var picker1 = new Pikaday({ field: $('#revision-tecnicomecanica')[0] });
            var picker2 = new Pikaday({ field: $('#poliza-responsabilidad')[0] });
            var picker3 = new Pikaday({ field: $('#vigencia-poliza')[0] });
            var picker4 = new Pikaday({ field: $('#vencimiento-soat')[0] });
            var picker5 = new Pikaday({ field: $('#vencimiento-seguro')[0] });
        });
    </script>

@stop