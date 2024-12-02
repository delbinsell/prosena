<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar | Repositorio Institucional</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
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
    <div class="container mt-4">
        <h3 class="text-center mb-4">Buscar Proyecto</h3>
        
        <!-- Barra de búsqueda -->
        <div class="search-container">
            <form action="{{ route('buscar') }}" method="GET" class="search-form">
                <div class="search-wrapper">
                    <input type="text" 
                           name="query" 
                           class="search-input" 
                           placeholder="Buscar por título, autor o palabra clave..."
                           required>
                    <button type="submit" class="search-button">
                        Buscar
                        <img src="{{ asset('img/search-icon.png') }}" alt="Buscar" class="search-icon">
                    </button>
                </div>
            </form>
        </div>

        <!-- Contenido principal -->
        <div class="row mt-5">
            <!-- Filtros laterales -->
            <div class="col-md-3">
                <div class="filters-container">
                    <h5 class="filters-title">Filtros</h5>
                    <div class="filter-group">
                        <button class="filter-button" id="showAuthors">
                            <img src="{{ asset('img/author-icon.png') }}" alt="Autores" class="filter-icon">
                            Autores
                        </button>
                        <button class="filter-button" id="showTitles">
                            <img src="{{ asset('img/title-icon.png') }}" alt="Títulos" class="filter-icon">
                            Títulos
                        </button>
                    </div>
                </div>
            </div>

            <!-- Resultados -->
            <div class="col-md-9">
                <!-- Sección de autores -->
                <div id="authorsSection" class="results-section" style="display:none;">
                    <h4 class="section-title">Autores</h4>
                    <div class="authors-grid">
                        @foreach($authors as $author)
                            <a href="{{ route('buscarPorAutor', ['author' => $author]) }}" class="author-card">
                                <img src="{{ asset('img/author-avatar.png') }}" alt="Author" class="author-avatar">
                                <span class="author-name">{{ $author }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Sección de títulos -->
                <div id="titlesSection" class="results-section" style="display:none;">
                    <h4 class="section-title">Títulos</h4>
                    <div class="titles-list">
                        @foreach($titles as $title)
                            <a href="{{ route('buscarPorTitulo', ['title' => $title]) }}" class="title-item">
                                <img src="{{ asset('img/document-icon.png') }}" alt="Document" class="title-icon">
                                <span>{{ $title }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Resultados de proyectos -->
                @if(isset($projects) && $projects->count() > 0)
                    <div class="projects-grid">
                        @foreach($projects as $project)
                            <div class="project-card">
                                <div class="pdf-preview">
                                    <object data="{{ asset('storage/' . $project->file_path) }}" type="application/pdf">
                                        <p>Vista previa no disponible</p>
                                    </object>
                                </div>
                                <div class="project-info">
                                    <h5 class="project-title">{{ $project->name }}</h5>
                                    <p class="project-summary">{{ Str::limit($project->summary, 100) }}</p>
                                    <a href="{{ route('projects.show', $project->id) }}" class="view-project-btn">
                                        Ver Proyecto
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @elseif(isset($projects))
                    <div class="no-results">
                        <img src="{{ asset('img/no-results.png') }}" alt="No hay resultados" class="no-results-icon">
                        <p>No se encontraron proyectos que coincidan con la búsqueda.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <footer>
        <p>© {{ date('Y') }} Repositorio Institucional del SENA. Todos los derechos reservados.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/search.js') }}"></script>
</body>
</html>