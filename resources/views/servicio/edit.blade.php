@extends('layouts.app')

@section('Title','Editar Informacion')
@section('content')



<div class="container" style="padding-top: 100px">
        <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <form action="../../servicio/{{$servicio->slug}}" method="POST" class="form-group" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                    <div class="form-group mb-2">
                      <label for="">Nombre:</label>
                      <input type="text" name="name" id="" class="form-control" placeholder="{{$servicio->name}}" required>
                    </div>

                    <div class="form-group mb-2">
                      <label for="">Precio:</label>
                      <input type="text" name="precio" id="" class="form-control" placeholder="{{$servicio->precio}}" required>
                    </div>

                    <div class="form-group mb-2">
                      <label for="">Fecha de inicio</label>
                      <input type="date" name="fechai" id="" class="form-control" placeholder="{{$servicio->fechai}}" aria-describedby="helpId">
                    </div>

                    <div class="form-group mb-2">
                            <label for="">Fecha de culminacion</label>
                            <input type="date" name="fechac" id="" class="form-control" placeholder="{{$servicio->fechac}}" aria-describedby="helpId">
                          </div>

                    <label for="">Imagen:</label>
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="">Upload</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="imagen" id="" aria-describedby="" required>
                              <label class="custom-file-label" for="">{{$servicio->imagen}}</label>
                            </div>
                          </div>

                     <div class="input-group mb-2">
                         <div class="input-group-prepend">
                             <span class="input-group-text">Descripción</span>
                         </div>
                        <textarea class="form-control" name="descripcion" aria-label="With textarea" required>{{$servicio->descripcion}}</textarea>
                        </div>
                    <input type="submit" value="Actualizar" class="btn btn-dark btn-block">
                    </form>

                </div>
                <div class="col-md-4">


                </div>
            </div>

</div>

@endsection
