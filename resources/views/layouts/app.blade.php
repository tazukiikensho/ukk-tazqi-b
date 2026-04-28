<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Cafe · Nyentrik & Estetik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Poppins + Playfair Display untuk sentuhan estetik -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 (free CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        .font-serif-accent {
            font-family: 'Playfair Display', serif;
        }
        /* Custom ornamen & efek estetik */
        .bg-dot-pattern {
            background-image: radial-gradient(circle at 1px 1px, rgba(255,255,200,0.08) 1.5px, transparent 1.5px);
            background-size: 24px 24px;
        }
        .glass-card {
            background: rgba(255, 255, 245, 0.75);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(255, 215, 150, 0.5);
        }
        .ornament-squiggle::after {
            content: "~ ♡ ~";
            display: block;
            font-size: 12px;
            letter-spacing: 4px;
            color: #f5b042;
            text-align: center;
            margin-top: 8px;
            opacity: 0.6;
            font-family: monospace;
        }
        .sidebar-ornament {
            background: linear-gradient(135deg, #3b2a1f 0%, #261e14 100%);
            position: relative;
        }
        .sidebar-ornament::before {
            content: "☕";
            font-size: 70px;
            opacity: 0.08;
            position: absolute;
            bottom: 20px;
            right: -15px;
            transform: rotate(-15deg);
            pointer-events: none;
            font-family: monospace;
        }
        .coffee-stain {
            position: absolute;
            bottom: 15%;
            left: -20px;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(210,150,75,0.08) 0%, rgba(0,0,0,0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .nav-hover-effect {
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }
        .nav-hover-effect:hover {
            background-color: rgba(245, 176, 66, 0.15);
            border-left-color: #f5b042;
            transform: translateX(4px);
        }
        .topbar-blur {
            background: rgba(255, 252, 240, 0.92);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid #f0e0b0;
        }
        .card-cafe {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card-cafe:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 25px -12px rgba(0,0,0,0.1);
        }
        .scrollbar-cute::-webkit-scrollbar {
            width: 5px;
        }
        .scrollbar-cute::-webkit-scrollbar-track {
            background: #f6e8d0;
            border-radius: 10px;
        }
        .scrollbar-cute::-webkit-scrollbar-thumb {
            background: #d9a13b;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-[#fef7e8] text-stone-800 scrollbar-cute">

<div class="flex min-h-screen relative">

    <!-- ORNAMEN ELEGAN DI BACKGROUND (semburat) -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-20 left-[5%] w-72 h-72 bg-amber-100/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-5 w-80 h-80 bg-orange-200/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 right-[15%] w-40 h-40 bg-yellow-100/20 rounded-full blur-2xl"></div>
    </div>

    <!-- SIDEBAR · GAYA KAFE NYENTRIK + ESTETIK -->
    <div class="w-72 h-screen fixed shadow-2xl z-10 sidebar-ornament overflow-y-auto scrollbar-cute" style="background: #2c241a; backdrop-filter: blur(2px);">
        <!-- coffee stain dekor -->
        <div class="coffee-stain"></div>
        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-amber-800/10 to-transparent pointer-events-none"></div>

        <div class="relative z-2 p-6">
            <!-- Logo dengan sentuhan ilustrasi -->
            <div class="flex items-center gap-3 border-b border-amber-700/30 pb-5 mb-4">
                <div class="bg-amber-600/20 w-10 h-10 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
                    <i class="fas fa-mug-hot text-amber-300"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-serif-accent font-bold tracking-wide text-amber-100">Kafe<span class="text-amber-400"> Nostalgia</span></h1>
                    <p class="text-[11px] text-amber-300/70 tracking-wider">✦ estetika nusantara ✦</p>
                </div>
            </div>

            <!-- Menu navigasi dengan ikon + gaya unik -->
            <div class="space-y-1.5 mt-2 text-amber-50/90">
                @if(session('user')->role == 'kasir')
                    <a href="/transaksi" class="nav-hover-effect flex items-center gap-4 p-3 rounded-r-xl text-sm font-medium transition group">
                        <i class="fas fa-receipt w-5 text-amber-400 text-lg"></i>
                        <span>🧾 Transaksi Cepat</span>
                        <span class="ml-auto text-amber-400/40 text-xs"><i class="fas fa-chevron-right"></i></span>
                    </a>
                @endif

                @if(session('user')->role == 'manajer')
                    <a href="/manajer" class="nav-hover-effect flex items-center gap-4 p-3 rounded-r-xl text-sm font-medium">
                        <i class="fas fa-chalkboard-user w-5 text-amber-400"></i>
                        <span>🏠 Dashboard Manajer</span>
                    </a>
                    <a href="/manajer/menu" class="nav-hover-effect flex items-center gap-4 p-3 rounded-r-xl text-sm font-medium">
                        <i class="fas fa-utensils w-5 text-amber-400"></i>
                        <span>🍔 Menu Kafe</span>
                    </a>
                    <a href="/manajer/laporan" class="nav-hover-effect flex items-center gap-4 p-3 rounded-r-xl text-sm font-medium">
                        <i class="fas fa-chart-line w-5 text-amber-400"></i>
                        <span>📊 Laporan & Tren</span>
                    </a>
                    <a href="/manajer/log" class="nav-hover-effect flex items-center gap-4 p-3 rounded-r-xl text-sm font-medium">
                        <i class="fas fa-history w-5 text-amber-400"></i>
                        <span>📜 Log Aktivitas</span>
                    </a>
                @endif

                @if(session('user')->role == 'admin')
                    <a href="/admin" class="nav-hover-effect flex items-center gap-4 p-3 rounded-r-xl text-sm font-medium">
                        <i class="fas fa-sliders-h w-5 text-amber-400"></i>
                        <span>⚙ Dashboard Admin</span>
                    </a>
                    <a href="/admin/user" class="nav-hover-effect flex items-center gap-4 p-3 rounded-r-xl text-sm font-medium">
                        <i class="fas fa-users w-5 text-amber-400"></i>
                        <span>👤 Kelola User</span>
                    </a>
                @endif

                <!-- Spacer & ornamen -->
                <div class="my-6 border-t border-amber-700/20 pt-4">
                    <div class="text-center text-[11px] text-amber-400/40 uppercase tracking-wider">✦ menu hangat ✦</div>
                </div>

                <!-- Tombol logout dgn aksen bold -->
                <a href="/logout" class="mt-3 flex items-center justify-between bg-gradient-to-r from-rose-800/60 to-amber-800/40 hover:from-rose-700 hover:to-amber-700 rounded-xl p-3 text-sm font-semibold transition-all border border-amber-500/40 group">
                    <span class="flex gap-3 items-center"><i class="fas fa-door-open text-amber-200"></i> Keluar dari Kafe</span>
                    <i class="fas fa-arrow-right text-amber-300 group-hover:translate-x-1 transition"></i>
                </a>
            </div>

            <!-- Ornamen estetik di bagian bawah sidebar -->
            <div class="mt-10 pt-4 text-center text-[10px] text-amber-600/40">
                <i class="fas fa-coffee"></i> <i class="fas fa-heart"></i> <i class="fas fa-music"></i>
                <div class="ornament-squiggle mt-1"></div>
                <p class="mt-2">#NgopiEstenik • 2025</p>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="ml-72 w-full relative z-0">
        <!-- TOPBAR modern minimalis + sticky -->
        <div class="sticky top-0 z-20 topbar-blur shadow-sm px-7 py-4 flex justify-between items-center backdrop-blur-md">
            <div class="flex items-center gap-3">
                <div class="bg-amber-100 w-8 h-8 rounded-full flex items-center justify-center text-amber-700">
                    <i class="fas fa-store"></i>
                </div>
                <h1 class="font-serif-accent font-medium text-xl tracking-wide text-stone-700 border-l-2 border-amber-300 pl-3">
                    @yield('title', 'Selamat Datang')
                </h1>
                <!-- little animated dot -->
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                </span>
            </div>

            <div class="flex items-center gap-4 bg-white/60 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm border border-amber-100">
                <i class="fas fa-user-circle text-amber-600 text-xl"></i>
                <span class="text-sm font-medium text-stone-700">{{ session('user')->name }}</span>
                <span class="text-xs bg-amber-100 px-2 py-0.5 rounded-full text-amber-800 font-mono">{{ session('user')->role }}</span>
                <div class="w-px h-5 bg-amber-300/50 mx-0"></div>
                <i class="fas fa-mug-saucer text-amber-500 text-sm"></i>
            </div>
        </div>

        <!-- CONTENT AREA dengan sentuhan background ringan & card estetik -->
        <main class="p-7 md:p-8 relative">
            <div class="max-w-7xl mx-auto">
                <!-- dekorasi floating kecil di pojok konten -->
                <div class="absolute right-8 top-20 opacity-30 pointer-events-none hidden lg:block">
                    <i class="fas fa-crown text-4xl text-amber-300"></i>
                </div>
                <div class="absolute left-4 bottom-12 opacity-20 pointer-events-none hidden md:block">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L14 7H19L15 10.5L17 16L12 13L7 16L9 10.5L5 7H10L12 2Z" fill="#D9A13B" fill-opacity="0.3"/>
                    </svg>
                </div>

                @yield('content')
            </div>
        </main>

        <!-- tiny footer stylish -->
        <footer class="text-center text-[11px] text-amber-600/50 pb-5 pt-2 border-t border-amber-100/50 mt-6">
            <span>☕ “seduh ide, sajikan kebaikan” • kasir cafe dengan vibe estetik</span>
        </footer>
    </div>
</div>

<!-- sedikit style tambahan untuk yield content agar lebih menyatu -->
<style>
    /* Membuat card default yang ada di konten lebih aesthetic */
    .prose-cafe h1, .prose-cafe h2 {
        font-family: 'Playfair Display', serif;
    }
    button, .btn-cafe {
        transition: all 0.2s;
    }
    /* Custom utility jika diperlukan */
    .cafe-card-bg {
        background: rgba(255, 251, 240, 0.8);
        backdrop-filter: blur(2px);
        border: 1px solid #f3e1be;
        box-shadow: 0 8px 20px -6px rgba(0,0,0,0.05);
    }
    input, select, textarea {
        background-color: #fffdf7;
        border-color: #edd9b0;
    }
    input:focus, select:focus {
        border-color: #e2b870;
        ring-color: #f3c26b;
    }
</style>
</body>
</html>