<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - Repositorio SENA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-container auth-register">
        <div class="auth-card">
            <div class="auth-logo">
                <a href="{{ url('/inicio') }}">
                <img src="{{ asset('img/logoSena.png') }}" alt="Logo SENA">
                </a>
            </div>

            <h3 class="auth-title">Registro</h3>
            
            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <div class="mb-3">
                    <label for="name" class="auth-label">
                        <i class="fas fa-user me-2"></i>Nombre Completo
                    </label>
                    <input type="text" class="form-control auth-input" id="name" name="name" 
                           value="{{ old('name') }}" required autofocus placeholder="Tu nombre completo">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="auth-label">
                        <i class="fas fa-envelope me-2"></i>Correo Electrónico
                    </label>
                    <input type="email" class="form-control auth-input" id="email" name="email" 
                           value="{{ old('email') }}" required placeholder="correo@ejemplo.com">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="auth-label">
                        <i class="fas fa-lock me-2"></i>Contraseña
                    </label>
                    <input type="password" class="form-control auth-input" id="password" 
                           name="password" required placeholder="Crea una contraseña">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="auth-label">
                        <i class="fas fa-lock me-2"></i>Confirmar Contraseña
                    </label>
                    <input type="password" class="form-control auth-input" id="password_confirmation" 
                           name="password_confirmation" required placeholder="Confirma tu contraseña">
                </div>

                <!-- Enlace para iniciar sesión -->
                <div class="mb-3 text-center">
                    <a href="{{ route('login') }}" class="auth-link">
                        ¿Ya tienes cuenta? Inicia sesión aquí
                    </a>
                </div>

                <!-- Botón de registro -->
                <div class="text-center">
                    <button type="submit" class="auth-btn">
                        <i class="fas fa-user-plus me-2"></i>Registrarse
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
