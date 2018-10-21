
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::to("css/bootstrap.css")}}" >
    <link rel="stylesheet" href="{{URL::to("css/fontawesome.all.css")}}" >
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <style>
    html,body{
      font-family: 'Roboto', sans-serif;
    }
    body{
      background:#f3f3f3;
      height:auto;
      overflow-y:auto;
    }
    .footer {
      position: relative;
      /* color:#000; */
      bottom: 0;
      width: 100%;
      /* Set the fixed height of the footer here */
      height: 60px;
      line-height: 60px; /* Vertically center the text there */
      /* background-color: #f5f5f5; */
    }

    .footer > .container {
  padding-right: 15px;
  padding-left: 15px;
}



    </style>
    <title>@yield('titulo')</title>
</head>
<body>
    <header>
    <!-- @yield('cabecera') -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark container">
  <a class="navbar-brand" href="#">
    <img src="http://flicksathome.com/flick_content/img/logo.png" width="64" alt="" class="img-responsive">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorias
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Accion</a>
          <a class="dropdown-item" href="#">Aventura</a>
          <a class="dropdown-item" href="#">Comedia</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Año
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">2018</a>
          <a class="dropdown-item" href="#">2017</a>
          <a class="dropdown-item" href="#">2016</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contacto">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Revisiones</a>
      </li>
    </ul>
  </div>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
    </header>
    <div class="container-fluid">
        @yield("content")
    </div>
    <!-- <footer class="footer">
      <div class="container" style="background-color:#6666ff">
        <div class="row">
          <div class="col">
            <p class='p-0'>
              <a href="/" class='text-white'><i class="fas fa-home"></i>&nbsp;Inicio</a><br>
              <a href="/contacto" class='text-white'><i class="fas fa-headset"></i>&nbsp;Contactanos</a><br>
              <a href="/" class='text-white'><i class="fas fa-eye"></i>&nbsp;Revisiones</a><br>
            </p>
          </div>
          <div class="col"></div>
          <div class="col"></div>
        </div>
        <div class="row text-center">
          <div class="col-12 text-center text-white">
            Nuestras Redes Sociales
          </div>
          <div class="col-12 d-flex justify-content-around">
              <a href="" class='text-white' style="font-size:xx-large"><i class="fab fa-twitter"></i></a>
              <a href="" class='text-white' style="font-size:xx-large"><i class="fab fa-facebook"></i></a>
              <a href="" class='text-white' style="font-size:xx-large"><i class="fab fa-instagram"></i></a>
              <a href="" class='text-white' style="font-size:xx-large"><i class="fab fa-google"></i></a>
              <a href="" class='text-white' style="font-size:xx-large"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </footer> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
<script>
  $(document).ready(function(){
    $("[data-toggle='tooltip']").tooltip();
  });
</script>
</body>
</html>