@extends('layouts.base')

@section('contenido')

    <div class="row">
    	
        <div class="col-lg-12">
            <h1 class="page-header">Rotación de ambulancias</h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="panel panel-default" role="group" aria-label="...">
            <div class="panel-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevoTurno">Nuevo Turno</button>
            </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>


    <!-- /.row -->
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Control de turnos para ambulancias
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <form hidden>
                        <label for="datepicker">Fecha del turno:</label>
                        <input type="text" id="datepicker" value="{{ date('d-m-Y') }}" readonly/>
                    </form>
                    
                    <div id="contenerdorPicker" class="col-lg-4"></div>
    
                    <div class="col-lg-8 panel panel-default panel-body" id="info-turno">
                        <strong>Selecciona una fecha</strong>
                        <!-- contenido obtenido por ajax -->
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    
    <div class="modal fade" id="nuevoTurno" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Agregar nuevo turno</h4>
            </div><div class="container"></div>
            <div class="modal-body">
                <form method="POST" action="/turno" id="form-turno">
                    <div class="form-group">
                        <label>Fecha del turno</label>
                        <input type="text" class="form-control" name="dia_inicio" value="{{ date('d-m-Y') }}" readonly>
                    </div>

                    <div class="form-group" >
                        <label>Fecha final del turno</label>
                        <input type="text" class="form-control" name="dia_fin" value="{{ date('d-m-Y') }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Hora inicial</label>
                        <select class="form-control" name="h_inicio">
                            <option value="00:00">00:00</option>
                            <option value="01:00">01:00</option>
                            <option value="02:00">02:00</option>
                            <option value="03:00">03:00</option>
                            <option value="04:00">04:00</option>
                            <option value="05:00">05:00</option>
                            <option value="06:00">06:00</option>
                            <option value="07:00">07:00</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="21:00">21:00</option>
                            <option value="22:00">22:00</option>
                            <option value="23:00">23:00</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Hora final</label>
                        <select class="form-control" name="h_fin">
                            <option value="00:00">00:00</option>
                            <option value="01:00">01:00</option>
                            <option value="02:00">02:00</option>
                            <option value="03:00">03:00</option>
                            <option value="04:00">04:00</option>
                            <option value="05:00">05:00</option>
                            <option value="06:00">06:00</option>
                            <option value="07:00">07:00</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="21:00">21:00</option>
                            <option value="22:00">22:00</option>
                            <option value="23:00">23:00</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Ambulancia</label>
                        <select class="form-control" name="ambulancia_id">
                            @foreach($ambulancias as $ambulancia)
                                <option value="{{ $ambulancia->id }}">{{ $ambulancia->marca." ".$ambulancia->placa }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-default" data-dismiss="modal">Cancelar</a>
              <a href="#" class="btn btn-primary" id="btn-turno">Agregar</a>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="agregarNovedad" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Agregar novedad</h4>
            </div><div class="container"></div>
            <div class="modal-body">
                <form method="POST" action="/novedad" id="form-novedad">
                    <div class="form-group" hidden>
                        <label>Turno No</label>
                        <input type="number" class="form-control" name="turno_id"/>
                    </div>
                    <div class="form-group">
                        <label>Novedad del turno</label>
                        <textarea class="form-control" name="descripcion" rows="5" required></textarea>
                    </div>
                    <div id="novedad-actual"></div>
                </form>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-default" data-dismiss="modal">Cancelar</a>
              <a href="#" class="btn btn-primary" id="btn-novedad">Agregar</a>
            </div>
          </div>
        </div>
    </div>

@stop

@section('scripts-extra')
    <script type="text/javascript">

        fecha=new Date();

        var picker = new Pikaday(
        {
            field: document.getElementById('datepicker'),
            firstDay: 1,
            minDate: new Date('2000-01-01'),
            maxDate: new Date('2020-12-31'),
            yearRange: [2000, 2020],
            bound: false,
            container: document.getElementById('contenerdorPicker')
        });


        $('#nuevoTurno').on('show.bs.modal', function (e) {
            $("[name=dia_inicio]").val( $("#datepicker").val() );
            $("[name=dia_fin]").val( $("#datepicker").val() );
        });

        $('[name=h_inicio]').change(evaluarSigDia);
        $('[name=h_fin]').change(evaluarSigDia);

        $("#btn-turno").click(function(event) {
            $("#form-turno").submit();
        });

        $("#form-turno").validate();

        function evaluarSigDia(){
            var $hInicio=$('[name=h_inicio]');
            var $hFin=$('[name=h_fin]');

            if( $hInicio.val() > $hFin.val() )
                $("[name=dia_fin]").val( moment().add(1, 'days').format('DD-MM-YYYY') );
            else
                $("[name=dia_fin]").val( $("[name=dia_inicio]").val() );
        }

        $("#datepicker").change(function(event) {
            cargarTurnos(this.value);
        });

        $("#btn-novedad").click(function(event) {
            $("#form-novedad").submit();
        });

        $("#form-novedad").validate();

        function cargarTurnos(fecha){
            $("#info-turno").load("/turno/info/"+fecha,function(){
                $(".accion-turno .glyphicon-retweet")
                .off('click')
                .on('click',function(event) {
                    $("[name=turno_id]").val( $(event.target).data('id') );
                    //obtiene la novedad del turno
                    $.get('/novedad/descripcion/'+$(event.target).data('id'),
                        function(novedad) {
                            var htmlNovedad = (novedad.length > 0) ? "<p><strong>Novedad actual: </strong>"+novedad+"</p>" : "" ;
                            $("#novedad-actual").html( htmlNovedad );
                            $("#agregarNovedad").modal();
                    });
                });

                $(".accion-turno .glyphicon-remove-circle")
                .off('click')
                .on('click',function(event) {
                    if( confirm("Esta seguro de eliminar este turno") )
                        eliminarTurno( $(this).data('id') );
                });
            });
        }

        function obtenerNovedad(turnoId){
            $.get('/novedad/descripcion/'+$(event.target).data('id'),
                function(novedad) {
                    var htmlNovedad = (novedad.length > 0) ? "<p><strong>Novedad actual: </strong>"+novedad+"</p>" : "" ;
                    $("#novedad-actual").html( htmlNovedad );
                    $("#agregarNovedad").modal();
            });
        }


        function eliminarTurno(id){
            $.post('/turno/eliminar/'+id, function(data) {
                cargarTurnos( $("#datepicker").val() );
            });
        }

    </script>
@stop