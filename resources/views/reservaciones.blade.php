@extends('layouts.app')

@section('content')
	<div class="container" style="padding-top: 100px">
		<h2 class="text-center">Mis reservaciones</h2>

		<?php $misReservaciones = DB::table('pdfs')->where('user_id',Auth::user()->id)->get(); ?>

        @foreach($misReservaciones as $reservacion)
        <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Aqui estan tus reservaciones!</h4>
                <p class="mb-0">Por favor presentar este documento el dia de alojamiento.</p>
                <br>
                <hr>
                <a class="btn btn-block btn-success" href="../public/ServicioPDF/{{$reservacion->ruta}}" class="text-center">{{ $reservacion->ruta }}</a>
              </div>


		@endforeach
    </div>



@endsection
