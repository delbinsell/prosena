<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $project->name }} - Repositorio Institucional del SENA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/project-styles.css') }}">
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

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="project-form">
                    <h3 class="text-center mb-4">{{ $project->name }}</h3>
                    
                    <div class="project-details">
                        <div class="pdf-container">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-3">Archivo PDF</h5>
                                    <iframe 
                                        src="{{ asset('storage/' . $project->file_path) }}" 
                                        class="pdf-viewer"
                                        onclick="openPDF('{{ asset('storage/' . $project->file_path) }}')"
                                    ></iframe>
                                    <div class="text-center">
                                        <a href="{{ asset('storage/' . $project->file_path) }}" 
                                           target="_blank" 
                                           class="btn btn-primary">
                                            <i class="fas fa-external-link-alt me-2"></i>Abrir PDF
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="project-metadata">
                                <p><strong><i class="far fa-calendar-alt me-2"></i>Fecha:</strong> {{ $project->created_at->format('d/m/Y') }}</p>
                                <p><strong><i class="fas fa-users me-2"></i>Autores:</strong> {{ implode(', ', $project->authors) }}</p>
                                <p><strong><i class="fas fa-user-tie me-2"></i>Asesor:</strong> {{ $project->advisor }}</p>
                                <p><strong><i class="fas fa-building me-2"></i>Centro:</strong> {{ $project->center }}</p>
                                <p><strong><i class="fas fa-graduation-cap me-2"></i>Programa:</strong> {{ $project->program }}</p>
                                <p><strong><i class="fas fa-tasks me-2"></i>Tipo:</strong> {{ $project->type }}</p>
                            </div>
                        </div>
                        
                        <div class="project-info">
                            <h5 class="mb-3"><i class="fas fa-file-alt me-2"></i>Resumen</h5>
                            <p class="text-justify">{{ $project->summary }}</p>
                            
                            @if ($project->url)
                                <div class="mt-4">
                                    <h5 class="mb-3"><i class="fas fa-link me-2"></i>Enlace del Proyecto</h5>
                                    <a href="{{ $project->url }}" 
                                       target="_blank" 
                                       class="btn btn-outline-secondary">
                                        <i class="fas fa-external-link-alt me-2"></i>Visitar proyecto
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
      <p>© {{ date('Y') }} Repositorio Institucional del SENA. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        function openPDF(url) {
            window.open(url, '_blank');
        }
    </script>
</body>
</html>
