@extends('layouts.base')

@section('contenido')

    <div class="row">
    	
        <div class="col-lg-12">
            <h1 class="page-header">Listado de IPS</h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="panel panel-default" role="group" aria-label="...">
            <div class="panel-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevaIps">Nueva IPS</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevaSede">Nueva Sede</button>
            </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>


    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Instituciones prestadoras de salud registradas en el sistema
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Conformación</th>
                                    <th>Carácter territorial</th>
                                    <th>Nivel</th>
                                    <th>Sedes</th>
                                    <th>Servicios</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ipss as $ips)
                                <tr>
                                    <td rowspan="{{ sizeof($ips->sedes) }}">{{ $ips->id }}</td>
                                    <td rowspan="{{ sizeof($ips->sedes) }}">{{ $ips->conformacion }}</td>
                                    <td rowspan="{{ sizeof($ips->sedes) }}">{{ $ips->caracter }}</td>
                                    <td rowspan="{{ sizeof($ips->sedes) }}">{{ $ips->nivel }}</td>
                                    @if(sizeof($ips->sedes))
                                        @foreach($ips->sedes as $sede)
                                            <td>{{ $sede->id }}</td>
                                        @endforeach
                                    @else
                                        <td>No hay sedes registradas</td>
                                    @endif
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

    <!-- Modal IPS-->
    <div class="modal fade" id="nuevaIps" tabindex="-1" role="dialog" aria-labelledby="modalIpsLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalIpsLabel">Nueva IPS</h4>
          </div>
          <div class="modal-body">
            <!-- contenido modal -->
            <form role="form" method="POST" action="/ips" id="form-ips">
                <div class="form-group">
                    <label>Nombre de la IPS</label>
                    <input type="text" class="form-control" name="id" required>
                </div>
                <div class="form-group">
                    <label>Conformación</label>
                    <select class="form-control" name="conformacion" required>
                        <option>No aplica</option>
                        <option>Pública</option>
                        <option>Privada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Carácter territorial</label>
                    <select class="form-control" name="caracter" required>
                        <option>Municipal</option>
                        <option>Departamental</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nivel de atención</label>
                    <select class="form-control" name="nivel" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn-nueva-ips">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Sede -->
    <div class="modal fade" id="nuevaSede" tabindex="-1" role="dialog" aria-labelledby="modalSedeLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalSedeLabel">Nueva sede</h4>
          </div>
          <div class="modal-body">
            <form role="form" method="POST" action="/sede" id="form-sede">
                <div class="form-group">
                    <label>IPS a la que pertenece</label>
                    <select class="form-control" name="ips_id">
                        @foreach($ipss as $ips)
                        <option>{{ $ips->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre de la sede</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label name="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion">
                </div>
                <div class="form-group">
                    <label name="caracter">Teléfono</label>
                    <input type="number" class="form-control" name="telefono">
                </div>
                <div class="form-group">
                    <label>Coordinador</label>
                    <input type="text" class="form-control" name="coordinador">
                </div>
                <p><strong>Servicios</strong></p>
                <div id="servicios">
                    
                </div>
                
                <div class="form-group">    
                    <a data-toggle="modal" href="#modalServicios" type="button" class="btn btn-primary btn-lg btn-block">Agregar Servicio</a>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn-nueva-sede">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="modalServicios" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Agregar nuevo servicio</h4>
            </div><div class="container"></div>
            <div class="modal-body">
                <label>Servicio</label>
                <select id="servicio">
                    @foreach($servicios as $servicio)
                    <option>{{ $servicio->id }}</option>
                    @endforeach
                </select>

                <div class="form-group input-group">
                    <input type="number" class="form-control" min="0" value="0" id="capacidad">
                    <span class="input-group-addon">
                        <select id="tipo-capacidad">
                            <option>Camas</option>
                            <option>Camillas</option>
                            <option>Cunas</option>
                            <option>Salas</option>
                        </select>
                    </span>
                </div>
                
            </div>
            <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn">Cancelar</a>
              <a href="#" class="btn btn-primary" id="btn-servicio">Agregar</a>
            </div>
          </div>
        </div>
    </div>

@stop

@section('scripts-extra')
    <script type="text/javascript">
        $("#btn-nueva-ips").click(function(event) {
            $("#form-ips").submit();
        });

        $("#btn-servicio").click(function(event) {
            var codigo='';
            codigo+='<div class="checkbox">';
            codigo+='<label>';
            codigo+='<input style="display:none" type="checkbox" name="servicio" value="'+$("#servicio").val()+'" checked>'+$("#servicio").val();
            codigo+='</label>';
            codigo+='</div>';
            codigo+='<div class="form-group input-group">';
            codigo+='<input type="number" class="form-control" min="0" value="'+$("#capacidad").val()+'">';
            codigo+='<span class="input-group-addon">';
            codigo+='<input style="display:none" type="checkbox" name="tipo-capacidad" value="'+$("#tipo-capacidad").val()+'" checked>' + $("#tipo-capacidad").val();
            codigo+='</span>';
            codigo+='</div>';
            if($("#capacidad").val()>0 && $("[name=servicio][value='"+$("#servicio").val()+"']").length == 0 ){
                $("#servicios").append(codigo);
                $('#modalServicios').modal('hide');
                $('.modal-backdrop').css('height',parseInt(673 + ($("[name=servicio]").length*200) ) +'px');
                
            }else if( $("#capacidad").val() ==0 ) {
                alert("la capacidad debe ser mayor a cero");
            }else if( $("[name=servicio][value="+$("#servicio").val()+"]").length > 0 ) {
                alert("Este servicio ya fue agregado, por favor ingresa otro");
            }
        });

        $("#btn-nueva-sede").click(function(event) {
            $("#form-sede").submit();
        });
    </script>
@stop