@extends('layouts.base')

@section('contenido')

    <div class="row">
    	
        <div class="col-lg-12">
            <h1 class="page-header">Estadísticas</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <!-- /.row -->
    <div class="row">
        <ul class="nav nav-tabs nav-justified" data-tabs="tabs">
            <li class="active"><a href="#atenciones" data-toggle="tab">Atenciones</a></li>
            <li><a href="#rotEft" data-toggle="tab">Rotación / efectividad</a></li>
            <li><a href="#ambulancias" data-toggle="tab">Ambulancias</a></li>
        </ul>

        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="atenciones">
                <form method="POST" action="estadisticas">
                    <div class="form-group">
                        <label>Motivo atención</label>
                        <select class="form-control" name="motivo" required>
                            <option>Todas</option>
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

                    <div class="form-group">
                        <label>Tipo de atención</label>
                        <select class="form-control" name="t_atencion" required>
                            <option>Todas</option>
                            <option>Urgencias</option>
                            <option>Programada</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Desde</label>
                        <input type="text" class="form-control" name="fecha1"  id="fecha1" required>
                    </div>

                    <div class="form-group">
                        <label>Hasta</label>
                        <input type="text" class="form-control" name="fecha2"  id="fecha2" required>
                    </div> 

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Consultar</button>
                </form>

                @if(isset($datos))
                <br>
                <br>
                <br>
                <br>
                <div class="col-lg-12" id="mapa-imagen">
                    <img src="/img/comunas_ibague.png" style="position: absolute" width="800">
                    @if(isset($datos["Comuna 1"]))
                    <div id="comuna1" data-chart='{{ json_encode($datos["Comuna 1"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna1" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 2"]))
                    <div id="comuna2" data-chart='{{ json_encode($datos["Comuna 2"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna2" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 3"]))
                    <div id="comuna3" data-chart='{{ json_encode($datos["Comuna 3"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna3" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 4"]))
                    <div id="comuna4" data-chart='{{ json_encode($datos["Comuna 4"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna4" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 5"]))
                    <div id="comuna5" data-chart='{{ json_encode($datos["Comuna 5"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna5" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 6"]))
                    <div id="comuna6" data-chart='{{ json_encode($datos["Comuna 6"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna6" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 7"]))
                    <div id="comuna7" data-chart='{{ json_encode($datos["Comuna 7"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna7" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 8"]))
                    <div id="comuna8" data-chart='{{ json_encode($datos["Comuna 8"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna8" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 9"]))
                    <div id="comuna9" data-chart='{{ json_encode($datos["Comuna 9"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna9" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 9"]))
                    <div id="comuna9_2" data-chart='{{ json_encode($datos["Comuna 9"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna9_2" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 10"]))
                    <div id="comuna10" data-chart='{{ json_encode($datos["Comuna 10"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna10" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 11"]))
                    <div id="comuna11" data-chart='{{ json_encode($datos["Comuna 11"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna11" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 12"]))
                    <div id="comuna12" data-chart='{{ json_encode($datos["Comuna 12"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna12" data-chart="false" class="comuna"></div>
                    @endif

                    @if(isset($datos["Comuna 13"]))
                    <div id="comuna13" data-chart='{{ json_encode($datos["Comuna 13"]) }}' class="comuna"></div>
                    @else
                    <div id="comuna13" data-chart="false" class="comuna"></div>
                    @endif

                </div>
                    <ul id='est-veredas' class="list-group">
                        @foreach($datos as $dato)
                            @if($dato[0]==6)
                                @for($i=1; $i< sizeof($dato);$i++)
                                <li class="list-group-item"><b>Vereda {{ $dato[$i]['nombre'] }}:</b> {{ $dato[$i]['atendidos'] }} paciente(s)</li>
                                @endfor
                            @endif
                        @endforeach
                    </ul>


                @endif
            </div>

            <div class="tab-pane" id="rotEft">
                Hola 2
            </div>

            <div class="tab-pane" id="ambulancias">
                Hola 3
            </div>
        </div>

    </div>
    <!-- /.row -->
@stop

@section('scripts-extra')
    {{ HTML::style('/bower_components/datetimepicker/css/bootstrap-datetimepicker.min.css') }}
    {{ HTML::script('/bower_components/datetimepicker/js/bootstrap-datetimepicker.min.js') }}

    <script type="text/javascript">

        $('#fecha1').datetimepicker({ pickTime: false });
        $('#fecha2').datetimepicker({ pickTime: false });

        $(".comuna").popover({
            container:'body',
            trigger:'hover',
            placement:'top',
            html:true,
            content: function(){
                return crearPopoverMapa( $(this).data('chart') )
            }
        });

        function crearPopoverMapa (data) {
            if(data==false)
                return "No se registran pacientes atendidos en esta comuna";
            else{
                console.log(data);
                var htmlppvr="<b>Pacientes atendidos:</b>";
                for (var i = data.length - 1; i > 0; i--) {
                    htmlppvr+="<p><b>"+data[i].nombre+":</b>  "+data[i].atendidos+" paciente(s)</p>";
                };
                
                return htmlppvr;
            }
        }
    </script>
@stop