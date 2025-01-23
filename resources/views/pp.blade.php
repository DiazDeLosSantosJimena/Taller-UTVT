<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>titulo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Custom CSS -->
    <style>
        .navbar {
            background-color: #4CAF50; /* Verde similar al de la imagen */
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand " href="#">UTVT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Nose</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Quiensabe</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Perfil
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Configuraciones</a>
                    <a class="dropdown-item" href="#">Cerrar Sesion</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- Carrusel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('imagenes/1.jpg') }}" class="d-block mx-auto w-25" alt="Imagen 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('imagenes/2.jpg') }}" class="d-block mx-auto w-50" alt="Imagen 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('imagenes/3.jpg') }}" class="d-block mx-auto w-50" alt="Imagen 3">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<br>
    <div class="container text-center my-4">
        <h2>Todos los talleres</h2>
    </div>
<br>
<div class="container">




    <!-- Fila 1 -->
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                    <h5 class="card-title">Artes visuales</h5>
                
                                <!-- Button trigger modal -->
  <img src="{{asset('imagenes/ARTES.jpg')}}" style="width: 272px; height: 200px;"> 
  <br>
  <br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Informacion
  </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> </h5> Modal title </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Al chile ni cheques la informacion por que todavia ni la pongo pinche jossue chismoso
            Hola jimena 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  
                <!-- Segundo Card -->
                </div>
            </div>
        </div>


        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                    <h5 class="card-title">Basquetbol</h5>
                
                                <!-- Button trigger modal -->
  <img src="{{asset('imagenes/BASQUETBOL.jpg')}}" style="width: 272px; height: 200px;"> 
  <br>
  <br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Informacion
  </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> </h5> Modal title </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Al chile ni cheques la informacion por que todavia ni la pongo pinche jossue chismoso
            Hola jimena 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  

                </div>
            </div>
        </div>
      

        <!-- Tercer card -->

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                    <h5 class="card-title">Danza y baile </h5>
                
                                <!-- Button trigger modal -->
  <img src="{{asset('imagenes/DANZA.jpg')}}" style="width: 272px; height: 200px;"> 
  <br>
  <br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Informacion
  </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> </h5> Modal title </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Al chile ni cheques la informacion por que todavia ni la pongo pinche jossue chismoso
            Hola jimena 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  

                </div>
            </div>
        </div>

        <!-- Cuarto card -->
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                    <h5 class="card-title">Futbol soccer</h5>
                
                                <!-- Button trigger modal -->
  <img src="{{asset('imagenes/FUTBOL.jpg')}}" style="width: 272px; height: 200px;"> 
  <br>
  <br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Informacion
  </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> </h5> Modal title </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Al chile ni cheques la informacion por que todavia ni la pongo pinche jossue chismoso
            Hola jimena 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  

                </div>
            </div>
        </div>
        
        <!-- Quito Card --> 
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                    <h5 class="card-title">Ortografía y redaccíon</h5>
                
                                <!-- Button trigger modal -->
  <img src="{{asset('imagenes/ORTOGRAFIA.jpg')}}" style="width: 272px; height: 200px;"> 
  <br>
  <br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Informacion
  </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> </h5> Modal title </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Al chile ni cheques la informacion por que todavia ni la pongo pinche jossue chismoso
            Hola jimena 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  

                </div>
            </div>
        </div>


        <!-- Sexto card --> 
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                    <h5 class="card-title">Rondalla</h5>
                
                                <!-- Button trigger modal -->
  <img src="{{asset('imagenes/RONDALLA.jpg')}}" style="width: 272px; height: 200px;"> 
  <br>
  <br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Informacion
  </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> </h5> Modal title </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Al chile ni cheques la informacion por que todavia ni la pongo pinche jossue chismoso
            Hola jimena 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  

                </div>
            </div>
        </div>
        
        <!-- SEPTIMO card -->
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                    <h5 class="card-title">Teatro</h5>
                
                                <!-- Button trigger modal -->
  <img src="{{asset('imagenes/TEATRO.jpg')}}" style="width: 272px; height: 200px;"> 
  <br>
  <br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Informacion
  </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> </h5> Modal title </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Al chile ni cheques la informacion por que todavia ni la pongo pinche jossue chismoso
            Hola jimena 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  

                </div>
            </div>
        </div>


        <!-- Optava Card -->
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                    <h5 class="card-title">Tocho</h5>
                
                                <!-- Button trigger modal -->
  <img src="{{asset('imagenes/TOCHO.jpg')}}" style="width: 272px; height: 200px;"> 
  <br>
  <br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Informacion
  </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> </h5> Modal title </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Al chile ni cheques la informacion por que todavia ni la pongo pinche jossue chismoso
            Hola jimena 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  

                </div>
            </div>
        </div>

    
        <!-- Novena Card --> 
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                    <h5 class="card-title">Voleibol</h5>
                
                                <!-- Button trigger modal -->
  <img src="{{asset('imagenes/VOLEIBOL.jpg')}}" style="width: 272px; height: 200px;"> 
  <br>
  <br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Informacion
  </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> </h5> Modal title </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Al chile ni cheques la informacion por que todavia ni la pongo pinche jossue chismoso
          Hola jimena 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  

                </div>
            </div>
        </div>
<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
