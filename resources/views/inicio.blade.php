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
  <h3 style="text-align: center; margin-top: 20px; ">SOBRE EL REPOSITORIO INSTITUCIONAL DEL SENA</h3>
  <h6 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">
    Repositorio Institucional del Sena es un servicio libre y gratuito creado para albergar, preservar y dar visibilidad de los proyectos finales generados en la institución y la hace accesible a través del Internet
  </h6>
  <h6 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">
    Los documentos del Repositorio Institucional del Sena son recuperables desde buscadores reputados como Google, Google Scholar, Bing, ...
  </h6>
  <h5 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">Misión y objetivos</h5>
  <ul class="ms-2 me-2" style="margin: 20px auto; padding: 0 120px; text-align: justify; max-width: 100%;">
    <li >Integrar, difundir y preservar la producción de los proyectos finales de los estudiantes.</li>
    <li>Aumentar la visibilidad y el impacto de los proyectos, el autor y la institución.</li>
    <li>Aumentar el impacto social de la producción de los proyectos de la institución.</li>
    <li>Proporcionar acceso a la información de forma gratuita.</li>
  </ul>
  <h5 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">Política de contenidos. Quién y qué se puede publicar</h5>
  <ul class="ms-2 me-2" style="margin: 20px auto; padding: 0 120px; text-align: justify; max-width: 100%;">
    <li><h5 style="display: inline;">Autoarchivo:</h5> Los miembros del SENA podrán realizar autoarchivo en el Repositorio Institucional del Sena, mediante la creación de usuario utilizando el correo institucional xxxx@soy.sena.edu.co o xxxx@misena.edu.co, podrán publicar su proyecto.</li>
    <li>Todos los documentos que se quieran publicar en el  Repositorio Institucional del Sena deben incluir el texto completo del mismo en formato PDF.</li>
  </ul>
  <h5 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">Políticas de Reutilización</h5>
  <h6 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">
    Los documentos y proyectos finales publicados en esta página institucional están descritos con metadatos. Los metadatos recogen información principalmente descriptiva (autor, título, etc.), aunque también pueden incluir datos administrativos (fecha de creación, derechos, control de acceso) y de preservación (formato, tipo de archivo, etc.).
  </h6>
  <h6 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">
    Los metadatos de los proyectos podrán ser reutilizados bajo las condiciones de la licencia Creative Commons Reconocimiento (by). Esto significa que cualquier usuario o recolector podrá utilizar los metadatos con el único requisito de mencionar la fuente y proporcionar el identificador del registro original en nuestra página institucional.
  </h6>
  <h5 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">Política de Preservación</h5>
  <h6 class="ms-2 me-2" style="margin: 20px auto; padding: 0 100px; text-align: justify; max-width: 100%;">
    La preservación digital de los contenidos alojados en nuestra página institucional garantiza que los proyectos finales puedan ser utilizados y consultados a largo plazo. Para asegurar la integridad y disponibilidad de estos contenidos en el futuro, implementamos las siguientes medidas técnicas:
  </h6>
  <ul class="ms-2 me-2" style="margin: 20px auto; padding: 0 120px; text-align: justify; max-width: 100%;">
    <li >Copias de seguridad diarias para proteger los datos frente a posibles pérdidas o fallos.</li>
    <li>Actualizaciones periódicas de hardware y software para mantener la infraestructura tecnológica en óptimas condiciones.</li>
    <li>Mantenimiento de servidores espejo en ubicaciones geográficas distintas, asegurando redundancia y protección frente a desastres locales.</li>
    <li>Migración de versiones y formatos de archivos cuando sea necesario, para prevenir la obsolescencia tecnológica y garantizar la accesibilidad de los documentos a lo largo del tiempo.</li>
  </ul>
  



  <!-- Bootstrap JavaScript and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>