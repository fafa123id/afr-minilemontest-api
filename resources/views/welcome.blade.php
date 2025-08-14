<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFR - Minilemon Test Api Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        @keyframes gradient-animation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animated-gradient {
            background-size: 200% 200%;
            animation: gradient-animation 15s ease infinite;
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-element {
            animation: fade-in-up 0.8s ease-out forwards;
            opacity: 0;
        }

        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
        .delay-4 { animation-delay: 0.8s; }

    </style>
</head>
<body class="bg-gray-900 text-white overflow-hidden">

    <div class="relative min-h-screen w-full flex flex-col items-center justify-center p-6 bg-gradient-to-r from-slate-900 via-purple-900 to-slate-900 animated-gradient">
        
        <div class="absolute top-0 left-0 w-full h-full bg-grid-white/[0.05]"></div>

        <main class="z-10 flex flex-col items-center text-center">
            
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-b from-white to-gray-400 fade-in-element delay-1">
                Selamat Datang di Portal API
            </h1>

            <p class="mt-4 max-w-2xl text-lg md:text-xl text-gray-300 fade-in-element delay-2">
                Minilemon Test API - Ahmad Fauzan Roziqin
            </p>

            <div class="mt-10 flex flex-col sm:flex-row items-center gap-4 fade-in-element delay-3">
                <a href="{{ route('l5-swagger.default.api') }}" class="group relative inline-flex items-center justify-center px-8 py-3 w-full sm:w-auto text-lg font-semibold text-white bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700 transition-all duration-300 ease-in-out transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 transition-transform duration-300 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Dokumentasi API
                </a>
                <a href="https://github.com/fafa123id/afr-minilemontest-api" class="group relative inline-flex items-center justify-center px-8 py-3 w-full sm:w-auto text-lg font-semibold text-gray-200 bg-gray-800/50 backdrop-blur-sm border border-gray-600 rounded-lg shadow-lg hover:bg-gray-700/70 hover:border-gray-500 transition-all duration-300 ease-in-out transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 transition-transform duration-300 group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                    </svg>
                    Link Repository
                </a>
            </div>

        </main>

        <footer class="absolute bottom-6 text-center text-gray-400 fade-in-element delay-4">
            <p>Dibuat oleh <span class="font-semibold text-gray-300">Ahmad Fauzan Roziqin | 2025</span></p>
        </footer>

    </div>

</body>
</html>
