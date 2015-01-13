@extends('layouts.base')

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Población</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">

        <!-- /.col-lg-12 -->
        <div class="panel panel-default" role="group" aria-label="...">
            <div class="panel-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editarPoblacion">Editar valores</button>
            </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Información de la población en la ciudad de Ibague
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Población</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($poblacion as $p)
                                    <tr>
                                        <td>{{$p->desc_poblacion}}</td>
                                        <td>{{$p->i_total}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>Total</th>
                                    <th>{{ intVal($poblacion[0]->i_total) + intVal($poblacion[1]->i_total)}}</th>
                                </tr>
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

    <!-- Modal Poblacion-->
    <div class="modal fade" id="editarPoblacion" tabindex="-1" role="dialog" aria-labelledby="modalPoblacionLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalPoblacionLabel">Editar Población</h4>
          </div>
          <div class="modal-body">
            <!-- contenido modal -->
            <form role="form" method="POST" action="poblacion" id="form-poblacion">
                <div class="form-group">
                    <label>Población Cabecera</label>
                    <input type="number" class="form-control" name="cabecera" value="{{$poblacion[0]->i_total}}" min="0" required>
                </div>
                <div class="form-group">
                    <label>Población Rural</label>
                    <input type="number" class="form-control" name="rural" value="{{$poblacion[1]->i_total}}" min="0" required>
                </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn-nueva-poblacion">Guardar</button>
          </div>
        </div>
      </div>
    </div>
@stop

@section('scripts-extra')
    <script type="text/javascript">

        $("#form-poblacion").validate();
        
        $("#btn-nueva-poblacion").click(function(event) {
            $("#form-poblacion").submit();
        });

    </script>
@stop