@extends('layouts.app')

@section('Title','Mas Informacion')
@section('content')



<div class="container" style="padding-top: 100px">
    <div class="row">

<div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="card mb-3" style="max-width: 800px;">
            <div class="row no-gutters">
              <div class="col-md-6">
                <img src="../img/{{$servicio->imagen}}" style="height:350px;width:350px;" class="card-img" alt="...">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title">{{$servicio->name}}</h5>
                  <p class="card-text">{{$servicio->descripcion}}</p>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Disponibilidad: {{$servicio->fechai}}</li>
                    <li class="list-group-item">Culminacion: {{$servicio->fechac}} </li>
                    <li class="list-group-item">Precio: {{$servicio->precio}} $</li>
                  </ul>
                  <div class="row text-center">
                    <a href="../servicio/{{$servicio->slug}}/edit" class="btn btn-md btn-info btn-block mb-1" style="color:white;">Editar informacion</a>

                  </div>
                  <div class="row text-center">
                        <form method="POST" target="_self" action="../servicio/{{$servicio->slug}}" style="width:100%"; onsubmit="return pregunta();">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="form-group">

                                <input  type="submit"  class="btn btn-danger btn-md btn-block" value="Eliminar">







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
<script>
        function pregunta(){
            return confirm('¿Estas seguro de que quieres eliminar este registro?');
            }

</script>

@endsection
