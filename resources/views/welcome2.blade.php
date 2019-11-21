@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid main-img">
        <div class="container-fluid">
          <h1 class="display-4 mt-5">Fluid jumbotron</h1>
          <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
      </div>
</div>



    <div class="row mt-5">
        <div class="col-md-8">
                <h3>Las mejores experiencias, solo en HelpCamp...</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta laudantium explicabo vel illo ullam sed, aliquid excepturi quo ea rerum...</p>
        </div>
        <div class="col-md-4">
                <a class="btn btn-success mb-4" style="position: absolute; top:0; right: 0;" href="./servicio">Ver más servicios</a>
        </div>

    </div>

    <div class="row text-center mt-5">
            <div class="col-md-3">
                    <img src="img/camp6.jpg" class="img img-fuid img-responsive rounded" alt="" style="width: 100%; height: 160px">
                    <h4 class="text-center">Cuyagua</h4>
                    <span>25000$</span><br>
                    <span>27/10/19 - 29/12/19</span>
                </div>
                <div class="col-md-3">
                    <img src="img/camp4.jpg" class="img img-fuid img-responsive rounded" alt="" style="width: 100%; height: 160px">
                    <h4 class="text-center">Mochima</h4>
                    <span>25000$</span><br>
                    <span>27/10/19 - 29/12/19</span>
                </div>
                <div class="col-md-3">
                    <img src="img/slider1.jpg" class="img img-fuid img-responsive rounded" alt="" style="width: 100%; height: 160px">
                    <h4 class="text-center">La tortuga</h4>
                    <span>25000$</span><br>
                    <span>27/10/19 - 29/12/19</span>
                </div>
                <div class="col-md-3">
                    <img src="img/slider2.jpg" class="img img-fuid img-responsive rounded" alt="" style="width: 100%; height: 160px">
                    <h4 class="text-center">La cienaga</h4>
                    <span>25000$</span><br>
                    <span>27/10/19 - 29/12/19</span>
                </div>

    </div>


</div>










@endsection
