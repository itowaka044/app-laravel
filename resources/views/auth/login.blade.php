<x-guest-layout>
    <div class="auth-card"> {{-- Equivalente a <x-guest-layout> --}}
    {{-- A x-auth-session-status é um componente Blade que provavelmente tem Tailwind --}}
    {{-- Você precisaria criar um div simples e aplicar seu próprio CSS para mensagens de status --}}
    @if (session('status'))
        <div class="alert alert-success"> {{-- Exemplo de classe customizada/Bootstrap --}}
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <div class="form-group"> {{-- Substitui div com mt-x --}}
            <label for="email" class="form-label">Email</label> {{-- Substitui x-input-label --}}
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" /> {{-- Substitui x-text-input e suas classes Tailwind --}}
            @error('email') {{-- Substitui x-input-error --}}
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group"> {{-- Substitui div com mt-x --}}
            <label for="password" class="form-label">Senha</label> {{-- Substitui x-input-label --}}

            <input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check"> {{-- Substitui div com block mt-4 --}}
            <label for="remember_me" class="form-check-label">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                Lembrar-me
            </label>
        </div>

        <div class="form-actions"> {{-- Substitui div com flex items-center justify-end mt-4 --}}
            @if (Route::has('password.request'))
                <a class="forgot-password-link" href="{{ route('password.request') }}"> {{-- Substitui classes Tailwind --}}
                    Esqueceu sua senha?
                </a>
            @endif

            <button type="submit" class="btn btn-primary"> {{-- Substitui x-primary-button e suas classes Tailwind --}}
                Entrar
            </button>
        </div>
    </form>
</div>
</x-guest-layout>
