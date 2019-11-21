<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <center><h1>HelpCamp S.A.</h1></center>
        <br>
        <br>
            <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha de creacion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$ser->created_at}}</td>
                      </tr>
                    </tbody>
                  </table>

                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Servicio</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Inicio de Reservacion</th>
                        <th scope="col">Culminacion</th>
                        <th scope="col">Precio</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$ser->name}}</td>
                        <td>{{$ser->slug}}</td>
                        <td>{{$ser->fechai}}</td>
                        <td>{{$ser->fechac}}</td>
                        <td>{{$ser->precio}}</td>
                      </tr>
                    </tbody>
                  </table>

</div>


    <script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </script>

</body>
</html>
