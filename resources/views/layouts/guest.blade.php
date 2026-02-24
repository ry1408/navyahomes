<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'Figtree', sans-serif;
            }
            .auth-container {
                background: white;
                border-radius: 12px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
                padding: 40px;
                width: 100%;
                max-width: 450px;
            }
            .auth-header {
                text-align: center;
                margin-bottom: 30px;
            }
            .auth-header h1 {
                font-size: 28px;
                font-weight: 600;
                color: #333;
                margin-bottom: 10px;
            }
            .auth-header p {
                color: #666;
                font-size: 14px;
                margin: 0;
            }
            .form-group {
                margin-bottom: 20px;
            }
            .form-label {
                font-weight: 500;
                color: #333;
                margin-bottom: 8px;
                display: block;
            }
            .form-control {
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 12px 15px;
                font-size: 14px;
                transition: all 0.3s ease;
            }
            .form-control:focus {
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            }
            .btn-submit {
                width: 100%;
                padding: 12px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                margin-top: 10px;
            }
            .btn-submit:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
            }
            .btn-submit:active {
                transform: translateY(0);
            }
            .error-message {
                color: #e74c3c;
                font-size: 13px;
                margin-top: 5px;
            }
            .success-message {
                background-color: #d4edda;
                color: #155724;
                padding: 12px 15px;
                border-radius: 8px;
                margin-bottom: 20px;
                border: 1px solid #c3e6cb;
            }
            .auth-link {
                text-align: center;
                margin-top: 20px;
                padding-top: 20px;
                border-top: 1px solid #eee;
            }
            .auth-link a {
                color: #667eea;
                text-decoration: none;
                font-size: 13px;
            }
            .auth-link a:hover {
                text-decoration: underline;
            }
            .logo-container {
                text-align: center;
                margin-bottom: 30px;
            }
            .logo-container a {
                display: inline-block;
                text-decoration: none;
            }
            .section-info {
                color: #999;
                font-size: 13px;
                line-height: 1.6;
                margin-bottom: 25px;
            }
        </style>
    </head>
    <body>
        <div class="auth-container">
            <div class="logo-container">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            {{ $slot }}
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
