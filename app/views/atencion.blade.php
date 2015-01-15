@extends('layouts.base')

@section('contenido')

    <div class="row">
    	
        <div class="col-lg-12">
            <h1 class="page-header">Atención a pacientes</h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="panel panel-default" role="group" aria-label="...">
            <div class="panel-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevaAtencion">Nueva atención</button>
            </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>


    <!-- /.row -->
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registro de atenciones para ambulancias
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Ambulancia</th>
                                    <th>Tipo</th>
                                    <th>Motivo de atención</th>
                                    <th>Tipo solicitud</th>
                                    <th>Fecha solicitud</th>
                                    <th>Fecha atención</th>
                                    <th>Inicio traslado</th>
                                    <th>Fin traslado</th>
                                    <th>Paciente</th>
                                    <th>IPS de traslado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($atenciones as $atencion)
                                    @if( (Auth::user()->role==3 && strtotime($atencion->created_at) > strtotime(Auth::user()->updated_at)) ||  Auth::user()->role==1)
                                    <tr>
                                        <td><span>{{ $atencion->ambulancia->id }}</span> {{ $atencion->ambulancia->marca." ".$atencion->ambulancia->placa }}</td>
                                        <td>{{ $atencion->tipo }}</td>
                                        <td>{{ $atencion->motivo }}</td>
                                        <td>{{ $atencion->tipo }}</td>
                                        <td>{{ date( 'd-m-Y H:i',strtotime($atencion->f_solicitud) ) }}</td>
                                        <td>{{ date( 'd-m-Y H:i',strtotime($atencion->f_atencion) ) }}</td>
                                        <td>{{ date( 'd-m-Y H:i',strtotime($atencion->f_inicio_traslado) ) }}</td>
                                        <td>{{ date( 'd-m-Y H:i',strtotime($atencion->f_fin_traslado) ) }}</td>
                                        @if( !is_null($atencion->paciente->eps) )
                                        <td class="info-paciente" data-paciente='{{ $atencion->paciente->toJson() }}' data-eps='{{ $atencion->paciente->eps->toJson() }}' data-lugar='{{ $atencion->paciente->lugar->toJson() }}'>{{ $atencion->paciente->nombre }}</td>
                                        @else
                                        <td class="info-paciente" data-paciente='{{ $atencion->paciente->toJson() }}' data-eps='{{ $atencion->paciente->eps }}' data-lugar='{{ $atencion->paciente->lugar->toJson() }}'>{{ $atencion->paciente->nombre }}</td>
                                        @endif
                                        <td data-id="{{ $atencion->sede->id }}">{{ $atencion->sede->ips->nombre." - ".$atencion->sede->nombre }}</td>
                                        <td>
                                            <button type="button" data-id="{{ $atencion->id }}" class="btn btn-primary glyphicon glyphicon-edit btn-editar-turno" title="Editar"></button>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach                           
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <center>
                {{ $atenciones->links(); }}
                </center>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- Modal IPS-->
    <div class="modal fade" id="nuevaAtencion" tabindex="-1" role="dialog" aria-labelledby="modalAtencionLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalAtencionLabel">Nueva Atención</h4>
          </div>
          <div class="modal-body">
            <!-- contenido modal -->
            <form role="form" method="POST" action="/atencion" data-action="/atencion" id="form-atencion">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ambulancia</label>
                        <select class="form-control" name="ambulancia_id" id="ambulancia_id" required>
                            @foreach($ambulancias as $ambulancia)
                            <option value="{{ $ambulancia->id }}">{{ $ambulancia->id." ".$ambulancia->marca." ".$ambulancia->placa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo de solicitud</label>
                        <select class="form-control" name="tipo" required>
                            <option>Urgencias</option>
                            <option>Programada</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Motivo de atención</label>
                    <select class="form-control" name="motivo" id="motivo" required>
                        <option>Accidente de trabajo</option>
                        <option>Accidente de transito</option>
                        <option>Accidente rábico</option>
                        <option>Accidente ofídico</option>
                        <option>Otro tipo de accidente</option>
                        <option>Evento catastrófico</option>
                        <option>Lesión por agresión</option>
                        <option>Lesión auto infligida</option>
                        <option>Sospecha de maltrato físico</option>
                        <option>Sospecha de abuso sexual</option>
                        <option>Sospecha de violencia sexual</option>
                        <option>Sospecha de maltrato emocional</option>
                        <option>Enfermedad general</option>
                        <option>Enfermedad profesional</option>
                        <option>Otra</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fecha de solicitud</label>
                        <input type="datetime" class="form-control" name="f_solicitud" id="f_solicitud" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fecha de atención</label>
                        <input type="datetime" class="form-control" name="f_atencion" id="f_atencion" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Inicio de traslado</label>
                        <input type="datetime" class="form-control" name="f_inicio_traslado" id="f_inicio_traslado" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fin de traslado</label>
                        <input type="datetime" class="form-control" name="f_fin_traslado" id="f_fin_traslado" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>IPS de traslado</label>
                    <select class="form-control" name="sede_id" id="sede_id" required>
                        @foreach($ipss as $ips)
                            @foreach($ips->sedes as $sede)                            
                            <option value="{{ $sede->id }}">{{ $ips->nombre." - ".$sede->nombre }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <p><strong>Información del paciente</strong></p>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo de identificación</label>
                        <select class="form-control" name="tipo_id" id="tipo_id" required>
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="TI">Tarjeta de identidad</option>
                            <option value="NUIP">NUIP</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Numero de identificación</label>
                        <input type="number" class="form-control" name="id" id="id" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input type="text" class="form-control" name="f_nacimiento" id="f_nacimiento" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Genero</label>
                        <select class="form-control" name="genero" id="genero" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Régimen</label>
                    <select class="form-control" name="regimen" id="regimen" required>
                        <option>Contributivo</option>
                        <option>Subsidiado</option>
                        <option>Especial</option>
                        <option>Población pobre no asegurada</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>EPS</label>
                    <select class="form-control" name="eps_id" id="eps_id">
                        <option value="no_eps">------</option>
                        @foreach($epss as $eps)
                        <option value="{{ $eps->id }}">{{ $eps->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Barrio/ Vereda</label>
                    <select class="form-control" name="lugar_id" id="barrio" required>
                        @foreach($barrios as $barrio)
                        <option value="{{ $barrio->id }}">{{ $barrio->nombre }}</option>
                        @endforeach

                        @foreach($veredas as $vereda)
                        <option value="{{ $vereda->id }}">{{ $vereda->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Comuna / Corregimiento</label>
                    <select class="form-control"  id="comuna" disabled>
                        @foreach($comunas as $comuna)
                        <option value="{{ $comuna->id }}">{{ $comuna->nombre }}</option>
                        @endforeach

                        @foreach($corregimientos as $corregimiento)
                        <option value="{{ $corregimiento->id }}">{{ $corregimiento->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Ciudad</label>
                    <select class="form-control"  id="ciudad" disabled>
                        @foreach($ciudades as $ciudad)
                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" required>
                </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn-atencion">Guardar</button>
          </div>
        </div>
      </div>
    </div>


@stop

@section('scripts-extra')

    {{ HTML::style('/bower_components/datetimepicker/css/bootstrap-datetimepicker.min.css') }}
    {{ HTML::script('/bower_components/datetimepicker/js/bootstrap-datetimepicker.min.js') }}

    <script type="text/javascript">

        $('#f_solicitud').datetimepicker();
        $('#f_atencion').datetimepicker();
        $('#f_inicio_traslado').datetimepicker();
        $('#f_fin_traslado').datetimepicker();
        $('#f_nacimiento').datetimepicker({ pickTime: false });

        $("#btn-atencion").click(function(event) {
            $("#form-atencion").submit();
        });

        $("#form-atencion").validate();

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


        $(".info-paciente").popover({
            container:'body',
            trigger:'hover',
            placement:'top',
            html:true,
            content: function(){
                return crearInfoPaciente( $(this).data('paciente'), $(this).data('eps'), $(this).data('lugar') )
            }
        });

        $("#comuna").change(function(event) {
            var self=this;
            $.getJSON('lugar/padre/'+self.value,function(lugar){
                $("#ciudad").val(lugar.id);
            });
        });

        $(".btn-editar-turno").click(function(event) {
            $self=$(this);
            $fila=$self.parent().parent();

            $("#ambulancia_id").val( $fila.find('td:nth-child(1) span').text() );
            $("#motivo").val( $fila.find('td:nth-child(3)').text() );
            $("#f_solicitud").val( $fila.find('td:nth-child(5)').text() );
            $("#f_atencion").val( $fila.find('td:nth-child(6)').text() );
            $("#f_inicio_traslado").val( $fila.find('td:nth-child(7)').text() );
            $("#f_fin_traslado").val( $fila.find('td:nth-child(8)').text() );

            var paciente= $( $fila.find('td:nth-child(9)') ).data('paciente');
            var eps= $( $fila.find('td:nth-child(9)') ).data('eps');
            var lugar= $( $fila.find('td:nth-child(9)') ).data('lugar');
                        
            $("#sede_id").val( $fila.find('td:nth-child(10)').data('id') );
            $("#tipo_id").val( paciente.tipo_id );
            $("#id").val( paciente.id );
            $("#nombre").val( paciente.nombre );
            $("#f_nacimiento").val( paciente.f_nacimiento );
            $("#genero").val( paciente.genero );
            $("#regimen").val( paciente.regimen );

            var epsId = ( paciente.eps_id == null ) ? "no_eps": paciente.eps_id;

            $("#eps_id").val( epsId );
            $("#barrio").val( paciente.lugar_id );
            $("#direccion").val( paciente.direccion );
            
            $("#nuevaAtencion").modal("show");

            var $forma = $("#form-atencion");
            $forma.attr('action', $forma.data('action') +"/editar/"+ $self.data('id'));
        });

        function crearInfoPaciente(paciente,eps,lugar){
            var htmlStr="<p><strong>Tipo de id:</strong> "+paciente.tipo_id+"</p>";
            htmlStr+="<p><strong>No de id:</strong> "+paciente.id+"</p>";
            htmlStr+="<p><strong>Nombre: </strong> "+paciente.nombre+"</p>";
            htmlStr+="<p><strong>Edad: </strong> "+ moment(paciente.f_nacimiento,'YYYYMMDD').fromNow().substring(5) +"</p>";
            htmlStr+="<p><strong>Dirección: </strong> "+paciente.direccion+"</p>";
            htmlStr+="<p><strong>Régimen: </strong> "+paciente.regimen+"</p>";
            var nombreEps = ( eps.nombre == null ) ? "NO afiliado": eps.nombre;
            htmlStr+="<p><strong>Eps: </strong> "+nombreEps+"</p>";
            htmlStr+="<p><strong>Lugar: </strong> "+lugar.nombre+"</p>";
            var urbano=(lugar.urbano) ? "Cabecera" : "Rural" ;
            htmlStr+="<p><strong>Territorio: </strong> "+ urbano +"</p>";

            return htmlStr;
        }

    </script>
@stop