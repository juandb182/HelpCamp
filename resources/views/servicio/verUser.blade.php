@extends('layouts.app')

@section('Title','Listado de usuarios')
@section('content')

<div class="container" style="padding-top: 100px">
    <div class="row">
        <a class="btn btn-block btn-dark m-2 text-center" href="../public/servicio">Regresar</a>

            <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Reservaciones </th>
                        <th scope="col">Acciones</th>

                      </tr>
                    </thead>
                    <tbody>
                            @foreach ($user as $usuario)
                      <tr>

                        <th scope="row">{{$usuario->id}}</th>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->created_at}}</td>
                        <?php $pdfs = DB::table('pdfs')->where('user_id', $usuario->id)->get(); ?>
                        <td>
                            @foreach($pdfs as $pdf)
                            <a class="btn btn-info btn-block" href="./servicioPDF/{{$pdf->ruta}}">{{ $pdf->ruta }}</a><br>
                            @endforeach
                        </td>
                        <td>
                            @if($usuario->activo == 1)
                                <a class="btn btn-danger btn-block" href="./toggleActivo/{{$usuario->id}}">Desactivar Usuario</a>
                            @else
                                <a class="btn btn-success btn-block" href="./toggleActivo/{{$usuario->id}}">Activar Usuario</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>

    </div>
</div>


@endsection
