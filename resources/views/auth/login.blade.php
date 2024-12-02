<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - Repositorio SENA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-container auth-login">
        <div class="auth-card">
            <div class="auth-logo">
                <a href="{{ url('/inicio') }}">
                <img src="{{ asset('img/logoSena.png') }}" alt="Logo SENA">
                </a>
            </div>

            <h3 class="auth-title">Iniciar Sesión</h3>
            
            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <div class="mb-3">
                    <label for="email" class="auth-label">
                        <i class="fas fa-envelope me-2"></i>Correo Electrónico
                    </label>
                    <input type="email" 
                           class="form-control auth-input" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           placeholder="correo@ejemplo.com">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="auth-label">
                        <i class="fas fa-lock me-2"></i>Contraseña
                    </label>
                    <input type="password" 
                           class="form-control auth-input" 
                           id="password" 
                           name="password" 
                           required 
                           placeholder="Tu contraseña">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" 
                               class="form-check-input" 
                               id="remember" 
                               name="remember">
                        <label class="form-check-label" for="remember">
                            Recuérdame
                        </label>
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <a href="{{ route('register') }}" class="auth-link">
                        ¿No tienes cuenta? Regístrate aquí
                    </a>
                </div>

                <button type="submit" class="auth-btn">
                    <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>