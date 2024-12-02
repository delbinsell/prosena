<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>¿Cómo Publicar? | Repositorio Institucional</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                            <img src="{{ asset('img/logout.png') }}" alt="Cerrar sesión" class="logout-img icono-nav">
                                            Cerrar sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <img src="{{ asset('img/login.png') }}" alt="Login" class="login-img icono-nav">
                                <p class="h6 mb-0">Iniciar sesión</p>
                            </a>
                        </li>
                        <div class="separator1"></div>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <img src="{{ asset('img/register.png') }}" alt="Register" class="register-img icono-nav">
                                <p class="h6 mb-0">Registrarse</p>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <!-- Título principal -->
        <h3 class="text-center mt-4">¿CÓMO CARGO MI PROYECTO?</h3>

        <!-- Contenedor de pasos -->
        <div class="text-justify mx-auto" style="max-width: 800px;">
            <div class="mb-4">

                <!-- Paso 1 -->
                <h5 class="color-sena mt-4">1. Accede al Sistema</h5>
                
                <ul>
                    <li>Abre el navegador web y dirígete a la URL del repositorio.</li>
                    <li>Inicia sesión con tu correo institucional y contraseña.</li>
                </ul>

                <img src="{{ asset('img/captu_login.png') }}" alt="Accede al Sistema" class="imagen my-4 mx-auto d-block" style="max-height: 300px;">

                <!-- Paso 2 -->
                <h5 class="color-sena mt-4">2. Selecciona la Opción para Subir un Documento</h5>
                
                <ul>
                    <li>Una vez dentro del sistema, busca el botón o sección que diga "Subir Proyecto" en el menú principal.</li>
                    <li>Haz clic en esa opción.</li>
                </ul>

                <img src="{{ asset('img/upload_option.png') }}" alt="Selecciona Subir Documento" class="imagen my-4 mx-auto d-block" style="max-height: 100px;">

                <!-- Paso 3 -->
                <h5 class="color-sena mt-4">3. Completa los Datos del Proyecto</h5>
                
                <h6>Llena un formulario que incluye los siguientes campos:</h6>
                <ul>
                    <li>Título del Proyecto: Escribe el título completo del trabajo.</li>
                    <li>Resumen: Proporciona un resumen o descripción breve del proyecto.</li>
                    <li>Autores: Lista los nombres completos de los autores que participaron en el proyecto.</li>
                    <li>Asesores: Indica el nombre(s) del asesor.</li>
                </ul>

                <img src="{{ asset('img/form.png') }}" alt="Completa los Datos del Proyecto" class="imagen my-4 mx-auto d-block" style="max-height: 300px;">

                <!-- Paso 4 -->
                <h5 class="color-sena mt-4">4. Subir el Archivo</h5>
                
                <ul>
                    <li>Haz clic en el botón "Seleccionar Archivo".</li>
                    <li>Busca y selecciona el archivo PDF desde tu dispositivo (solo se acepta archivos PDF).</li>
                </ul>

                <img src="{{ asset('img/upload_file.png') }}" alt="Subir Archivo" class="imagen my-4 mx-auto d-block" style="max-height: 100px;">

                <!-- Paso 5 -->
                <h5 class="color-sena mt-4">5. Confirma la Subida</h5>
                
                <ul>
                    <li>Revisa que toda la información esté correctamente llenada.</li>
                    <li>Haz clic en el botón "Subir".</li>
                    <li>El sistema validará el archivo y la información antes de subirlo.</li>
                </ul>

                <img src="{{ asset('img/confirm_upload.png') }}" alt="Confirma la Subida" class="imagen my-4 mx-auto d-block" style="max-height: 100px;">

                <!-- Paso 6 -->
                <h5 class="color-sena mt-4">6. Verifica la Subida</h5>
                
                <ul>
                    <li>Una vez subido, el sistema te redirigirá a una página de confirmación o te mostrará el proyecto subido en una lista.</li>
                    <li>Asegúrate de que el archivo aparece correctamente en el repositorio con toda la información asociada.</li>
                </ul>

                <img src="{{ asset('img/verify_upload.png') }}" alt="Verifica la Subida" class="imagen my-4 mx-auto d-block" style="max-height: 500px;">
            </div>
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