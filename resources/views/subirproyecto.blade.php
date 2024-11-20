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
  <h1 class="text-center">Subir Proyecto</h1>
  <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nombre del Proyecto</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
      <label for="summary" class="form-label">Resumen del Proyecto</label>
      <textarea class="form-control" id="summary" name="summary" rows="4" required></textarea>
    </div>

    <div class="mb-3">
      <label for="authors" class="form-label">Autores</label>
      <div id="authors-container">
        <input type="text" class="form-control mb-2" name="authors[]" placeholder="Nombre del autor 1" required>
      </div>
      <button type="button" id="add-author" class="btn btn-outline-secondary btn-sm">Agregar Autor</button>
    </div>

    <div class="mb-3">
      <label for="advisor" class="form-label">Nombre del Asesor</label>
      <input type="text" class="form-control" id="advisor" name="advisor" required>
    </div>

    <div class="mb-3">
      <label for="file" class="form-label">Subir Archivo (PDF)</label>
      <input type="file" class="form-control" id="file" name="file" accept=".pdf" required>
    </div>
    <div class="mb-3">
      <label for="url" class="form-label">URL del Proyecto</label>
      <input type="url" class="form-control" id="url" name="url" placeholder="Ingrese URL del proyecto" required>
    </div>

    <div class="mb-3">
      <label for="type" class="form-label">Tipo de Proyecto</label>
      <select class="form-control" id="type" name="type" required>
        <option value="">Selecciona el Tipo de Proyecto</option>
        <option value="Proyecto Final">Proyecto Final</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="center" class="form-label">Centro de Formación</label>
      <select class="form-control" id="center" name="center" required>
        <option value="">Selecciona el Centro de Formación</option>
        <option value="CTMA">CTMA</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="program" class="form-label">Programa de formacion</label>
      <select class="form-control" id="program" name="program" required>
        <option value="">Selecciona el Programa de formacion</option>
        <option value="ADSO">ADSO</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
  </form>
</div>

<script>
  // Script para agregar más campos de autor dinámicamente
  document.getElementById('add-author').addEventListener('click', function () {
    const container = document.getElementById('authors-container');
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'authors[]';
    input.className = 'form-control mb-2';
    input.placeholder = `Nombre del autor ${container.children.length + 1}`;
    container.appendChild(input);
  });
</script>


  