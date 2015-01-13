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
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Coordinador</th>
                                    <th>Servicios</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ipss as $key=> $ips)
                                <tr>
                                    <td rowspan="{{ $ips->sedes()->count() }}">{{ $ips->nombre }}</td>
                                    <td rowspan="{{ $ips->sedes()->count() }}">{{ $ips->conformacion }}</td>
                                    <td rowspan="{{ $ips->sedes()->count() }}">{{ $ips->caracter }}</td>
                                    <td rowspan="{{ $ips->sedes()->count() }}">{{ $ips->nivel }}</td>                                    
                                    @if($ips->sedes)

                                        @foreach($ips->sedes as $index => $sede)
                                            @if($index > 0)
                                                <tr>
                                            @endif
                                            <td>{{ $sede->nombre }}</td>
                                            <td>{{ $sede->direccion }}</td>
                                            <td>{{ $sede->telefono }}</td>
                                            <td>{{ $sede->coordinador }}</td>
                                            <td><button type="button" class="btn btn-primary btn-info-sede" data-id="{{ $sede->id }}">Ver servicios</button></td>  
                                        @endforeach
                                    @else
                                        <td colspan="4">No hay sedes registradas</td>
                                        <td >&nbsp;</td>
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
    <div class="modal fade" id="nuevaIps" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalIpsLabel" aria-hidden="true">
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
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="form-group">
                    <label>Conformación</label>
                    <select class="form-control" name="conformacion" required>
                        <option>Pública</option>
                        <option>Privada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Carácter territorial</label>
                    <select class="form-control" name="caracter" required>
                        <option>No aplica</option>
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
    <div class="modal fade" id="nuevaSede" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalSedeLabel" aria-hidden="true">
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
                    <select class="form-control" name="ips_id" required>
                        @foreach($ipss as $ips)
                        <option value="{{ $ips->id }}">{{ $ips->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre de la sede</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>

                <div class="form-group">
                    <label>Barrio</label>
                    <select class="form-control" name="lugar_id" id="barrio" required>
                        @foreach($barrios as $barrio)
                        <option value="{{ $barrio->id }}">{{ $barrio->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Comuna</label>
                    <select class="form-control" name="lugar_id" id="comuna" disabled>
                        @foreach($comunas as $comuna)
                        <option value="{{ $comuna->id }}">{{ $comuna->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Ciudad</label>
                    <select class="form-control" name="lugar_id" id="ciudad" disabled>
                        @foreach($ciudades as $ciudad)
                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label name="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" required>
                </div>
                <div class="form-group">
                    <label name="caracter">Teléfono</label>
                    <input type="number" class="form-control" min="10000" name="telefono" required>
                </div>
                <div class="form-group">
                    <label>Coordinador</label>
                    <input type="text" class="form-control" name="coordinador" required>
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

    <div class="modal fade" id="modalInfoSedes" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="InfoSedesLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="InfoSedesLabel">Nueva sede</h4>
          </div>
          <div class="modal-body">
            
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Servicios disponibles para agregar o editar -->
    <div class="modal" id="modalServicios" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Servicios IPS</h4>
            </div><div class="container"></div>
            <div class="modal-body">
                <form id="form-servicio">

                    <div class="form-group">
                        <label>Servicio</label>
                        <select id="servicio" name="servicio">
                            @foreach($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group input-group">
                        <input type="number" class="form-control" min="0" value="0" id="capacidad" name="capacidad">
                        <span class="input-group-addon">
                            <select id="tipo-capacidad" name="tipo-capacidad">
                                <option>Camas</option>
                                <option>Camillas</option>
                                <option>Cunas</option>
                                <option>Salas</option>
                            </select>
                        </span>
                    </div>
                </form>
                
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-default" id="btn-servicio-cancelar" data-dismiss="modal">Cancelar</a>
              <a href="#" class="btn btn-primary" id="btn-servicio">Aceptar</a>
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

        $("#form-ips").validate();

        $("#btn-servicio").click(function(event) {
            var $modalServicios=$("#modalServicios");
            if( typeof($modalServicios.attr('data-editar')) !== "undefined"){
                editarServicio($modalServicios);
            }else
                agregarServicio();
        });

        $("#btn-nueva-sede").click(function(event) {
            $("#form-sede").submit();
        });

        $("#form-sede").validate();

        $("#barrio").change(function(event) {
            var self=this;
            $.getJSON('lugar/padre/'+self.value,function(lugar){
                $("#comuna").val(lugar.id);
            });
        });

        $("#comuna").change(function(event) {
            var self=this;
            $.getJSON('lugar/padre/'+self.value,function(lugar){
                $("#ciudad").val(lugar.id);
            });
        });

        $(".btn-info-sede").click(function(event) {
            var idIps = $(this).data('id');
            $contenedor=$('#modalInfoSedes .modal-body');
            $contenedor.html('<b>Cargando servicios<b>');
            $('#modalInfoSedes').modal('show');
            $contenedor.load('/ips/info-sedes/'+idIps,function(data){
                $contenedor.html(data);

                $(".editar-servicio").off('click').on('click',function(event) {
                    console.log($(event.target).data('sid'));
                    $('#modalServicios')
                            .modal('show')
                            .attr('data-editar', $(event.target).data('id') )
                            .attr('data-sid', $(event.target).data('sid') );

                    var servicio=$(event.target).data('servicio');
                    $("#servicio").val( servicio.id ).parent().hide();
                    $("#capacidad").val( parseInt(servicio.pivot.capacidad) );
                    $("#tipo_capacidad").val( servicio.pivot.tipo_capacidad );
                });

                $(".eliminar-servicio").off('click').on('click',function(event) {
                    $this=$(this);
                    var servicio=$this.data('servicio');
                    //sedeId,servicioId,tipoCapacidad,liItem
                    eliminarServicio( $this.data('id'),servicio.id,servicio.pivot.tipo_capacidad,$this.data('sid') );
                });
            });
        });

        $('#exampleModal').on('show.bs.modal', function (event) {
            $("#modalServicios").removeAttr('data-editar');
            $("#servicio").val( servicio.id ).parent().show();
        });

        function agregarServicio () {
            var codigo='';
            codigo+='<div class="checkbox">';
            codigo+='<label>';
            codigo+='<input style="display:none" type="checkbox" name="servicio[]" value="'+$("#servicio").val()+'" checked>'+$("#servicio option:selected").text();
            codigo+='</label>';
            codigo+='</div>';
            codigo+='<div class="form-group input-group">';
            codigo+='<input type="number" class="form-control" min="0" name="capacidad[]" value="'+$("#capacidad").val()+'">';
            codigo+='<span class="input-group-addon">';
            codigo+='<input style="display:none" type="checkbox" name="tipo-capacidad[]" value="'+$("#tipo-capacidad").val()+'" checked>' + $("#tipo-capacidad").val();
            codigo+='</span>';
            codigo+='</div>';
            if($("#capacidad").val()>0 && $("[name='servicio[]'][value='"+$("#servicio").val()+"']").length == 0 ){
                $("#servicios").append(codigo);
                $('#modalServicios').modal('hide');
            
                setTimeout(function(){
                    $('body').addClass('modal-open');
                    $('.modal-backdrop').css('height',parseInt( $(window).height() + ($("[name='servicio[]']").length*100) ) +'px');
                },100);
            
                
            }else if( $("#capacidad").val() ==0 ) {
                alert("la capacidad debe ser mayor a cero");
            }else if( $("[name='servicio[]'][value="+$("#servicio").val()+"]").length > 0 ) {
                alert("Este servicio ya fue agregado, por favor ingresa otro");
            }
        }

        function editarServicio ($modalServicios) {
            var sedeId=$modalServicios.attr('data-editar');
            var servicioId=$modalServicios.attr('data-sid');
            $modalServicios.modal('hide');
            $.post(
                '/sede/servicio/'+sedeId +'/'+$("#servicio").val(),
                $("#form-servicio").serialize(),
                function (data) {
                    if(data==1){
                        $(servicioId).find('span').text( $("#capacidad").val() );
                        $(servicioId).find('text').text( $("#tipo-capacidad").val() );
                    }else{
                        alert("Error al editar este servicio");
                    }
                    
                }
            );
        }

        function eliminarServicio (sedeId,servicioId,tipoCapacidad,liItem) {
            $.post(
                '/sede/eliminar-servicio/'+sedeId +'/'+ servicioId +'/'+ tipoCapacidad,
                function (data) {
                    if(data==1)
                        $(liItem).remove();
                    else
                        alert("Error al eliminar este servicio");
                }
            );
        }

    </script>
@stop