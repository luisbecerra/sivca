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
                <form>
                    <div class="form-group">
                        <label>Motivo atención</label>
                        <select class="form-control" name="conformacion" required>
                            <option>Todas</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tipo de ambulancia</label>
                        <select class="form-control" name="conformacion" required>
                            <option>Básica</option>
                            <option>Medicalizada</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Desde</label>
                        <input type="date" class="form-control" name="fecha1" required>
                    </div>

                    <div class="form-group">
                        <label>Hasta</label>
                        <input type="date" class="form-control" name="fecha2" required>
                    </div> 

                    <button type="button" class="btn btn-primary btn-lg btn-block">Consultar</button>
                </form>
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
    <script type="text/javascript">

    </script>
@stop