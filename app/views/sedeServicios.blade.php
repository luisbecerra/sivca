<h3>{{ $ips->nombre }}</h3>
<div class="list-group turnos-list">
@foreach($ips->sedes as $sede)
    <h4>Servicios de la sede: {{ $sede->nombre }}</h4>
    @foreach($sede->servicios as $index => $servicio)
        <a href="#" class="list-group-item row info-sede" id="servicio{{ $index }}">
        	<div class="btn-group col-lg-9"> 
    	        <h4 class="list-group-item-heading">{{ $servicio->nombre }}</h4>
    	        <p class="list-group-item-text">Capacidad: <span>{{ $servicio->pivot->capacidad }}</span> <text>{{ $servicio->pivot->tipo_capacidad }}</text></p>
            </div>
            <div class="btn-group col-lg-3 accion-sede">
              <div data-id="{{ $sede->id }}" data-sid="#servicio{{ $index }}" data-servicio='{{ $servicio->toJson() }}' class="btn btn-primary glyphicon glyphicon-edit editar-servicio"></div>
              <div data-id="{{ $sede->id }}" data-sid="#servicio{{ $index }}" data-servicio='{{ $servicio->toJson() }}' class="btn btn-primary glyphicon glyphicon-remove eliminar-servicio"></div>
    		</div>
        </a>
    @endforeach
    <!-- <a data-toggle="modal" href="#modalServicios" type="button" class="btn btn-primary btn-lg btn-block">Agregar Servicio</a> -->
@endforeach
</div>

