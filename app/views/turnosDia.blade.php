<h4>Turnos para el dia {{ $fecha }}</h4>
<div class="list-group turnos-list">
@foreach($turnos as $turno)
    <a href="#" class="list-group-item row info-turno">
    	<div class="btn-group col-lg-9 "> 
	        <h4 class="list-group-item-heading"> Ambulancia No {{ $turno->ambulancia->id }}</h4>
	        <p class="list-group-item-text">Inicio del turno: {{ date("H:i",strtotime($turno->h_inicio)) }}</p>
	        <p class="list-group-item-text">Fin del turno: {{ date("H:i",strtotime($turno->h_fin)) }}</p>
        </div>
        @if( (Auth::user()->role==2 &&  strtotime($turno->created_at) > strtotime(Auth::user()->updated_at)) ||  Auth::user()->role==1)
        <div class="btn-group col-lg-3 accion-turno">
            @if(Auth::user()->role==1)
            <button type="button" data-id="{{ $turno->id }}" class="btn btn-primary glyphicon glyphicon-retweet" title="Agregar novedad"></button>
            @endif
		    <button type="button" data-id="{{ $turno->id }}" class="btn btn-primary glyphicon glyphicon-remove-circle" title="eliminar"></button>
		</div>
        @endif
    </a>
@endforeach
</div>

