<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repositorio Institucional del SENA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- NAVBAR SUPERIOR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-2">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/logoSena.png') }}" alt="Logo SENA" class="imagen" style="width: 70px;">
                <div class="separador mx-3"></div>
                <h5 class="mb-0 text-center">
                    <span class="color-sena">Repositorio</span><br>
                    Institucional<br>
                    <span class="color-sena">Del SENA</span>
                </h5>
            </div>
            <img src="{{ asset('img/logocolombia.jpg') }}" alt="Logo Colombia" class="imagen" style="width: 70px;">
        </div>
    </nav>

    <!-- NAVBAR INFERIOR -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Enlaces de navegación -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inicio') }}">
                            <p class="h6 mb-0">Inicio</p>
                        </a>
                    </li>
                    <div class="separator1"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('comopublicar') }}">
                            <p class="h6 mb-0">¿Cómo Publicar?</p>
                        </a>
                    </li>
                    <div class="separator1"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buscar') }}">
                            <p class="h6 mb-0">Buscar</p>
                        </a>
                    </li>
                    <div class="separator1"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactar') }}">
                            <p class="h6 mb-0">Contactar</p>
                        </a>
                    </li>
                    @auth
                        <div class="separator1"></div>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subirproyecto') }}">
                                <p class="h6 mb-0">Subir Proyecto</p>
                            </a>
                        </li>
                    @endauth
                </ul>

                <!-- Enlaces de autenticación -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <p class="h6 mb-0">{{ Auth::user()->name }}</p>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                        <img src="{{ asset('img/logout.png') }}" alt="Cerrar sesión" class="logout-img icono-nav" style="width: 20px;">Cerrar sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <img src="{{ asset('img/login.png') }}" alt="Login" class="login-img icono-nav" style="width: 20px;">
                                <p class="h6 mb-0">Iniciar sesión</p>
                            </a>
                        </li>
                        <div class="separator1"></div>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <img src="{{ asset('img/register.png') }}" alt="Register" class="register-img icono-nav" style="width: 20px;">
                                <p class="h6 mb-0">Registrarse</p>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- SECCIÓN PRINCIPAL -->
    <div class="container">
       
        <h3 class="text-center mt-4">SOBRE EL REPOSITORIO INSTITUCIONAL DEL SENA</h3>
        
        <div class="text-justify mx-auto" style="max-width: 800px;">

            <!-- Introducción -->
            <h6 class="mb-4">
                <span class="color-sena">Repositorio Institucional del Sena</span> es un servicio libre y gratuito creado para albergar, preservar y dar visibilidad de los proyectos finales generados en la institución y la hace accesible a través del Internet.
            </h6>
            <h6 class="mb-4">
                Los documentos del Repositorio Institucional del Sena son recuperables desde buscadores reputados como Google, Google Scholar, Bing, etc.
            </h6>

            <img src="{{ asset('img/repository_intro.jpg') }}" alt="Repositorio Institucional" class="imagen my-4 mx-auto d-block" style="max-height: 200px;">

            <!-- Sección: Misión y Objetivos -->
            <h5 class="color-sena mt-4">Misión y objetivos</h5>
            <ul class="mb-4">
                <li>Integrar, difundir y preservar la producción de los proyectos finales de los estudiantes.</li>
                <li>Aumentar la visibilidad y el impacto de los proyectos, el autor y la institución.</li>
                <li>Aumentar el impacto social de la producción de los proyectos de la institución.</li>
                <li>Proporcionar acceso a la información de forma gratuita.</li>
            </ul>

            <img src="{{ asset('img/goals.webp') }}" alt="Misión y Objetivos" class="imagen my-4 mx-auto d-block" style="max-height: 200px;">

            <!-- Sección: Política de Contenidos -->
            <h5 class="color-sena mt-4">Política de contenidos. Quién y qué se puede publicar</h5>
            <ul class="mb-4">
                <li>
                    <strong class="color-sena">Autoarchivo:</strong> Los miembros del SENA podrán realizar autoarchivo en el Repositorio Institucional mediante la creación de usuario utilizando el correo institucional <i>xxxx@soy.sena.edu.co</i> o <i>xxxx@misena.edu.co</i>, y podrán publicar su proyecto.
                </li>
                <li>
                    Todos los documentos que se quieran publicar en el Repositorio Institucional del Sena deben incluir el texto completo del mismo en formato PDF.
                </li>
            </ul>

            <img src="{{ asset('img/content_policy.avif') }}" alt="Política de Contenidos" class="imagen my-4 mx-auto d-block" style="max-height: 200px;">

            <!-- Sección: Políticas de Reutilización -->
            <h5 class="color-sena mt-4">Políticas de Reutilización</h5>
            <h6 class="mb-4">
                Los documentos y proyectos finales publicados en esta página institucional están descritos con metadatos. Los metadatos recogen información principalmente descriptiva (autor, título, etc.), aunque también pueden incluir datos administrativos (fecha de creación, derechos, control de acceso) y de preservación (formato, tipo de archivo, etc.).
            </h6>

            <img src="{{ asset('img/reuse.avif') }}" alt="Política de Reutilización" class="imagen my-4 mx-auto d-block" style="max-height: 200px;">

            <!-- Sección: Política de Preservación -->
            <h5 class="color-sena mt-4">Política de Preservación</h5>
            <h6 class="mb-4">
                La preservación digital de los contenidos alojados en nuestra página institucional garantiza que los proyectos finales puedan ser utilizados y consultados a largo plazo. Para asegurar la integridad y disponibilidad de estos contenidos en el futuro, implementamos las siguientes medidas técnicas:
            </h6>
            <ul class="mb-4">
                <li>Copias de seguridad diarias para proteger los datos frente a posibles pérdidas o fallos.</li>
                <li>Actualizaciones periódicas de hardware y software para mantener la infraestructura tecnológica en óptimas condiciones.</li>
                <li>Mantenimiento de servidores espejo en ubicaciones geográficas distintas, asegurando redundancia y protección frente a desastres locales.</li>
                <li>Migración de versiones y formatos de archivos cuando sea necesario, para prevenir la obsolescencia tecnológica y garantizar la accesibilidad de los documentos a lo largo del tiempo.</li>
            </ul>

            <img src="{{ asset('img/preservation.jpg') }}" alt="Política de Preservación" class="imagen my-4 mx-auto d-block" style="max-height: 200px;">
        </div>
    </div>


    <footer>
        <p>© {{ date('Y') }} Repositorio Institucional del SENA. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
