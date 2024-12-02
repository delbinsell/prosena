<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subir Proyecto - Repositorio Institucional del SENA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subir.css') }}">
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
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="project-form">
                    <h3 class="text-center mb-4">Subir Proyecto</h3>
                    
                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del proyecto" required>
                            <label for="name"><i class="fas fa-project-diagram me-2"></i>Nombre del Proyecto</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="summary" name="summary" style="height: 100px" placeholder="Resumen del proyecto" required></textarea>
                            <label for="summary"><i class="fas fa-file-alt me-2"></i>Resumen del Proyecto</label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-users me-2"></i>Autores</label>
                            <div id="authors-container">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="authors[]" placeholder="Nombre del autor" required>
                                    <label>Nombre del autor</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="add-author">
                                <i class="fas fa-plus me-2"></i>Agregar Autor
                            </button>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="advisor" name="advisor" placeholder="Nombre del asesor" required>
                            <label for="advisor"><i class="fas fa-user-tie me-2"></i>Nombre del Asesor</label>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label"><i class="fas fa-file-pdf me-2"></i>Archivo del Proyecto (PDF)</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".pdf" required>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="url" name="url" placeholder="URL del proyecto" required>
                            <label for="url"><i class="fas fa-link me-2"></i>URL del Proyecto</label>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="">Seleccionar...</option>
                                        <option value="Proyecto Final">Proyecto Final</option>
                                    </select>
                                    <label for="type"><i class="fas fa-tasks me-2"></i>Tipo de Proyecto</label>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="center" name="center" required>
                                        <option value="">Seleccionar...</option>
                                        <option value="CTMA">CTMA</option>
                                    </select>
                                    <label for="center"><i class="fas fa-building me-2"></i>Centro de Formación</label>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="program" name="program" required>
                                        <option value="">Seleccionar...</option>
                                        <option value="ADSO">ADSO</option>
                                    </select>
                                    <label for="program"><i class="fas fa-graduation-cap me-2"></i>Programa de Formación</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success auth-btn">
                                <i class="fas fa-upload me-2"></i>Guardar Proyecto
                            </button>
                        </div>
                    </form>
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
    
    <script>
        document.getElementById('add-author').addEventListener('click', function() {
            const container = document.getElementById('authors-container');
            const newAuthorDiv = document.createElement('div');
            newAuthorDiv.className = 'form-floating mb-2';
            newAuthorDiv.innerHTML = `
                <input type="text" class="form-control" name="authors[]" placeholder="Nombre del autor" required>
                <label>Nombre del autor</label>
                <button type="button" class="btn btn-outline-danger btn-sm position-absolute" 
                        style="right: 10px; top: 50%; transform: translateY(-50%);"
                        onclick="this.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(newAuthorDiv);
        });
    </script>
</body>
</html>