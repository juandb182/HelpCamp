@extends('layouts.app')

@section('content')

<div style="padding-top: 100px"></div>

@if (Auth::check() && Auth::user()->authorizeRoles('admin'))

<div class="container-fluid">
        <div class="text-center"><a class="btn btn-md btn-info btn-block mb-1" href="../public/verUser" style="color:white;">Lista de usuarios</a>
        </div>


@endif

    <div class="row">




@foreach ($servicio as $service)


<div class="col-md-4 p-5">
<div class="card" style="width: 18rem;">
        <img class="card-img-top" src="img/{{$service->imagen}}" style="height:250px;width:285px;" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$service->name}}</h5>
          <p class="card-text">{{$service->descripcion}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Disponibilidad:  {{$service->fechai}}</li>
          <li class="list-group-item">Culminacion:  {{$service->fechac}}</li>
          <li class="list-group-item">Precio:  {{$service->precio}}$</li>
        </ul>
        <div class="card-body text-center">


          <a href="servicio/{{$service->slug}}" class="btn btn-success">Ver mas</a>
        </div>
      </div>
    </div>




@endforeach
    </div>

</div>

@endsection

