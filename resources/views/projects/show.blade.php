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
      <img src="../img/logoSena.png" alt="Imagen Ejemplo" class="imagen"
        style="width: 70px; height: auto; margin-left: 15px; margin-right: 10px;"> <!-- Ajustar margen -->
      <hr class="separador"> <!-- Línea separadora -->
      <h5 class="ms-2 me-2">
        <span class="color-sena">Repositorio</span><br>
        Institucional<br>
        <span class="color-sena">Del sena</span>
      </h5>
      <img src="../img/logocolombia.jpg" alt="Imagen Ejemplo" class="imagen"
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
  <!-- Detalles del Proyecto -->
  <div class="container my-5">
    <div class="row justify-content-center"> <!-- Centrar el contenido horizontalmente -->
        <div class="col-md-10"> <!-- Usamos col-md-10 para mantener una anchura razonable -->
            <div class="card">
                <div class="card-body">
                    <!-- Título del Proyecto (centrado) -->
                    <h5 class="card-title text-center mb-4">{{ $project->name }}</h5>

                    <!-- Contenedor para el archivo PDF y el resumen -->
                    <div class="d-flex mb-4 justify-content-center align-items-start" style="gap: 100px;"> <!-- Espaciado entre elementos -->
                        <!-- Archivo PDF (a la izquierda) -->
                        <div style="flex: 0 0 400px;"> <!-- Tamaño fijo para el PDF -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Archivo PDF</h5>
                                    <iframe 
                                        src="{{ asset('storage/' . $project->file_path) }}" 
                                        width="100%" 
                                        height="450px" 
                                        style="border: none; cursor: pointer;" 
                                        onclick="openPDF('{{ asset('storage/' . $project->file_path) }}')">
                                    </iframe>
                                    <!-- Botón para abrir el PDF en una nueva pestaña -->
                                    <div class="text-center mt-3">
                                        <a href="{{ asset('storage/' . $project->file_path) }}" target="_blank" class="btn btn-primary">Abrir PDF</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Otros datos del Proyecto -->
                    <div class="mt-4">
                        <p><strong>Fecha:</strong> {{ $project->created_at->format('d/m/Y') }}</p>
                        <p><strong>Autores:</strong> {{ implode(', ', $project->authors) }}</p>
                        <p><strong>Asesor:</strong> {{ $project->advisor }}</p>
                        <p><strong>Centro:</strong> {{ $project->center }}</p>
                        <p><strong>Programa:</strong> {{ $project->program }}</p>
                        <p><strong>Tipo:</strong> {{ $project->type }}</p>
                    </div>
                        </div>

                        <!-- Resumen del Proyecto (a la derecha) -->
                        <div class="flex-grow-1">
                            <h5 class="card-title">Resumen</h5>
                            <p>{{ $project->summary }}</p>
                            
                            <!-- URL del Proyecto -->
                            @if ($project->url)
                                <div class="mt-3">
                                    <p><strong>Enlace del Proyecto:</strong> <a href="{{ $project->url }}" target="_blank">{{ $project->url }}</a></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Bootstrap JavaScript and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
