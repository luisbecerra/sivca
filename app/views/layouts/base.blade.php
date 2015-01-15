<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIVCA - Software de inspección, Vigilancia y Control de Ambulancias</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}

    <!-- MetisMenu CSS -->
    {{ HTML::style('/bower_components/metisMenu/dist/metisMenu.min.css') }}

    {{ HTML::style('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}
    
    <!-- DataTables Responsive CSS -->
    {{ HTML::style('/bower_components/datatables-responsive/css/dataTables.responsive.css') }}
    
    <!-- Pikaday CSS -->
    {{ HTML::style('/bower_components/pikaday/css/pikaday.css') }}

    <!-- Custom CSS -->
    {{ HTML::style('/dist/css/sb-admin-2.css') }}
    <!-- Custom Fonts -->

    {{ HTML::style('/bower_components/fontawesome/css/font-awesome.min.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/inicio">SIVCA - Software de inspección, Vigilancia y Control de Ambulancias</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                @if(Auth::user()->role==1)
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        @if(isset($vencidos) && sizeof($vencidos))
                        <span class="badge">{{ sizeof($vencidos) }}</span>
                        @endif
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        @if(isset($vencidos) && sizeof($vencidos))
                            @foreach($vencidos as $vencido)
                            <li>
                                <a href="ambulancias">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> Ambulancia No {{ $vencido->id }} 
                                        @if($vencido->f_venc_soat==date("Y-m-d",strtotime("+10 day")))
                                        <span class="pull-right text-muted small">Vencimiento soat {{ $vencido->f_venc_soat }}</span>
                                        @elseif($vencido->f_venc_seguro==date("Y-m-d",strtotime("+10 day")))
                                        <span class="pull-right text-muted small">Vencimiento seguro {{ $vencido->f_venc_soat }}</span>
                                        @elseif($vencido->f_venc_poliza==date("Y-m-d",strtotime("+10 day")))
                                        <span class="pull-right text-muted small">Vencimiento póliza seguro {{ $vencido->f_venc_soat }}</span>
                                        @endif
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            @endforeach
                        @else
                            <li>
                                <a href="#">
                                    <div>
                                        No hay notificaciones sobre ambulancias
                                    </div>
                                </a>
                            </li>
                        @endif

                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                @endif
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!--
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </li>
                        -->
                        <li>
                            <a class="active" href="/inicio"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        @if(Auth::user()->role==1 || Auth::user()->role==2)
                        <li >
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Inspección y control<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="consultaRUP">Consulta RUP</a>
                                </li>
                                <li>
                                    <a href="poblacion">Población</a>
                                </li>
                                <li>
                                    <a href="poblacionDane">Población DANE</a>
                                </li>
                                
                                @if(Auth::user()->role==2)
                                <li>
                                    <a href="ambulancia">Ambulancias</a>
                                </li>
                                <li>
                                    <a href="tripulacion">Talento humano</a>
                                </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        @if(Auth::user()->role==1)
                        <li >
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> IPS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="ips">Capacidad Instalada</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        <li >
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Control contratos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if(Auth::user()->role==1)
                                <li>
                                    <a href="turno">Efectividad</a>
                                </li>
                                @elseif(Auth::user()->role==2)
                                <li>
                                    <a href="turno">Rotación</a>
                                </li>
                                @endif


                                @if(Auth::user()->role==1 || Auth::user()->role==3)
                                
                                <li>
                                    <a href="atencion">Atenciones</a>
                                </li>
                                    @if(Auth::user()->role==1)
                                    <li>
                                        <a href="#">Consulta PPNA</a>
                                    </li>
                                    <li>
                                        <a href="consultaBDUA">Consulta BDUA</a>
                                    </li>
                                    @endif
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @if(Auth::user()->role==1)
                        <li>
                            <a href="estadisticas"><i class="fa fa-bar-chart-o fa-fw"></i> Estadísticas<span class="fa arrow"></span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        
                        <li>
                            <center>
                                <img style="margin-top:20%" class="img-responsive" src="/img/logo-ibague.png">
                            </center>
                        </li>                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            @if (Session::has('mensaje'))
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Datos guardados
                        </div>
                        <div class="panel-body">
                            <h4 class="text-success">{{  Session::get('mensaje') }}</h4>
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('error'))
                <div class="row">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            ERROR
                        </div>
                        <div class="panel-body">
                            <h4 class="text-danger">{{ Session::get('error') }}</h4>
                        </div>
                    </div>
                </div>
            @endif

            @yield('contenido')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {{ HTML::script('/bower_components/jquery/dist/jquery.min.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}

    <!-- Metis Menu Plugin JavaScript -->
    {{ HTML::script('/bower_components/metisMenu/dist/metisMenu.min.js') }}
    
    <!-- Pikaday JavaScript -->
    {{ HTML::script('/bower_components/pikaday/js/moment.min.js') }}
    {{ HTML::script('/bower_components/pikaday/js/pikaday.js') }}
    
    <!-- Jquery validate JavaScript -->
    {{ HTML::script('/bower_components/jquery.validate/jquery.validate.min.js') }}

    <!-- Custom Theme JavaScript -->
    {{ HTML::script('/dist/js/sb-admin-2.js') }}
    <!--
    <script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    -->
    <script>
    $.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        email: "La direccion de correo ingresada no es valida.",
        date: "Por favor ingrese una fecha valida.",
        number: "Por favor ingresa un valor numerico.",
        maxlength: $.validator.format("Ingresa maximo {0} caracteres."),
        minlength: $.validator.format("Ingresa al menos {0} caracteres."),
        range: $.validator.format("Por favor ingresa un valor entre {0} y {1}."),
        max: $.validator.format("Por favor ingresa un valor menor o igual a {0}."),
        min: $.validator.format("Por favor ingresa un valor mayor o igual a {0}.")
    });


    // moment.js locale configuration
    // locale : spanish (es)
    // author : Julio Napurí : https://github.com/julionc


    var monthsShortDot = 'ene._feb._mar._abr._may._jun._jul._ago._sep._oct._nov._dic.'.split('_');
    var monthsShort = 'ene_feb_mar_abr_may_jun_jul_ago_sep_oct_nov_dic'.split('_');

    moment.defineLocale('es', {
            months : 'enero_febrero_marzo_abril_mayo_junio_julio_agosto_septiembre_octubre_noviembre_diciembre'.split('_'),
            monthsShort : function (m, format) {
                if (/-MMM-/.test(format)) {
                    return monthsShort[m.month()];
                } else {
                    return monthsShortDot[m.month()];
                }
            },
            weekdays : 'domingo_lunes_martes_miércoles_jueves_viernes_sábado'.split('_'),
            weekdaysShort : 'dom._lun._mar._mié._jue._vie._sáb.'.split('_'),
            weekdaysMin : 'Do_Lu_Ma_Mi_Ju_Vi_Sá'.split('_'),
            longDateFormat : {
                LT : 'H:mm',
                LTS : 'LT:ss',
                L : 'DD-MM-YYYY',
                LL : 'D [de] MMMM [de] YYYY',
                LLL : 'D [de] MMMM [de] YYYY LT',
                LLLL : 'dddd, D [de] MMMM [de] YYYY LT'
            },
            calendar : {
                sameDay : function () {
                    return '[hoy a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
                },
                nextDay : function () {
                    return '[mañana a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
                },
                nextWeek : function () {
                    return 'dddd [a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
                },
                lastDay : function () {
                    return '[ayer a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
                },
                lastWeek : function () {
                    return '[el] dddd [pasado a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
                },
                sameElse : 'L'
            },
            relativeTime : {
                future : 'en %s',
                past : 'hace %s',
                s : 'unos segundos',
                m : 'un minuto',
                mm : '%d minutos',
                h : 'una hora',
                hh : '%d horas',
                d : 'un día',
                dd : '%d días',
                M : 'un mes',
                MM : '%d meses',
                y : 'un año',
                yy : '%d años'
            },
            ordinalParse : /\d{1,2}º/,
            ordinal : '%dº',
            week : {
                dow : 1, // Monday is the first day of the week.
                doy : 4  // The week that contains Jan 4th is the first week of the year.
            }
        });

    </script>

    @yield('scripts-extra')

</body>

</html>
