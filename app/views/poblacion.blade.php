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
                                <tr>
                                    <td>Cabecera</td>
                                    <td>113250</td>
                                </tr>
                                <tr>
                                    <td>Rural</td>
                                    <td>20536</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th>133786</th>
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
@stop