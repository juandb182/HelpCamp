@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 100px">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <form action="../servicio" method="POST" class="form-group" enctype="multipart/form-data">
                @csrf
            <div class="form-group mb-1">
              <label for="">Nombre:</label>
              <input type="text" name="name" id="" class="form-control" placeholder="Introduzca el nombre del servicio" required>
            </div>

            <div class="form-group mb-1">
              <label for="">Precio:</label>
              <input type="number" name="precio" id="" class="form-control" placeholder="Introduzca el precio del servicio" required>
            </div>

            <div class="form-group mb-1">
              <label for="">Fecha de inicio:</label>
              <input type="date" name="fechai" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group mb-1">
                    <label for="">Fecha de culminacion:</label>
                    <input type="date" name="fechac" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  </div>

            <label for="">Imagen:</label>
            <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="imagen" id="" aria-describedby="" required>
                      <label class="custom-file-label" for="">Cargar una imagen</label>
                    </div>
                  </div>

             <div class="input-group mb-1">
                 <div class="input-group-prepend">
                     <span class="input-group-text">Descripción</span>
                 </div>
                <textarea class="form-control mb-2" name="descripcion" aria-label="With textarea" required></textarea>
                </div>
            <input type="submit" value="Guardar" class="btn btn-dark btn-block">
            <a class="btn btn-success btn-block" href="../servicio">Regresar</a>
            </form>


        </div>
        <div class="col-md-4">


        </div>
    </div>
</div>

<script>
  let fechaInicio = document.getElementById
</script>
@endsection
