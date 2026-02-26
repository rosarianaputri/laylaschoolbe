<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Layla School' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #333;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        .dark-theme {
            background-color: #1a1a1a !important;
            color: #ffffff !important;
        }
        
        .dark-theme .navbar {
            background-color: #2d2d2d !important;
            border-bottom-color: #404040 !important;
        }
        
        .dark-theme .navbar-brand {
            color: #ffffff !important;
        }
        
        .dark-theme .nav-link {
            color: #cccccc !important;
        }
        
        .dark-theme .nav-link:hover,
        .dark-theme .nav-link.active {
            color: #ffffff !important;
            background-color: #404040 !important;
        }
        
        .dark-theme .hero-section {
            background: linear-gradient(135deg, #2d3748 0%, #1a202c 50%, #0f3460 100%) !important;
        }
        
        .dark-theme .card {
            background-color: #2d2d2d !important;
            border-color: #404040 !important;
            color: #ffffff !important;
        }
        
        .dark-theme .card-title {
            color: #ffffff !important;
        }
        
        .dark-theme .text-light {
            color: #cccccc !important;
        }
        
        .dark-theme .bg-light {
            background-color: #2d2d2d !important;
        }
        
        .dark-theme .footer {
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #2d2d2d 100%) !important;
        }
        
        .dark-theme .feature-card {
            background: #2d2d2d !important;
            border-color: #404040 !important;
            color: #ffffff !important;
        }
        
        .dark-theme .form-control {
            background-color: #404040 !important;
            border-color: #555555 !important;
            color: #ffffff !important;
        }
        
        .dark-theme .form-control::placeholder {
            color: #cccccc !important;
        }
        
        .dark-theme .btn-primary {
            background: linear-gradient(135deg, #007bff, #667eea) !important;
        }
        
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .theme-toggle:hover {
            background: rgba(0, 123, 255, 0.8);
            transform: scale(1.1);
        }
        
        .theme-toggle i {
            font-size: 20px;
            color: white;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 60vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 3rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #007bff, #667eea);
            border-radius: 2px;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #007bff, #667eea);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,123,255,0.3);
        }
        
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(0,123,255,0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            border-color: rgba(0,123,255,0.3);
        }
        
        .principal-image-container {
            position: relative;
            display: inline-block;
        }
        
        .principal-image-container::after {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 3px solid #007bff;
            border-radius: 50%;
            z-index: -1;
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #007bff, #667eea);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }
    </style>
</head>

<body>
    @include('layouts.partials.frontend-navbar')

    @yield('content')

    @include('layouts.partials.frontend-footer')

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Theme Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');
            const body = document.body;
            
            // Check for saved theme preference or default to light
            const currentTheme = localStorage.getItem('theme') || 'light';
            
            if (currentTheme === 'dark') {
                body.classList.add('dark-theme');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
            
            themeToggle.addEventListener('click', function() {
                if (body.classList.contains('dark-theme')) {
                    body.classList.remove('dark-theme');
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                    localStorage.setItem('theme', 'light');
                } else {
                    body.classList.add('dark-theme');
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                    localStorage.setItem('theme', 'dark');
                }
            });
        });
    </script>
</body>

</html>
