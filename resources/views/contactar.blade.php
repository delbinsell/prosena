<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contactar - Repositorio Institucional del SENA</title>
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
                                            <img src="{{ asset('img/logout.png') }}" alt="Cerrar sesión" class="logout-img icono-nav" style="width: 20px;">
                                            Cerrar sesión
                                        </button>
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

    <!-- CONTENIDO PRINCIPAL -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Contáctanos</h3>
                        
                        <div class="row">
                            <!-- Información de contacto -->
                            <div class="col-md-6 mb-4">
                                <h5 class="color-sena mb-3">Información de contacto</h5>
                                <p><strong>Medellín:</strong> 44442800</p>
                                <p><strong>Resto del país:</strong> 018000910270</p>
                                <p><strong>Correo electrónico:</strong> <a href="mailto:contacto@sena.edu.co" class="text-decoration-none color-sena">contacto@sena.edu.co</a></p>
                                <p><strong>Horario de atención:</strong></p>
                                <ul>
                                    <li>Lunes a Viernes: 7:00 AM - 7:00 PM</li>
                                    <li>Sábados: 8:00 AM - 1:00 PM</li>
                                </ul>
                            </div>
                            
                            <!-- Formulario de contacto -->
                            <div class="col-md-6">
                                <h5 class="color-sena mb-3">Envíanos un mensaje</h5>
                                <form>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Nombre completo" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Correo electrónico" required>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="4" placeholder="Tu mensaje" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100" style="background-color: #5E9D4B;">Enviar mensaje</button>
                                </form>
                            </div>
                        </div>

                        <!-- Mapa -->
                        <div class="mt-4">
                            <h5 class="color-sena mb-3">Ubicación principal</h5>
                            <div class="ratio ratio-16x9">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.831910641651!2d-75.5685611!3d6.302048!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442f25d6670d4d%3A0x8043999e5e767b96!2sSENA%20-%20Centro%20de%20Tecnolog%C3%ADa%20de%20la%20Manufactura%20Avanzada!5e0!3m2!1ses!2sco!4v1732740559737!5m2!1ses!2sco" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5">
        <p>© {{ date('Y') }} Repositorio Institucional del SENA. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>