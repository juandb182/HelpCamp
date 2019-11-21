@extends('layouts.app')

@section('Title','Mas Informacion')
@section('content')



<div class="container" style="padding-top: 100px">
    <div class="row">

<div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row no-gutters">
              <div class="col-md-6">
                <img src="../img/{{$servicio->imagen}}" class="card-img" alt="...">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title">{{$servicio->name}}</h5>
                  <p class="card-text">{{ $servicio->descripcion }}</p>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Disponibilidad:  {{$servicio->fechai}}</li>
                    <li class="list-group-item">Culminacion:  {{$servicio->fechac}}</li>
                    <li class="list-group-item">Precio:  {{$servicio->precio}}$</li>
                    <li class="list-group-item"></li>
                  </ul>
                  <div class="row text-center">
                    <form method="GET" target="_self" action="../servicio/{{$servicio->slug}}/pdf" style="width:100%"; onsubmit="return pregunta();">
                        {{ csrf_field() }}
                        @method('GET')



                        <div class="form-group">

                            <input  type="submit"  class="btn btn-success btn-md btn-block" value="Reservar">







                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="col-md-2"></div>





    </div>
</div>

@endsection
