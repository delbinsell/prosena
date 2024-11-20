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
  <h3 style="text-align: center; margin-top: 20px; ">¿Como cargo mi proyecto?</h3>
  <h6 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">
    El procedimiento que debes realizar para publicar en el repositorio insititucional del Sena es:
  </h6>
  <h5 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">1. Accede al Sistema</h5>
  <ul class="ms-2 me-2" style="margin: 20px auto; padding: 0 120px; text-align: justify; max-width: 100%;">
    <li >Abre el navegador web y dirígete a la URL del repositorio.</li>
    <li>Inicia sesión con tu correo institucional y contraseña.</li>
  </ul>
  <h5 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">2. Selecciona la Opción para Subir un Documento</h5>
  <ul class="ms-2 me-2" style="margin: 20px auto; padding: 0 120px; text-align: justify; max-width: 100%;">
    <li>Una vez dentro del sistema, busca el botón o sección que diga "Subir Proyecto" en el menú principal.</li>
    <li>Haz clic en esa opción.</li>
  </ul>
  <h5 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">3. Completa los Datos del Proyecto</h5>
  <h6 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">Llena un formulario que incluye los siguientes campos:</h6>
  <ul class="ms-2 me-2" style="margin: 20px auto; padding: 0 120px; text-align: justify; max-width: 100%;">
    <li>Título del Proyecto: Escribe el título completo del trabajo.</li>
    <li>Resumen: Proporciona un resumen o descripción breve del proyecto.</li>
    <li>Autores: Lista los nombres completos de los autores que participaron en el proyecto.</li>
    <li>Asesores: Indica el nombre(s) del asesor.</li>
  </ul>
  <h5 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">4. En el formulario habrá un campo para subir el archivo.</h5>
  <ul class="ms-2 me-2" style="margin: 20px auto; padding: 0 120px; text-align: justify; max-width: 100%;">
    <li >Haz clic en el botón "Seleccionar Archivo".</li>
    <li>Busca y selecciona el archivo PDF desde tu dispositivo (solo se acepta archivos PDF).</li>
  </ul>
  <h5 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">5. Confirma la Subida.</h5>
  <ul class="ms-2 me-2" style="margin: 20px auto; padding: 0 120px; text-align: justify; max-width: 100%;">
    <li >Revisa que toda la información esté correctamente llenada.</li>
    <li>Haz clic en el botón "Subir".</li>
    <li>El sistema validará el archivo y la información antes de subirlo.</li>
  </ul>
  <h5 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">6. Verifica la Subida.</h5>
  <ul class="ms-2 me-2" style="margin: 20px auto; padding: 0 120px; text-align: justify; max-width: 100%;">
    <li >Una vez subido, el sistema te redirigirá a una página de confirmación o te mostrará el proyecto subido en una lista.</li>
    <li>Asegúrate de que el archivo aparece correctamente en el repositorio con toda la información asociada.</li>
  </ul>
  
  
  <!-- Bootstrap JavaScript and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>