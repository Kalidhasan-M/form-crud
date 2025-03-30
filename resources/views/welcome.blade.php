<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>University Admission Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts --><!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <style>
        .hero-bg {
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), 
                        url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }
        .university-primary {
            background-color: #003366;
        }
        .university-secondary {
            background-color: #e6f0ff;
        }
        .text-university {
            color: #003366;
        }
        .border-university {
            border-color: #003366;
        }
    </style>
</head>
<body class="antialiased font-sans">
    <!-- Login/Register Section (Unchanged) -->
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <!-- Hero Section -->
    <div class="hero-bg min-h-screen flex items-center justify-center text-white py-20 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <div class="flex justify-center mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-white">
                    <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 017.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.5 1.5 0 00-.82 1.296v.224a6 6 0 003.318 5.376l.04.025c.149.074.39.231.548.43a8 8 0 001.892 1.651.75.75 0 01.75 1.298 9.5 9.5 0 01-5.371 1.61 9.518 9.518 0 01-3.07-.465V16.5a48.48 48.48 0 00-8-1.688.75.75 0 01-.673-1.341 60.614 60.614 0 0110.127-4.315.75.75 0 00.33-1.026A60.53 60.53 0 007.5 4.409v-.227a48.29 48.29 0 00-5.25 1.8.75.75 0 11-.5-1.412A49.857 49.857 0 017.5 2.805z" />
                    <path d="M15.75 9.75a4.5 4.5 0 01-4.884 4.484c-1.076-.091-1.87-.586-2.472-1.234l-.003-.003-.34-.18a.75.75 0 01-.707 0A50.04 50.04 0 007.5 12.406v-.227c0-.131.067-.248.172-.311a54.615 54.615 0 014.653-2.52.75.75 0 10-.65-1.352 56.123 56.123 0 00-4.78 2.589 1.5 1.5 0 00-.82 1.296v1.5a6 6 0 003.318 5.376l.04.025c.149.074.39.231.548.43a8 8 0 001.892 1.651.75.75 0 01.75 1.298 9.5 9.5 0 01-5.371 1.61 9.56 9.56 0 01-2.206-.338V21.5a48 48 0 008-1.688c.536.136 1.077.25 1.62.333a.75.75 0 00.237-1.475z" />
                    <path d="M19.5 12.75c0 .98-.4 1.866-1.045 2.51a4.993 4.993 0 01-3.232 1.48 4.993 4.993 0 01-3.233-1.48A3.75 3.75 0 0112 12.75v-.75a.75.75 0 011.5 0v.75a2.25 2.25 0 002.25 2.25c.835 0 1.608-.357 2.147-.968a.75.75 0 111.061 1.06 3.75 3.75 0 01-2.708 1.13h-.25a.75.75 0 000 1.5h.188a6.25 6.25 0 005.025-2.515A6.25 6.25 0 0019.5 12v-.75a.75.75 0 011.5 0v.75z" />
                </svg>
            </div>
            
            <h1 class="text-5xl font-bold mb-6">University Admission Portal</h1>
            <p class="text-xl mb-10 max-w-2xl mx-auto">Begin your academic journey at one of the world's leading institutions</p>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-12">
                <!-- Card 1 -->
                <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-800 transition-transform hover:scale-105">
                    <div class="text-university mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Admission Process</h3>
                    <p class="text-gray-600">Step-by-step guide to applying for our programs</p>
                </div>
                
                <!-- Card 2 -->
                <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-800 transition-transform hover:scale-105">
                    <div class="text-university mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Programs</h3>
                    <p class="text-gray-600">Explore 120+ undergraduate and graduate programs</p>
                </div>
                
                <!-- Card 3 -->
                <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-800 transition-transform hover:scale-105">
                    <div class="text-university mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 8.25H9m6 3H9m3 6l-3-3h1.5a3 3 0 100-6M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Scholarships</h3>
                    <p class="text-gray-600">Financial aid and scholarship opportunities</p>
                </div>
                
                <!-- Card 4 -->
                <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-800 transition-transform hover:scale-105">
                    <div class="text-university mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Campus Life</h3>
                    <p class="text-gray-600">Discover our vibrant campus community</p>
                </div>
            </div>
            
            <div class="mt-16">
                <a href="{{ route('register') }}" class="inline-block bg-white text-university font-bold py-3 px-8 rounded-full hover:bg-gray-100 transition duration-300 border-2 border-university">
                    Apply Now
                </a>
                <a href="#" class="inline-block ml-4 text-white font-bold py-3 px-8 rounded-full hover:bg-blue-700 transition duration-300 university-primary">
                    Learn More
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="university-primary text-white py-8">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="text-xl font-bold">Prestige University</p>
                    <p class="text-sm opacity-80">Shaping the future since 1925</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-gray-300 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-gray-300 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-gray-300 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="border-t border-white border-opacity-20 mt-6 pt-6 text-sm text-center md:text-left">
                <p>© 2023 Prestige University. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>