<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-top: 9px;">
    <div class="container-fluid d-flex align-items-center">
      <img src="./img/logoSena.png" alt="Imagen Ejemplo" class="imagen"
        style="width: 70px; height: auto; margin-left: 15px; margin-right: 10px;"> <!-- Ajustar margen -->
      <hr class="separador"> <!-- Línea separadora -->
      <h5 class="ms-2 me-2">
        <span class="color-sena">Repositorio</span><br>
        Institucional<br>
        <span class="color-sena">Del sena</span>
      </h5>
      <img src="./img/logocolombia.jpg" alt="Imagen Ejemplo" class="imagen"
        style="width: 70px; height: auto; margin-left: auto; margin-right: 10px;"> <!-- Ajustar margen -->
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
      <!-- Menú principal (Inicio, ¿Cómo Publicar?, Buscar, Contactar) -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('inicio') }}">
            <p class="h6" style="font-size: 12px;">Inicio</p>
          </a>
        </li>
        <li class="nav-item">
          <div class="separator1"></div> <!-- Línea separadora -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('comopublicar') }}">
            <p class="h6" style="font-size: 12px;">¿Como Publicar?</p>
          </a>
        </li>
        <li class="nav-item">
          <div class="separator1"></div> <!-- Línea separadora -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('buscar') }}">
            <p class="h6" style="font-size: 12px;">Buscar</p>
          </a>
        </li>
        <li class="nav-item">
          <div class="separator1"></div> <!-- Línea separadora -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contactar') }}">
            <p class="h6" style="font-size: 12px;">Contactar</p>
          </a>
        </li>
         @auth
            <!-- Mostrar botón "Subir Proyecto" si el usuario está autenticado -->
            <li class="nav-item">
                <div class="separator1"></div> <!-- Línea separadora -->
            </li>
            <li class="nav-item">

            <a class="nav-link" href="{{ route('subirproyecto') }}">
            <p class="h6" style="font-size: 12px;">subirproyecto</p>
            </a>
            </li>
          @endauth
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
        @auth
        <!-- Mostrar nombre de usuario si está autenticado -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <p class="h6" style="font-size: 12px;">{{ Auth::user()->name }}</p> <!-- Muestra el nombre del usuario -->
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <!-- Formulario de logout -->
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </li>
        @else
            <!-- Si no está autenticado, mostrar los enlaces de login y registro -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <p class="h6" style="font-size: 12px;">Iniciar sesión</p>
                </a>
            </li>
            <li class="nav-item">
                <div class="separator1"></div> <!-- Línea separadora -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                    <p class="h6" style="font-size: 12px;">Registrarse</p>
                </a>
            </li>
        @endauth
      </ul>
    </div>
  </nav>
  <div class="container mt-5">
    <h1 class="text-center">Buscar Proyecto</h1>
    <form action="{{ route('buscar') }}" method="GET" class="mb-4">
        <div class="input-group">
            <!-- Campo para palabras clave o nombre del proyecto -->
            <input type="text" name="query" class="form-control" placeholder="Ingrese palabra clave, nombre del proyecto o autor" required>
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <!-- Navegador Lateral -->
            <div class="list-group">
                <!-- Filtro por Autor -->
                <h5><a href="javascript:void(0);" id="showAuthors" class="list-group-item list-group-item-action">Autores</a></h5>
                
                <!-- Filtro por Título -->
                <h5><a href="javascript:void(0);" id="showTitles" class="list-group-item list-group-item-action">Títulos</a></h5>
            </div>
        </div>

        <div class="col-md-9">
            <h1 class="text-center">Proyectos</h1>

            <!-- Sección para mostrar autores -->
            <div id="authorsSection" style="display:none;">
                <h2>Autores</h2>
                <ul>
                    @foreach($authors as $author)
                        <li><a href="{{ route('buscarPorAutor', ['author' => $author]) }}">{{ $author }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Sección para mostrar títulos -->
            <div id="titlesSection" style="display:none;">
                <h2>Títulos</h2>
                <ul>
                    @foreach($titles as $title)
                        <li><a href="{{ route('buscarPorTitulo', ['title' => $title]) }}">{{ $title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- Mostrar proyectos después de hacer clic en un autor o título -->
            @if(isset($projects) && $projects->count() > 0)
                <div class="row">
                    @foreach($projects as $project)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <object data="{{ asset('storage/' . $project->file_path) }}" type="application/pdf" width="100%" height="200px">
                                    <p>Tu navegador no soporta la vista previa de PDF. <a href="{{ asset('storage/' . $project->file_path) }}" target="_blank">Haz clic aquí para ver el PDF</a>.</p>
                                </object>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $project->name }}</h5>
                                    <p class="card-text">{{ Str::limit($project->summary, 100) }}</p>
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">Ver Detalle</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif(isset($projects))
                <p class="text-center">No se encontraron proyectos que coincidan con la búsqueda.</p>
            @endif
        </div>
    </div>
</div>

<!-- Script para mostrar u ocultar las secciones de autores y títulos -->
<script>
    document.getElementById('showAuthors').addEventListener('click', function() {
        document.getElementById('authorsSection').style.display = 'block';
        document.getElementById('titlesSection').style.display = 'none';
    });

    document.getElementById('showTitles').addEventListener('click', function() {
        document.getElementById('titlesSection').style.display = 'block';
        document.getElementById('authorsSection').style.display = 'none';
    });
</script>



  <!-- Bootstrap JavaScript and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>