<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @if (session('message'))
            <div class="mb-4 alert alert-error">
                <ul>
                    <li>{!! session('message') !!}</li>
                </ul>
            </div>
        @endif

        <!--
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
        -->
        <style>
            .login-container {
            /*background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);*/
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            color: #333;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #666;
            font-size: 16px;
        }

        .oauth-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .oauth-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .oauth-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .oauth-btn:active {
            transform: translateY(0);
        }

        .oauth-btn svg {
            width: 20px;
            height: 20px;
            margin-right: 12px;
        }

        /* Google Button */
        .google-btn {
            background: #CB4023;
            color: white;
        }

        .google-btn:hover {
            background: #b6361d;
        }

        /* Microsoft Button */
        .microsoft-btn {
            background: #00a1f1;
            color: white;
        }

        .microsoft-btn:hover {
            background: #0078d4;
        }

        /* Alternative style - outline buttons */
        .oauth-btn-outline {
            background: white;
            border: 2px solid #e1e5e9;
            color: #333;
        }

        .oauth-btn-outline:hover {
            background: #f8f9fa;
            border-color: #d3d9df;
        }

        .google-btn-outline:hover {
            border-color: #4285f4;
            color: #4285f4;
        }

        .microsoft-btn-outline:hover {
            border-color: #00a1f1;
            color: #00a1f1;
        }

        .divider {
            margin: 25px 0;
            text-align: center;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e1e5e9;
        }

        .divider span {
            background: white;
            padding: 0 15px;
            color: #666;
            font-size: 14px;
        }

        </style>
            <div class="login-container">
                <div class="login-header">
                    <h1>Iniciar Sesión</h1>
                    <p>Inicie sesión con tú cuenta institucional</p>
                </div>
        
                <div class="oauth-buttons" id="oauth-buttons">
                    <!-- Google Login Button -->
                    <a href="/auth/google" class="oauth-btn google-btn">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                        </svg>
                        Continuar con Google
                    </a>
        
                    <!-- Microsoft Login Button -->
                    <a href="/auth/microsoft/redirect" class="oauth-btn microsoft-btn">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M11.4 24H0V12.6h11.4V24zM24 24H12.6V12.6H24V24zM11.4 11.4H0V0h11.4v11.4zM24 11.4H12.6V0H24v11.4z"/>
                        </svg>
                        Continuar con Microsoft
                    </a>
                </div>
        
            </div>

    </x-jet-authentication-card>
</x-guest-layout>
